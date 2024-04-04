<?php
//print_r($_POST);
//exit();

include("condb.php");


if(isset($_POST["image"]))
{
	$data = $_POST["image"];
    $user_id  = $_POST["user_id"];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
	$imageName = 'upload/' . time() . '.png';
	$newname = time() . '.png';

	file_put_contents($imageName, $data);

	echo $imageName;


	$sql = "UPDATE tbl_login SET 
			u_img='$newname'
			WHERE user_id=$user_id
				 ";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($con);
}
?>