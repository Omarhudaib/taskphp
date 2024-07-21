<?php
$servername = "localhost";
$username = 'Omar';
$password = 'Ai@ktv7L9_Cj4re7';
$dbname = "omarfirstc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'] ?? 0;
$employee = null;

// Fetch employee data
if ($id) {
    $sql = "SELECT id, firstname, adress, salry FROM employy WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    }
}

// Update employee data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employy SET firstname='$firstname', adress='$address', salry='$salary' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
    
        header('Location: page2.php'); // Redirect after update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Employee</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Employee Management</a>
</nav>
<div class="container my-4">
  <h2>Update Employee</h2>
  <?php if ($employee): ?>
  <form method="post">
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label">Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="firstname" value="<?php echo htmlspecialchars($employee['firstname']); ?>" required>
      </div>
    </div>
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label">Salary</label>
      <div class="col-sm-6">
        <input type="number" class="form-control" name="salary" value="<?php echo htmlspecialchars($employee['salry']); ?>" required>
      </div>
    </div>
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label">Address</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($employee['adress']); ?>" required>
      </div>
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
  </form>
  <?php else: ?>
  <p>No employee found with the given ID.</p>
  <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
