<?php
// ตรวจสอบว่ามีการส่งข้อมูลมาจากฟอร์มหรือไม่
//if ($_SERVER["username"] == "POST") {
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repair_db";

// สร้างการเชื่อมต่อใหม่
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คืนรหัสผ่าน</title> 
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<?php

$id=$_POST['user_id'];
$password=$_POST['password'];


$sql="UPDATE tbl_login set password = '$password' WHERE tbl_login.user_id = '$id'";
$query = mysqli_query($conn,$sql);


if($query){

?>

<div class="container text-center">
<div class="alert alert-success"><h2>กู้คืนรหัสผ่านสำเร็จ</h2></div>
<meta http-equiv="refresh" content="3;url=index.php">
</div>

<?php }else{ ?>

<div class="container text-center">
<div class="alert alert-danger"><h2>กู้คืนรหัสผ่านไม่สำเร็จ</h2></div>
<meta http-equiv="refresh" content="3;url=index.php">
</div>

<?php 
} 
?>


  </div>
</div>


