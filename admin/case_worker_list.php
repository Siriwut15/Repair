<?php 
       $tec_id = $_GET['tec_id'];
       include("condb.php"); // เชื่อมต่อฐานข้อมูล
       $query_status2 = "SELECT count(case_id) as cid FROM tbl_case WHERE status_id = 2 AND tec_id = $tec_id";
       $result2 = mysqli_query($con, $query_status2);
       $row_st2 = mysqli_fetch_array($result2);

       $query_status3 = "SELECT count(case_id) as cid FROM tbl_case WHERE status_id = 3 AND tec_id = $tec_id";
       $result3 = mysqli_query($con, $query_status3);
       $row_st3 = mysqli_fetch_array($result3);

       $query_status4 = "SELECT count(case_id) as cid FROM tbl_case WHERE status_id = 4 AND tec_id = $tec_id";
       $result4 = mysqli_query($con, $query_status4);
       $row_st4 = mysqli_fetch_array($result4);
       //echo $row_st2['cid'];
       //echo $query_status2;
       //exit();


?>

<div class="row">
    <div class="col-12 col-sm-4">
        <div class="info-box bg-red">
            <div class="info-box-content">
                <span class="info-box-text text-center text-light">กำลังดำเนินการ</span>
                <span class="info-box-number text-center text-light mb-0"><?php echo $row_st2['cid']; ?></span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="info-box bg-yellow">
            <div class="info-box-content">
                <span class="info-box-text text-center text-light">กำลังดำเนินการซ่อม</span>
                <span class="info-box-number text-center text-light mb-0"><?php echo $row_st3['cid']; ?></span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="info-box bg-green">
            <div class="info-box-content">
                <span class="info-box-text text-center text-light">ซ่อมเสร็จแล้ว</span>
                <span class="info-box-number text-center text-light mb-0"><?php echo $row_st4['cid']; ?></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <?php
         $tec_id = $_GET['tec_id'];
  include("condb.php"); // เชื่อมต่อฐานข้อมูล
     $query_case = "SELECT c.*,u.u_name,u.u_lastname,s.status_name,u.u_tel,u.u_email
     FROM tbl_case as c
     INNER JOIN tbl_login as u ON c.user_id = u.user_id
     INNER JOIN tbl_status as s ON c.status_id = s.status_id
     WHERE c.tec_id = $tec_id
     order by case_id " or die ("Error:" . mysqli_error());
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
                    <?php   } ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>