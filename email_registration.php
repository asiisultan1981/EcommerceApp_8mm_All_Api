<?php

if(isset($_GET['email'])){
 
	require('../8mm/connection.php');
	
	$name = $_GET['name'];
	$email = $_GET['email'];
	$password = $_GET['password'];
	
	$sel_user = "select * from users where email = '$email'";
	$run_user = mysqli_query($conn, $sel_user);

	if(mysqli_num_rows($run_user) == "0")
	{
		
		$insert = "insert into users(name,email,password,date) values('$name','email','password',NOW())";
		$run_insert = mysqli_query($conn, $insert);
		
		if($run_insert)
		{
			$status = "OK";
		}
		else
		{
			$status = "Failed";
		}
	
	}else
	
	{
	    $status = "already";
	}
	
	echo json_encode(array({"response"=>$status}));
	mysqli_close($conn); 
}
	
?>