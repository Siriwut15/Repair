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

<div class="container">
  <div class="register-wrapper">
    <form class="register-form" action="que_pass2.php" method="POST">

    <?php

$email = $_POST['email'];

$email_check = "SELECT * FROM tbl_login WHERE u_email = '$email'";
$result = mysqli_query($conn,$email_check);
$email1 = mysqli_fetch_assoc($result);

if($email1['u_email'] === $email){

    $sql="SELECT * FROM tbl_login WHERE u_email = '$email'";
    $query = mysqli_query($conn,$sql);
    $rs=mysqli_fetch_array($query);

?>



          <center><h2>กู้คืนรหัสผ่าน</h2></center>
          <tr>
    <td>อีเมลผู้ใช้งาน : <?php echo $rs['u_email']; ?></td>
    </tr>

    <tr>
    <td>คำถาม : <?php echo $rs['u_que']; ?></td>
    </tr>

    <tr>

    </tr><br><br>
    
          <input type="text" name="uans" placeholder= "คำถาม : <?php echo $rs['u_que']; ?> กรุณาใส่คำตอบ" required>
      
          </select>
          <br>
          <button type="submit">ยืนยัน</button>
      </form>
      
      <?php
    }else{
        header("Location: rq_pass.php");
    }
    ?>


  </div>
</div>


