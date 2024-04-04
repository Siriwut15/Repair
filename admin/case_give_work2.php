<?php 
$case_id = $_GET['case_id'];
  include("condb.php"); // เชื่อมต่อฐานข้อมูล
     $query_worker = "SELECT * FROM tbl_login WHERE user_level = 'worker'
        order by user_id " or die ("Error:" . mysqli_error());
       $result = mysqli_query($con, $query_worker);
  ?>
<section class="content">
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                <?php foreach ($result as $row) {  ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            ข้อมูลรายละเอียดช่าง
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b><?php echo $row['u_name'].' '.$row['u_lastname'] ?></b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> worker </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-lg fa-building"></i></span>
                                            Email Address: <?php echo $row['u_email']; ?> </li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Phone #: <?php echo $row['u_tel']; ?> </li>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="upload/<?php echo $row['u_img']; ?>" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="index.php?tec_id=<?php echo $row['user_id']; ?>&act=worker"
                                    class="btn btn-sm bg-warning">
                                    <i class="fas fa-comments"></i>ตารางงาน
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>