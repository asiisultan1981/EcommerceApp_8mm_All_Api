<?php

if(isset($_GET['email'])){
	
	
	require('../8mm/connection.php');
	
	$email = $_GET['email'];
	$password = $_GET['password'];

	$sel_user = "select * from users where email = '$email' AND password = '$password' ";
	$run_user = mysqli_query($conn, $sel_user);

	if(mysqli_num_rows($run_user) == "1"){
		
					$status = "OK";
					
					$row = mysqli_fetch_array($run_user);
					$id = $row['id ']; 
		}else{
			
		$status = "no account";
	}
	
	echo json_encode(array("response"=>$status, "id"=>id));
	mysqli_close($conn); 
	
	
	
	
	
}
	

?>