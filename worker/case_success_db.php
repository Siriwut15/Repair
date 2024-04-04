<?php 
		echo '<meta charset="utf-8">';
		include('condb.php');
		 echo "<pre>";
		 //print_r($_GET);
		 //echo "</pre>";
		 //exit();
			
			$case_id = mysqli_real_escape_string($con,$_GET["case_id"]);
            $date_close = date('Y-m-d H:i:s');
			$sql = "UPDATE tbl_case SET
                date_close='$date_close',
                status_id=4
				WHERE case_id='$case_id'
				 ";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($con);
	
	if($result){
	echo '<script>';
    echo "window.location='case_success.php?do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='case_success.php?act=add&do=f';";
    echo '</script>';
}
?>