<?php

include('condb.php');

	$user_id  = mysqli_real_escape_string($con,$_GET["user_id"]);
	$sql = "DELETE FROM tbl_login WHERE user_id=$user_id";
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());	
	mysqli_close($con);

		
	if($result){
	echo '<script>';
    echo "window.location='worker.php';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='worker.php';";
    echo '</script>';
}

?>