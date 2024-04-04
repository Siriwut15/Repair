<?php 
  include("condb.php"); // เชื่อมต่อฐานข้อมูล
     $query_case = "SELECT c.*,u.u_name,u.u_lastname,s.status_name,u.u_tel,u.u_email
     FROM tbl_case as c
     INNER JOIN tbl_login as u ON c.user_id = u.user_id
     INNER JOIN tbl_status as s ON c.status_id = s.status_id
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
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">วันและเวลา</th>        
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
         <?php echo date("d-m-Y , H:i:s", strtotime($row['date_case'])); ?>
        </td>
         <?php   } ?>  
      </tr>
    </tbody>
  </table>
  
          



 