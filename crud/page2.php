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

// Uncomment this section if the table does not exist
/*
$sql = "CREATE TABLE employy (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    adress VARCHAR(30) NOT NULL,
    salry INT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table employy created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/
/*
// Insert a record
$sql = "SELECT id, firstname, salry,adress FROM employy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["salry"].  $row["adress"]."<br>";
  }
} else {
  echo "0 results";
}

*/


/*
// Delete a record
$sql = "DELETE FROM employy WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully<br>";
} else {
    echo "Error deleting record: " . $conn->error . "<br>";
}

$sql = "UPDATE employy SET salry=400 WHERE id=2";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
*/


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
  <a class="navbar-brand" href="#">em</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
 
      <li class="nav-item">
        <a class="nav-link" href="page3.php">add</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="page1.php">updat</a>
      </li>
    </ul>
  </div>
</nav>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
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

$sql = "SELECT id, firstname, salry, adress FROM employy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo 
        "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["firstname"] . "</td>
                <td>" . $row["salry"] . "</td>
                <td>" . $row["adress"] . "</td>
                <td> 
                   
                   <a href='page4.php?delete=" . $row['id'] . "' class='btn btn-danger' >Delete</a>
                    <a href='page1.php?id=" . $row['id'] . "' class='btn btn-warning update-btn'>Update</a>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='5'>0 results</td></tr>";
}

$conn->close();

?>

  </tbody>
  </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
