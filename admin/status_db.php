<?php 
		echo '<meta charset="utf-8">';
		include('condb.php');
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit();

	$status_name = mysqli_real_escape_string($con,$_POST["status_name"]);



	$sql = "INSERT INTO tbl_status
	(
	status_name
	)
	VALUES
	(
	'$status_name'
	)";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($con);

	if($result){
	echo '<script>';
    echo "window.location='status.php?do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='status.php?do=f';";
    echo '</script>';
}
?>