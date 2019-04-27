<?php include_once("db_config/config.php"); ?>
<?php include_once("includes/session.php") ?>
<?php include_once("includes/function.php") ?>
<?php confirm_login() ?>

<?php
	if (isset($_POST["Submit"])) {
        $complain_name = $_SESSION['name'];
        $complain_email = $_SESSION['email'];
        $complain_phone = $_SESSION['phone'];
		$address = mysqli_real_escape_string($con,$_POST["address"]);
		$area = mysqli_real_escape_string($con,$_POST["area"]);
		$problem_title = mysqli_real_escape_string($con,$_POST["problem_title"]);
		$details = $_POST["details"];
    	$image = $_FILES["image"]["name"];
		date_default_timezone_set("Asia/Dhaka");
    	$date_time_now = date("M-d-Y H:i:s");
        $current_status = "New";
    	$complain = $_SESSION['user_id'];
    	$target = "Upload/problems/".basename($_FILES["image"]["name"]);
 
    	if(empty($address)){
    		$_SESSION["ErrorMessage"]="Address can't be empty";
    		Redirect_to("submit-post.php");
    	}elseif(empty($problem_title)){
    		$_SESSION["ErrorMessage"]="Title can't be empty";
    		Redirect_to("submit-post.php");
    	}elseif(strlen($problem_title)<3){
    		$_SESSION["ErrorMessage"]="Title should be at least 2 characters";
    		Redirect_to("submit-post.php");
    	}else{
    		$query = mysqli_query($con, "INSERT INTO post VALUES('','$complain_email','$complain_phone','$address','$area','$problem_title','$details','$image','$date_time_now','$current_status','$complain','NO','')");
    		move_uploaded_file($_FILES["image"]["tmp_name"], $target);// save image on upload folder

    		if($query) {
    			$_SESSION["SuccessMessage"]="Your post added successfully. We will consider your problem soon";
    			Redirect_to("submit-post.php");
    		}else{
    			$_SESSION["ErrorMessage"]="Failed to submit new post";
    			Redirect_to("submit-post.php");
    		}
    	}
	}
?>

<?php include_once 'template/header.php' ?>
    <?php include_once 'template/nav.php' ?>

    <div class="submit-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="submit-condition">
                        <h3>Condition:</h3>

                        <ol>
                            <li>Lorem ipsum dolor sit amet.</li>


                            <li>Lorem ipsum dolor sit amet.</li>


                            <li>Lorem ipsum dolor sit amet.</li>


                            <li>Lorem ipsum dolor sit amet.</li>


                            <li>Lorem ipsum dolor sit amet.</li>


                            <li>Lorem ipsum dolor sit amet.</li>


                            <li>Lorem ipsum dolor sit amet.</li>


                            <li>Lorem ipsum dolor sit amet.</li>
                        </ol>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="submit-right">
                        <h2>Feel Free to say your Problems</h2>
                        <div>
                           <?php
                           echo ErrorMessage();
        					echo SuccessMessage();
        				   ?>
                        </div>
                        <form action="submit-post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="address">address:</label>
                                <input class="form-control" name="address" id="address" placeholder="address" type="text">
                            </div>


                            <div class="form-group">
                                <label for="sel1">Area (select one):</label>
                                <select class="form-control" id="sel1" name="area">
                                   <?php
                                   $area_data = mysqli_query($con, "SELECT * FROM areas ORDER BY id DESC");
                                   while($ad = mysqli_fetch_array($area_data)){
      										$id = $ad["id"];
      										$areaName = $ad["name"];
      									   ?>
      										<option><?php echo $areaName ?></option>
      									   <?php }?>
                                </select>
                            </div>

                            <div class="form-group">
                              <label for="problem_title">Problem Title:</label>
                              <input class="form-control" name="problem_title" id="problem_title" placeholder="Problem Title" type="text">
                            </div>
                            <div class="form-group">
                                <label for="image_upload">Image Upload</label>
                                <input id="image_upload" name="image" type="file">
                            </div>

                            <div class="form-group">
                                <label for="problem_details">Details:</label>
                                <textarea class="form-control" name="details" id="problem_details" placeholder="Problems Details" rows="5"></textarea>
                            </div>

                            <button class="btn btn-default" type="Submit" name="Submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include_once 'template/footer.php'?>
