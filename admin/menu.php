<?php
session_start();
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4" style="background-color:#0000CD">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Helpdesk Support</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
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
            <a href="case_worker.php" class="nav-link <?php if($menu=="case_worker"){echo "active";} ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>ดูตารางงานช่าง</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="worker.php" class="nav-link <?php if($menu=="worker"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>จัดการข้อมูลช่าง</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="employee.php" class="nav-link <?php if($menu=="employee"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>จัดการข้อมูลพนักงาน</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="status.php" class="nav-link <?php if($menu=="status"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>จัดการข้อมูลสถานะ</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="admin_profile.php" class="nav-link <?php if($menu=="admin_profile"){echo "active";} ?> ">
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