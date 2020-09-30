<?php

if(isset($_GET['phone'])){
		
	require('../8mm/connection.php');
	
	$phone = $_GET['phone'];

	$sel_user = "select * from users where phone = '$phone' ";
	$run_user = mysqli_query($conn, $sel_user);

	if(mysqli_num_rows($run_user) == 0){
		
		$insert = "insert into users(phone,date) values('phone',NOW())";
		$run_insert = mysqli_query($conn, $insert);
		
		if($run_insert){
			
			$status = "ok";
			$select = "select * from users where phone = '$phone' ";
			$run_select = mysqli_query($conn, $select);
			$row = mysqli_fetch_array($run_select);
			$id = $row['id'];
		}else{
			
			$status = "Failed";
			
		}
		
	}else{
		$status = "already";
	}
	
	echo json_encode(array("response"=>$status, "id"=>$id));
	mysqli_close($conn); 
	
}
	

?>