<?php 
  include("condb.php"); // เชื่อมต่อฐานข้อมูล
     $query_case = "SELECT c.*,u.u_name,u.u_lastname,s.status_name,u.u_tel,u.u_email
     FROM tbl_case as c
     INNER JOIN tbl_login as u ON c.user_id = u.user_id
     INNER JOIN tbl_status as s ON c.status_id = s.status_id
     WHERE c.tec_id = $user_id
     AND s.status_id= 3
     order by case_id " or die ("Error:" . mysqli_error());
       $result = mysqli_query($con, $query_case);
       //echo $query_case;
       //exit();

  ?>
  <table id="example1" class="table table-hover text-nowrap">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ID</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่องาน</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">รายละเอียดผู้แจ้ง</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รายละเอียดงาน</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานที่</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันที่รับงาน</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ซ่อมเสร็จแล้ว</th>        
      </tr>
    </thead>
    <tbody>
       <?php foreach ($result as $row) {  ?> 

      <tr>
        <td>
         <?php echo $row['case_id'];; ?>
        </td>
         <td>
         <?php echo $row['name_case']; ?>
        </td>
         <td>
         <?php echo $row['u_name'].' '.$row['u_lastname'] ?>
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
         <?php echo date("d-m-Y , H:i:s", strtotime($row['date_sent'])); ?>
        </td>
        <td>
  <a href="#" class="btn btn-danger btn-sm" onclick="submitRepair()">บันทึกแจ้งซ่อม</a>
</td>

<script>
function submitRepair() {
  var repairDetails = prompt("กรุณาใส่ข้อมูลเกี่ยวกับการซ่อม:");
  if (repairDetails != null) {
    // ส่งข้อมูลไปยังหน้า PHP ที่เก็บข้อมูลลงในฐานข้อมูล
    window.location.href = "case_success_db.php?case_id=<?php echo $row['case_id'];?>&repair_details=" + encodeURIComponent(repairDetails);
  }
}
</script>

         <?php   } ?>  
      </tr>
    </tbody>
  </table>
  
          



 