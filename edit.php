<?php
$host = "localhost";
$dbname = "crud_php";
$usename = "root";
$password = "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$conn = mysqli_connect($host,$usename,$password, $dbname);
if(!$conn){
    die ("Error connection") . mysqli_connect_error();
}
if($_GET['id']){
    $id = $_GET['id'];
    $sql = "SELECT * FROM Students WHERE id = $id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    }else{
        echo "Data not found";
    }
}
if(isset($_POST['btn'])){
    $name = $_POST['Name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];



    $up_sql = "UPDATE Students SET name = '$name', sex = '$sex', age = $age WHERE id = $id";
    $result = $conn->query($up_sql);
    if(isset($result)){
        header("Location: index.php");
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
                <input type="text" class="form-control" placeholder="Enter name " id="Name" name="Name" value="<?php echo$row['name'];?>">
            </div>
            <div class="mt-3">
                <label class="form-label" class="form-label" for="sex">Sex</label>
                <input type="text" class="form-control"class="form-control" placeholder="Enter Gender " id="sex" name="sex" value="<?php echo $row['sex'];?>">
            </div>
            <div class="mt-3">
                <label class="form-label" for="age">Age</label>
                <input type="number"class="form-control" placeholder="Enter Age " id="age" name="age" value="<?php echo $row['age'];?>">
            </div>
            <div class="m-3 d-grid px-4">
                <button name="btn" type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>