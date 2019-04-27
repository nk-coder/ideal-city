<?php include_once("db_config/config.php"); ?>
<?php include_once("includes/session.php") ?>
<?php include_once("includes/function.php") ?>
<?php
   if(isset($_SESSION['email']) & !empty($_SESSION['email'])){
   		header("Location: index.php");
   	}
?>
<?php include_once 'template/header.php' ?>
<?php include_once 'template/nav.php' ?>
<?php
    if (isset($_POST["log_submit"])) {
      $email = mysqli_real_escape_string($con,$_POST["email"]);
      //$_SESSION['email'] = $email; //store email into session variable
      $password = md5($_POST['password']);

      if(empty($email) || empty($password)){
         $_SESSION["ErrorMessage"]="All Field must be filled out";
         Redirect_to("login.php");
      }else{
         //check active users
         $check_active_user = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password' AND activation='ON'");
         $active_user_query = mysqli_num_rows($check_active_user);

         //check inactive users
         $check_inactive_user = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password' AND activation='OFF'");
         $inactive_user_query = mysqli_num_rows($check_inactive_user);

         if($active_user_query == 1){
         $row = mysqli_fetch_array($check_active_user);
         $user_id = $row['id'];
         $name = $row['name'];
         $username = $row['username'];
         $phone = $row['phone'];

         $_SESSION['email'] = $email;
         $_SESSION['username'] = $username;
         $_SESSION['name'] = $name;
         $_SESSION['user_id'] = $user_id;
         $_SESSION['phone'] = $phone;
         header("location: index.php");
         }elseif($inactive_user_query == 1) {
            $_SESSION["ErrorMessage"]="Sorry your account still not approved. please wait...";
            Redirect_to("login.php");
         }else{
            $_SESSION["ErrorMessage"]="Your email or password was incorrect";
             Redirect_to("login.php");
         }
      }

   }
?>

	<div class="header-area header-area-lognin">
		<div class="container">
			<h1 class="form-heading">login Form</h1>
			<div class="login-form">
				<div class="main-div">
					<div>
						<?php echo ErrorMessage();
                      echo SuccessMessage();
                  ?>
					</div>
					<div class="panel">
						<h2>User Login</h2>
						<p>Please enter your email and password</p>
					</div>
					<form action="" id="Login" method="post" name="Login">
						<div class="form-group">
							<input class="form-control" id="inputEmail" name="email" placeholder="Email Address" required="" type="email" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>">
						</div>
						<div class="form-group">
							<input class="form-control" id="inputPassword" name="password" placeholder="Password" type="password">
						</div>
						<div class="forgot">
							<a href="reset.html">Forgot password?</a>
						</div>
                  <button class="btn btn-primary" name="log_submit" type="submit">Login</button>
                  do not have account?
                  <a href="signup.php"class="btn btn-primary">Siginup</a>
					</form>
				</div>
			</div>
		</div>
	</div><?php include_once 'template/footer.php'?>
