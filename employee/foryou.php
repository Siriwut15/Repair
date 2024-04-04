<?php 
session_start(); // เริ่มเซสชันเพื่อเข้าถึงตัวแปรเซสชัน

include("condb.php"); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าพนักงานเข้าสู่ระบบหรือไม่
if(!isset($_SESSION["employee_id"])) {
    header("Location: tbl_login"); // ให้เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบหากไม่ได้เข้าสู่ระบบ
    exit;
}

$employee_id = $_SESSION["employee_id"]; // รับค่าไอดีพนักงานที่เข้าสู่ระบบจากเซสชัน

$query_case = "SELECT c.*, u.u_name, u.u_lastname, s.status_name, u.u_tel, u.u_email
FROM tbl_case AS c
INNER JOIN tbl_login AS u ON c.user_id = u.user_id
INNER JOIN tbl_status AS s ON c.status_id = s.status_id
WHERE u.user_id = $employee_id
ORDER BY case_id";

$result = mysqli_query($con, $query_case);

?>

<table id="example1" class="table table-hover text-nowrap">
  <thead>
    <tr role="row" class="info">
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ID</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่องาน</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">รายละเอียดผู้แจ้ง</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ชื่อเครื่อง</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานที่</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันและเวลา</th> 
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>       
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $row) { ?> 
      <tr>
        <td><?php echo $row['case_id']; ?></td>
        <td><?php echo $row['name_case']; ?></td>
        <td><?php echo $row['u_name'].' '.$row['u_lastname'].'|เบอร์โทร'.$row['u_tel'] ?></td>
        <td><?php echo $row['detail_case']; ?></td>
        <td><?php echo $row['place_case']; ?></td>
        <td><?php echo $row['status_name']; ?></td>
        <td><?php echo date("d-m-Y , H:i:s", strtotime($row['date_case'])); ?></td>
        <td>
            <button type="button" class="btn btn-warning edit-btn" data-toggle="modal" data-target="#editModal<?php echo $row['case_id']; ?>">แก้ไข</button>
        </td>

        <!-- Modal -->
        <div class="modal fade" id="editModal<?php echo $row['case_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">แก้ไขข้อมูล</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- ฟอร์มแก้ไขข้อมูล -->
                        <form action="update_case.php" method="post">
                            <input type="hidden" name="case_id" value="<?php echo $row['case_id']; ?>">
                            <!-- ส่วนอื่นๆของฟอร์ม เช่น input fields สำหรับแก้ไขข้อมูล -->
                            <!-- ตัวอย่างเช่น -->
                            <div class="form-group">
                                <label for="name_case">ชื่องาน:</label>
                                <input type="text" class="form-control" id="name_case" name="name_case" value="<?php echo $row['name_case']; ?>">
                            </div>
                            <!-- ส่วนอื่นๆของฟอร์ม -->
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
      </tr>
    <?php } ?>  
  </tbody>
</table>
