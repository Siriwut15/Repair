<title>Repair system</title>
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
<!-- MDB -->

<style type="text/css">
  .divider:after,
  .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
  }

  .h-custom {
    height: calc(100% - 73px);
  }

  @media (max-width: 450px) {
    .h-custom {
      height: 100%;
    }
  }
</style>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="admin/dist/img/GameOn.png" class="img-fluid" alt="Sample image">
      </div>

      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="check_login.php" method="post">
          <p class="lead fw-normal mb-0 me-3" style='font-size:50px' align="center">Login Helpdesk</p><br>
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start"><br>
            <p class="lead fw-normal mb-0 me-3">Sign in </p><br>
          </div>
          </br>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" name="username" required class="form-control form-control-lg"
              placeholder="Enter a valid username" />
            <label class="form-label" for="form3Example3">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="password" required class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
            </div>
            <a href="rq_pass.php" class="forgot-password" target="_blank">Forgot Password?</a></button>
          </div>
          <div>
    <button type="submit" class="btn btn-primary btn-sm" style="padding: 10px 20px; margin-center: 50px;">Login</button>
    <button class="btn btn-danger btn-sm" style="padding: 10px 20px;">
        <a href="register.php" target="_blank" style="text-decoration: none; color: white;">Register</a>
    </button>
</div>

        </form>
      </div>
    </div>
  </div>

  <center>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 "
      style="background-color:#6C7B8B">
      <div style="text-align:center;width:100%;">
        <font style='font-size:30px' color='white'>ระบบแจ้งซ่อม Helpdesk Support</font> 
      </div>

      <!-- Centerคำสั่งเปลี่ยนสีและเอาไว้ขยับข้อความไว้ตรงกลาง -->

</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>