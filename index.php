<?php
$host = "localhost";
$dbname = "crud_php";
$usename = "root";
$password = "";

$conn = mysqli_connect($host,$usename,$password, $dbname);
if(!$conn){
    die ("Error connection") . mysqli_connect_error();
}
$sql = "SELECT * FROM Students";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <h2 class="mb-3">Crud operation</h2>
        <a href="insert.php" class="btn btn-primary m-4">Add</a>
        <table class="table table-primary rounded">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>SEX</th>
                <th>AGE</th>
                <th>ACTION</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // Loop through the rows and display them
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>". $row['sex'].  "</td>";
                    echo "<td>". $row['age'].  "</td>";
                    echo "<td>
                    <a href='edit.php?id=" .$row['id']. "' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='delete.php?id=" . $row['id'] ."' class='btn btn-danger btn-sm'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No records found.</td></tr>";
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>