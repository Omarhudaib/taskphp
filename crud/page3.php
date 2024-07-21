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

// Insert employee data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employy (firstname, adress, salry) VALUES ('$firstname', '$address', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: page2.php'); // Redirect after insert
        exit();
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Employee</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Employee Management</a>
</nav>
<div class="container my-4">
  <h2>Add Employee</h2>
  <form method="post">
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label">Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="firstname" required>
      </div>
    </div>
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label">Salary</label>
      <div class="col-sm-6">
        <input type="number" class="form-control" name="salary" required>
      </div>
    </div>
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label">Address</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="address" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Add Employee</button>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
