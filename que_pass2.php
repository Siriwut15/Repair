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
    <form class="register-form" action="uprepass2.php" method="POST">

    <?php

$ans_user = $_POST['uans'];

$ans_check = "SELECT * FROM tbl_login WHERE u_ans = '$ans_user'";
$result = mysqli_query($conn,$ans_check);
$ans_user1 = mysqli_fetch_assoc($result);

if($ans_user1['u_ans'] === $ans_user){

    $sql="SELECT * FROM tbl_login WHERE u_ans = '$ans_user'";
    $query = mysqli_query($conn,$sql);
    $rs=mysqli_fetch_array($query);

?>

          <center><h2>กู้คืนรหัสผ่าน</h2></center>
          <tr>
    <td>ชื่อผู้ใช้งาน : <?php echo $rs['username']; ?></td>
    </tr>

    <tr>

    </tr><br><br>
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $rs['user_id']; ?>" class="form-control">
          <input type="password" name="password" placeholder= "กรุณาตั้งรหัสผ่านใหม่" required>
      
          </select>
          <br>
          <button type="submit">ยืนยัน</button>
      </form>
      
      <?php
    }else{
        header("Location: submit_email.php");
    }
    ?>


  </div>
</div>


