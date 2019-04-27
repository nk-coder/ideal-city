<?php include_once("db_config/config.php"); ?>
<?php include_once("includes/session.php") ?>
<?php include_once("includes/function.php") ?>

<?php include_once 'template/header.php' ?>
    <?php include_once 'template/nav.php' ?>



<?php 
    $error_array = array();

    if(isset($_POST['signup_submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $username= mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = md5($_POST['password']);
        $confirmPassword = md5($_POST['confrimPassword']);
        $phone = $_POST['phone'];
        $NID = $_POST['NID_No'];
        $image = $_FILES['image']['name'];
        $area = $_POST['area'];
        $target = "Upload/users/".basename($_FILES["image"]["name"]);


        if (empty($name) || empty($username) || empty($email) || empty($password) || empty($phone) || empty($NID) || empty($area)) {
            array_push ($error_array,"All Field must be filled out");
        }
        if($password!==$confirmPassword){
            array_push ($error_array,"Passwords doesn't matched");
        }

        $username_check = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
        $num_of_row = mysqli_num_rows($username_check);
        if($num_of_row > 0){
            array_push ($error_array,"Username already exist");
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            //Check if email already exist or not
            $email_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
            //Count the number of rows returned

            $num_row = mysqli_num_rows($email_check);
            //print_r($num_row); exit;
            if($num_row > 0){
                array_push ($error_array,"Email already exist");
            }
        }else{
            array_push ($error_array,"Invalid Format");
        }

        $phone_check = mysqli_query($con,"SELECT phone FROM users WHERE phone='$phone'");
        $num_of_phone = mysqli_num_rows($phone_check);
        if($num_of_phone > 0){
            array_push ($error_array,"This phone number already exist");
        }
        if(empty($error_array)){
             $query = mysqli_query($con, "INSERT INTO users VALUES('','$name','$username','$email','$password','$phone','$NID','$image','$area','OFF')");
            move_uploaded_file($_FILES["image"]["tmp_name"], $target);// save image on upload folder

            array_push($error_array, "Your registration complete successfully");
            
        }
    }
?>



    <div class="header-area header-area-lognin">
        <div class="container">
            <h1 class="form-heading">Registration Form</h1>
            <div>
                   <?php if(in_array("Your registration complete successfully", $error_array)) echo "<span style='color: #e74c3c;'>Your registration complete successfully.\n Please wait for activation.</span><br />";
                            ?>
                </div>

            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <h2>User Registration</h2>
                    </div>


                    <form action="signup.php" method="POST"  enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" name="name"  placeholder="Name" type="text">
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="username"  placeholder="Username" type="text">
                            <?php if(in_array("Username already exist", $error_array)) echo "<span style='color: #e74c3c;'>Username already exist.</span><br />";
                            ?>
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="email"  placeholder="Email Address" type="email">
                            <?php if(in_array("Email already exist", $error_array)) echo "<span style='color: #e74c3c;'>Email already exist.</span><br />";
                                    else if(in_array("Invalid email format", $error_array)) echo "<span style='color: #e74c3c;'>Invalid email format.</span> <br />";
                                ?>
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="password"  placeholder="Password" type="password">
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="confrimPassword" placeholder="Confrim Password" type="password">
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="phone"  placeholder="Phone" type="text">
                            <!-- Error showing for phone -->
                                <?php if(in_array("This phone number already exist", $error_array)) echo "<span style='color: #e74c3c;'>This phone number already exist</span><br />";
                                ?>
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="NID_No" placeholder="NID No" type="text">
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="area"  placeholder="Area" type="text">
                        </div>

                        <div class="form-group">
                            <label for="image_upload">Upload Your Image</label>
                            <input id="image_upload" name="image" type="file">
                        </div>

                        
                        <button class="btn btn-primary" name="signup_submit" type="submit">Signup</button>
                    </form>
                </div>
            
            </div>
        </div>
    </div>

<?php include_once 'template/footer.php'?>