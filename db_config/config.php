<?php
	//session_start();
	$con = mysqli_connect("localhost","root","","ideal_city"); // Connection variable
	if(mysqli_connect_errno()){
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>
