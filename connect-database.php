<?php
$servername="localhost";
$username="root";
$password="";
$dbname="wedding_guest";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection Failed:".$conn->connect_error);
}
//echo "Connected Successfuly";
//mysqli_close($conn);
?>