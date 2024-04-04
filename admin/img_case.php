<?php
// สร้างการเชื่อมต่อกับฐานข้อมูล
$servername = "localhost"; // เปลี่ยนเป็นชื่อโฮสต์ของเซิร์ฟเวอร์ MySQL ของคุณ
$username = "root"; // เปลี่ยนเป็นชื่อผู้ใช้ MySQL ของคุณ
$password = ""; // เปลี่ยนเป็นรหัสผ่าน MySQL ของคุณ
$dbname = "repair_db"; // เปลี่ยนเป็นชื่อฐานข้อมูลที่คุณต้องการเชื่อมต่อ

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// สร้างคำสั่ง SQL เพื่อดึงข้อมูลรูปภาพ
$sql = "SELECT img_case FROM img_case"; // เปลี่ยน your_table_name เป็นชื่อของตารางที่เก็บรูปภาพ

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // แสดงรูปภาพ
    while($row = $result->fetch_assoc()) {
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img_case']).'" alt="Uploaded Image" style="max-width: 100px; max-height: 100px;">';
    }
} else {
    echo "ไม่พบรูปภาพ";
}
$conn->close();
?>
