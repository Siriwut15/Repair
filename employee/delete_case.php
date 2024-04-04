<?php
// เชื่อมต่อฐานข้อมูล และรับค่า ID ของเคสที่ต้องการลบ
$case_id = isset($_GET['case_id']) ? $_GET['case_id'] : '';

// ตรวจสอบว่ามีการส่งค่า ID มาหรือไม่
if ($case_id) {
    // เริ่มต้นเชื่อมต่อกับฐานข้อมูลของคุณ
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "repair_db";

    // สร้างการเชื่อมต่อ
    $conn = new mysqli($servername, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // สร้างคำสั่ง SQL สำหรับลบเคส
    $sql = "DELETE FROM tbl_case WHERE case_id = $case_id";

    // ลบเคส
    if ($conn->query($sql) === TRUE) {
        // ปิดการเชื่อมต่อกับฐานข้อมูล
        $conn->close();
        // ลบข้อมูลสำเร็จแล้ว ให้กลับไปยังหน้า show.php
        header("Location: show.php");
        exit(); // ออกจากสคริปต์ทันทีหลังจากส่ง header ไปที่หน้า show.php
    } else {
        echo "เกิดข้อผิดพลาดในการลบข้อมูล: " . $conn->error;
    }
} else {
    echo "ไม่พบ ID ของเคสที่ต้องการลบ";
}
?>

