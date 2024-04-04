<?php 
		echo '<meta charset="utf-8">';
		include('condb.php');
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// exit();

	$user_id = mysqli_real_escape_string($con,$_POST["user_id"]);
	$name_case = mysqli_real_escape_string($con,$_POST["name_case"]);
	$detail_case = mysqli_real_escape_string($con,$_POST["detail_case"]);
	$place_case = mysqli_real_escape_string($con,$_POST["place_case"]);
	$img_case = mysqli_real_escape_string($con,$_POST["img_case"]);
	


	$sql = "INSERT INTO tbl_case
	(
    user_id,
	name_case,
	detail_case,
	place_case,
	img_case
	)
	VALUES
	(
	'$user_id',
	'$name_case',
	'$detail_case',
	'$place_case',
	'$img_case'
	)";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($con);

	if($result){
	echo '<script>';
    echo "window.location='show.php?do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='show.php?do=f';";
    echo '</script>';
}
?>