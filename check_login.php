<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php 
session_start();
// print_r($_POST);
// echo "<pre>";
// exit();

     if(isset($_POST['username'])){
        //connection
                  include("condb.php");
        //รับค่า 
                  $username = mysqli_real_escape_string($con,$_POST['username']);
                  $password = mysqli_real_escape_string($con,$_POST['password']);
         // query tbl_login 
                  $sql_login = "SELECT * FROM tbl_login
                  WHERE username = '".$username."' AND password = '".$password."'
                  ";
                  $result = mysqli_query($con, $sql_login);
                  // echo $sql_login;
                  // exit();
                  if (mysqli_num_rows($result)==1) {
                  	$row = mysqli_fetch_array($result);
                  	$_SESSION["user_id"] = $row["user_id"];
                  	$_SESSION["user_level"] = $row["user_level"];
                  	$_SESSION["u_name"] = $row["u_name"];
                  	$_SESSION["u_lastname"] = $row["u_lastname"];
                    $_SESSION["user_status"] = $row["user_status"];
                    $_SESSION["u_img"] = $row["u_img"];

                  	if ($row["user_level"]=="admin") {
                  		Header("Location: admin/");
                  	}elseif ($row["user_level"]=="employee") {
                       if ($row["user_status"]!=1) {
                        echo '<script>
                        setTimeout(function() {
                        swal({
                        title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้",
                        type: "error"
                        }, function() {
                        window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                        }, 1000);
                        </script>';
                    }else{
                      Header("Location: employee/"); }
                    }elseif ($row["user_level"]=="worker") {
                      if ($row["user_status"]!=1) {
                       echo '<script>
                       setTimeout(function() {
                       swal({
                       title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้",
                       type: "error"
                       }, function() {
                       window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
                       });
                       }, 1000);
                       </script>';
                   }else{
                     Header("Location: worker/"); }
                   }

                  }else{
                  	 	echo "<script>";
                    	echo "alert(\" username หรือ password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    	echo "</script>";
                  }
       }
?>