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

// รับค่าจากฟอร์ม
$username = $_POST['username'];
$uname = $_POST['uname'];
$lname = $_POST['lname'];
$password = $_POST['password'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$uque = $_POST['uque'];
$uans = $_POST['uans'];
$user_level = $_POST['user_level'];


// เขียนคำสั่ง SQL เพื่อเพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO tbl_login (username, password, user_level, u_name, u_lastname, u_tel, u_email, u_que, u_ans) 
        VALUES ('$username', '$password', '$user_level', '$uname', '$lname', '$tel', '$email', '$uque', '$uans')";


// ทำการเพิ่มข้อมูล
if ($conn->query($sql) === TRUE) {
    echo"บันทึกข้อมูลเรียบร้อยแล้ว";
    header("refresh:2; url=index.php");
    exit(0); 
    
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อ
$conn->close();
//}
?>