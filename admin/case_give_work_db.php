<?php 
		echo '<meta charset="utf-8">';
		include('condb.php');
		 //echo "<pre>";
		 //print_r($_GET);
		 //echo "</pre>";
		 //exit();
			
			$tec_id = mysqli_real_escape_string($con,$_GET["tec_id"]);
			$case_id = mysqli_real_escape_string($con,$_GET["case_id"]);
            $date_assign = date('Y-m-d H:i:s');
			$sql = "UPDATE tbl_case SET
				tec_id=$tec_id,
                date_assign='$date_assign',
                status_id=2
				WHERE case_id='$case_id'
				 ";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($con);
	
	if($result){
	echo '<script>';
    echo "window.location='index.php?do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='index.php?act=add&do=f';";
    echo '</script>';
}
?>