<?php
include ("condb.php"); // เชื่อมต่อฐานข้อมูล
$query_case = "SELECT c.*,u.u_name,u.u_lastname,s.status_name,u.u_tel,u.u_email,s.status_id
     FROM tbl_case as c
     INNER JOIN tbl_login as u ON c.user_id = u.user_id
     INNER JOIN tbl_status as s ON c.status_id = s.status_id
     order by case_id " or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query_case);
//echo $query_case;
//exit();

?>
<table id="example1" class="table table-hover text-nowrap">
    <thead>
        <tr role="row" class="info">
            <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ID</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่องาน</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">รายละเอียดผู้แจ้ง</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รายละเอียดงาน</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานที่</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รูปภาพ</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">เริ่มงาน</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ปิดงาน</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ระยะเวลา</th>
            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">เลือกช่าง</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row) { ?>

            <tr>
                <td>
                    <?php echo $row['case_id'];
                    ; ?>
                </td>
                <td>
                    <?php echo $row['name_case']; ?>
                </td>
                <td>
                    <?php echo $row['u_name'] . ' ' . $row['u_lastname'] ?>
                </td>
                <td>
                    <?php echo $row['detail_case']; ?>
                </td>
                <td>
                    <?php echo $row['place_case']; ?>
                </td>
                <td>
                    <?php echo $row['status_name']; ?>
                </td>
                <td>
                    <?php
                    if (!empty($row['img_case'])) {
                        $imagePath =  $row['img_case'];
                        echo '<img src="' . $row['img_case']. '" alt="Uploaded Image" style="max-width: 100px; max-height: 100px;">';
                    } else {
                        echo 'No image uploaded';
                    }
                    ?>
                </td>
                <td>
                    <?php $start_time = date("Y-m-d H:i:s");
                    echo $row['date_case'];
                    $start_time . "<date_case>"; ?>
                </td>
                <td>
                    <?php $end_time = date("Y-m-d H:i:s");
                    echo $row['date_close'];
                    $end_time . "<date_close>"; ?>
                </td>
                <td>
                    <?php
                    // กำหนดเวลาเริ่มต้น
                    $start_time = "date_case";

                    // กำหนดเวลาสิ้นสุด
                    $end_time = "date_close";

                    // แปลงเวลาเป็น timestamp
                    $start_timestamp = strtotime($row['date_case']);
                    $end_timestamp = strtotime($row['date_close']);

                    // หาจำนวนวินาทีทั้งหมด
                    $seconds_elapsed = $end_timestamp - $start_timestamp;

                    // แปลงจำนวนวินาทีเป็นรูปแบบเวลา
                    $hours = floor($seconds_elapsed / 3600);
                    $minutes = floor(($seconds_elapsed - ($hours * 3600)) / 60);
                    $seconds = $seconds_elapsed - ($hours * 3600) - ($minutes * 60);

                    // แสดงผลลัพธ์
                    if ($row['status_id'] == 3 || $row['status_id'] == 1 || $row['status_id'] == 2) {
                        echo "";
                    } else {
                        echo " " . $hours . " ชั่วโมง " . $minutes . " นาที ";
                    }

                    ?>

                </td>
                <td>
                    <?php if ($row['status_id'] == 1) { ?>
                        <a class="btn btn-success btn-sm"
                            href="index.php?act=add&case_id=<?php echo $row['case_id']; ?>">เลือกช่าง</a>
                    <?php } elseif ($row['status_id'] == 2) { ?>
                        <a class="btn btn-danger btn-sm">มอบงานแล้ว</a>
                    <?php } ?>
                </td>
            <?php } ?>
        </tr>
    </tbody>
</table>