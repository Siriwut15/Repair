<?php 
		echo '<meta charset="utf-8">';
		include('condb.php');
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit();
			$status_id = mysqli_real_escape_string($con,$_POST["status_id"]);	
			$status_name = mysqli_real_escape_string($con,$_POST["status_name"]);
			
			$sql = "UPDATE tbl_status SET 
				status_name='$status_name'
	
				WHERE status_id=$status_id
				 ";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($con);
	
	if($result){
	echo '<script>';
    echo "window.location='status.php?do=finish';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='status.php?act=add&do=f';";
    echo '</script>';
}
?>