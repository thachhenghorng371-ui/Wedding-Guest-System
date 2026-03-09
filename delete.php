<?php
include 'connect-database.php';
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $update_at = date('Y-m-d H:i:s');

    $sql = "UPDATE guests SET is_active=0,update_at = '$update_at' WHERE guest_id=$id";
    $conn->query($sql);
    echo "Record Delete Successfully";
    header("location: index.php");
    exit;
}
?>