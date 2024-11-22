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
$sql = "DELETE FROM Students WHERE id = $id";
$result = $conn->query($sql);
if(isset($result)){
    header("location: ./index.php");
}
?>