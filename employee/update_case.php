<?php
include("condb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $case_id = $_POST['case_id'];
    $name_case = $_POST['name_case'];
    // ตรวจสอบข้อมูลอื่นๆและอัปเดตในฐานข้อมูลตามที่ต้องการ

    $sql_update = "UPDATE tbl_case SET name_case='$name_case' WHERE case_id='$case_id'";
    if (mysqli_query($con, $sql_update)) {
        echo "บันทึกข้อมูลเรียบร้อย";
        header("refresh:2; url=show.php");
	exit(0);
    } else {
        echo "Error: " . $sql_update . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>
