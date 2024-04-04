<?php
session_start();
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Helpdesk Support</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="../admin/upload/<?php echo $u_img;?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block">คุณ <?php echo $_SESSION["u_name"];?></a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-header">Helpdesk Support</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>ดูงานแจ้งซ่อม</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="case_sent.php" class="nav-link <?php if($menu=="case_sent"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>บันทึกแจ้งซ่อม</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="case_success.php" class="nav-link <?php if($menu=="case_success"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>แจ้งซ่อมเสร็จแล้ว</p>
             </a>
          </li>
           <li class="nav-item">
            <a href="worker_profile.php" class="nav-link <?php if($menu=="worker_profile"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>ข้อมูลส่วนตัว</p>
            </a>
          </li>       
          <li class="nav-header">ออกจากระบบ</li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link"  onclick="return confirm('ยืนยันออกจากระบบ !!');">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">ออกจากระบบ</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>