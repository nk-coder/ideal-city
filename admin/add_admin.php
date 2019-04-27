<?php include("includes/header.php"); ?>

<!--PHP code for new admin registration-->
<?php
	$added_by = $_SESSION['username'];
	$name = "";
	$phone = "";
	$username = "";
	$email = "";
	$password = "";
	$error_array = array();

	if(isset($_POST['create'])){
		//Name
		$name = strip_tags($_POST['name']); //Remove html tags
		$name = str_replace(' ', '', $name); //remove spaces
		$name = ucfirst(strtolower($name)); // uppercase first letter
		$_SESSION['name'] = $name; // Store first name into session variable.

		//phone
		$phone = strip_tags($_POST['phone']); //Remove html tags
		$phone = str_replace(' ', '', $phone); //remove spaces
		$_SESSION['phone'] = $phone; // Store first phone into session variable.

		//usernam3e
		$username = strip_tags($_POST['username']); //Remove html tags
		$username = str_replace(' ', '', $username); //remove spaces
		//$_SESSION['username'] = $username; // Store username into session variable.

		//Email
		$email = strip_tags($_POST['email']); //Remove html tags
		$email = str_replace(' ', '', $email); //remove spaces
		$_SESSION['email'] = $email; // Store email into session variable.

		//password
		$password = strip_tags($_POST['password']); //Remove html tags

		$phone_check = mysqli_query($con,"SELECT phone FROM admins WHERE phone='$phone'");
		$num_of_phone = mysqli_num_rows($phone_check);
		if($num_of_phone > 0){
			array_push ($error_array,"This phone number already exist");
		}

		$username_check = mysqli_query($con,"SELECT username FROM admins WHERE username='$username'");
		$num_of_row = mysqli_num_rows($username_check);
		if($num_of_row > 0){
			array_push ($error_array,"Username already exist");
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);

			//Check if email already exist or not
			$email_check = mysqli_query($con, "SELECT email FROM admins WHERE email='$email'");
			//Count the number of rows returned

			$num_row = mysqli_num_rows($email_check);
			//print_r($num_row); exit;
			if($num_row > 0){
				array_push ($error_array,"Email already exist");
			}
		}else{
			array_push ($error_array,"Invalid Format");
		}

		if(empty($error_array)){
			$password = md5($password); //encrypt password

			$query = mysqli_query($con, "INSERT INTO admins VALUE('', '$name', '$phone', '$email', '$username', '$password','$added_by')");

			array_push($error_array, "<span style='color: #14C800;'>New admin created!</span><br>");
			

			//Clear session variables 
			$_SESSION['name'] = "";
			$_SESSION['email'] = "";
		}
	}
?>

<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <?php include("includes/top_nav.php") ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include("includes/side_nav.php"); ?>
        <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add New Admin  
                        </h1>
                        <?php if(in_array("<span style='color: #14C800;'>New admin created!</span><br>", $error_array)) echo "<span style='color: #14C800;'>New admin created!</span><br>"; ?>

						<form action="" method="POST" enctype="multipart/form-data">
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group">
									<label for="first name">Name</label>
									<input type="text" name="name" class="form-control" required>
								</div>

								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" name="phone" class="form-control" required>
									<!-- Error showing for phone -->
								<?php if(in_array("This phone number already exist", $error_array)) echo "<span style='color: #e74c3c;'>This phone number already exist</span><br />";
								?>
								</div>
								

														
							    <div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" class="form-control" required>
									<!-- Error showing for email -->
								<?php if(in_array("Email already exist", $error_array)) echo "<span style='color: #e74c3c;'>Email already exist.</span><br />";
									else if(in_array("Invalid email format", $error_array)) echo "<span style='color: #e74c3c;'>Invalid email format.</span> <br />";
								?>
								</div>
								

								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" class="form-control" required>
									<?php if(in_array("Username already exist", $error_array)) echo "<span style='color: #e74c3c;'>Username already exist.</span><br />";
								?>
								</div>
								
														
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" class="form-control" required>
							   </div>

								<div class="form-group">
									<input type="submit" name="create" class="btn btn-primary pull-right" >
							    </div>
								
							</div>  
						</form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
  <?php include("includes/footer.php"); ?>



