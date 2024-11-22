<?php
$host = "localhost";
$dbname = "crud_php";
$usename = "root";
$password = "";

$conn = mysqli_connect($host,$usename,$password, $dbname);
if(!$conn){
    die ("Error connection") . mysqli_connect_error();
}
?>

<?php
if(isset($_POST['btn'])){
    $name = $_POST['Name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];

    $sql = "INSERT INTO Students(name,sex,age) VALUES ('$name','$sex','$age')";

    $result =  $conn->query($sql);
    if(isset($result)){
        header("location: ./index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container shadow rounded">
        <h2>Add data into database</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label class="form-label" for="Name">Name</label>
                <input type="text" class="form-control" placeholder="Enter name " id="Name" name="Name">
            </div>
            <div class="mt-3">
                <label class="form-label" class="form-label" for="sex">Sex</label>
                <input type="text" class="form-control"class="form-control" placeholder="Enter Gender " id="sex" name="sex">
            </div>
            <div class="mt-3">
                <label class="form-label" for="age">Age</label>
                <input type="number"class="form-control" placeholder="Enter Age " id="age" name="age">
            </div>
            <div class="m-3 d-grid px-4">
                <button name="btn" type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




