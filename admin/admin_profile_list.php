<?php
include("condb.php");
$ID = $_SESSION['user_id'];
$sql = "SELECT * FROM tbl_login WHERE user_id = $ID";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
// echo $sql;
// exit();
?>
<form action="admin_profile_db.php" method="post" accept-charset="utf-8">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control"  value="<?php echo $row['username']; ?>" name="username">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>Password</label>
				<input type="text" class="form-control"  value="<?php echo $row['password']; ?>" name="password">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>ชื่อ</label>
				<input type="text" class="form-control"  value="<?php echo $row['u_name']; ?>" name="u_name">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>นามสกุล</label>
				<input type="text" class="form-control"  value="<?php echo $row['u_lastname']; ?>" name="u_lastname">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>เบอร์โทร</label>
				<input type="text" class="form-control"  value="<?php echo $row['u_tel']; ?>" name="u_tel">
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>อีเมล์</label>
				<input type="text" class="form-control"  value="<?php echo $row['u_email']; ?>" name="u_email">
			</div>
		</div>
	</div>
	<center>
	<input type="hidden" name="user_id"  value="<?php echo $ID; ?>">
	<button type="submit" class="btn btn-success btn-block btn-sm"><i class="fa fa-bell"></i> บันทึกข้อมูลส่วนตัว</button></center>
</form>