<?php 
		echo '<meta charset="utf-8">';
		include('condb.php');
		$user_id = mysqli_real_escape_string($con,$_POST["user_id"]);

		$query_status = "SELECT user_status FROM tbl_login WHERE user_id = $user_id";
		$result_query = mysqli_query($con, $query_status) or die ("Error in query: $query_status " . mysqli_error());
		$row = $result_query -> fetch_assoc();
		$st = $row['user_status'];

		if ($st != 1) {
			$st_full = 1;
  
		}else if ($st != 0){
			$st_full = 0;
		}

		$sql_update = "UPDATE tbl_login SET user_status = '".$st_full."' WHERE user_id = $user_id";
		$result_update = mysqli_query($con, $sql_update) or die ("Error in query: $sql_update " . mysqli_error());
// ?>