
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHETUPON WEB-TSHIRT</title>
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>

    <!-- banner -->

    <?php
        include "banner.php";
    ?>

    <!-- end banner -->
    
    <!-- navbar -->

    <div class="container">
    <nav class="nav navbar-default">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">CHE-TSHIRT</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

    <ui class="nav navbar-nav">
    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> หน้าหลัก</a></li>
    <li><a href="#"><span class="glyphicon glyphicon-tasks"></span> สินค้า</a></li>
    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"> ตะกร้าสินค้า</span></a></li>
    <li><a href="#"><span class="glyphicon glyphicon-file"></span> วิธีสั่งซื้อ</a></li>
    <li><a href="#"><span class="glyphicon glyphicon-usd"></span> วิธีชำระเงิน</a></li>
    <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> ติดต่อเรา</a></li>
    </ui>

    <ui class="nav navbar-nav navbar-right">
    <li><a href="register.php"><span class="glyphicon glyphicon-usd"></span> สมัครสมาชิก</a></li>
    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a></li>
    </ui>

    </div>

    </nav>
    </div><br>

    <!-- end navbar -->

    <!-- show repass  -->

    <div class="container">
    <div class="panel panel-default">
    <div class="panel-body">
    <div class="row text-center">
    <div class="col-md-3"></div>
    
    <div class="col-md-6">
    <div class="panel panel-info">
    <div class="panel-heading text-center"><h4>กู้คืนรหัสผ่าน</h4></div>
    <div class="panel-body">
    
    <form action="que_uprepass.php" method="post">
    <table class="table table-hover">

    <tr>
    <td>- ใส่อีเมลของผู้ใช้งาน -</td>
    </tr>
    
    <tr>
    <td>
    <span id="textfield1">
    <input type="text" name="email" id="email" class="form-control">
    <label for="email"></label>
    </span>
    </td>
    </tr>


    <tr>
    <td align="center" colspan="2">
    <input type="submit" name="submit" id="button2"  value="ยืนยัน" class="btn btn-success">
    <input type="reset" name="reset" id="button3"  value="ยกเลิก" class="btn btn-danger">
    </td>
    </tr>
    
    </table>
    </form>

    </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>

    <!-- end show repass -->

    <!-- footer --> 

    <div class="container">
    <div class="panel panel-primary">
    <div class="panel-heading text-center">
    <h5><span class="glyphicon glyphicon-home"></span> ร้าน : CHE-SHOPPING <span class="glyphicon glyphicon-home"></span></h5>
    <h5><span class="glyphicon glyphicon-time"></span> เปิดให้บริการ 24 ชั่วโมง <span class="glyphicon glyphicon-time"></span></h5>
    <h5><span class="glyphicon glyphicon-usd"></span> Create : ELVIS & BIGGA STUDIO <span class="glyphicon glyphicon-usd"></span></h5>
    </div>
    </div>
    </div>

    <!-- end footer -->

</body>
</html>