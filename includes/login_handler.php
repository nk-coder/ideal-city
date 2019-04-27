<?php
	if(isset($_POST['log_submit'])){
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //Sanitize email

		$_SESSION['email'] = $email; //store email into session variable
		$password = md5($_POST['password']); // get password

		$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		//var_dump($check_database_query); exit;
		$check_login_query = mysqli_num_rows($check_database_query);

		if($check_login_query == 1){
			$row = mysqli_fetch_array($check_database_query);
			$name = $row['name'];

			$_SESSION['username'] = $username;
			header("location: index.php");
		}else{
			$_SESSION["ErrorMessage"] = "Email or Password was incorrect!!";
			Redirect_to('login-page.php');
		}
		}
?>
