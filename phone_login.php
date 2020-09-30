<?php

if(isset($_GET['phone'])){
	
	
	require('../8mm/connection.php');
	
	$phone = $_GET['phone'];
	

	$sel_user = "select * from users where phone = '$phone' ";
	$run_user = mysqli_query($conn, $sel_user);

	if(mysqli_num_rows($run_user) == "1"){
		
					$status = "OK";
					
					$row = mysqli_fetch_array($run_user);
					$user_id = $row['id ']; 
		}else{
			
		$status = "no account";
	}
	
	echo json_encode(array("response"=>$status, "id"=>$id));
	mysqli_close($conn); 
	
	
	
	
	
}
	

?>