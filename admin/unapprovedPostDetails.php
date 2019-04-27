<?php include("includes/header.php"); ?>
  <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        
    <?php include("includes/top_nav.php") ?>

        <!-- Sidebar Menu Items -->

    <?php include("includes/side_nav.php"); ?>
       <!-- /.navbar-collapse -->
    </nav>

<?php
    $postIdFromURL = $_GET["id"];
    $viewQuery = mysqli_query($con,"SELECT * FROM post WHERE id='$postIdFromURL'");

    $vq=mysqli_fetch_array($viewQuery);
	$postId = $vq["id"];
	$date_time = $vq["date_time"];
	$title = $vq["problem_title"];
	$address = $vq["address"];
	$area = $vq["area"];
	$image = $vq["image"];
	$details = $vq["details"];
   $current_status = $vq["current_status_of_work"];
?>

<?php 
    if (isset($_POST["Submit_comment"])) {
        $name = mysqli_real_escape_string($con,$_POST["name"]);
        $email = mysqli_real_escape_string($con,$_POST["email"]);
        $comment = mysqli_real_escape_string($con,$_POST["comment"]);
        date_default_timezone_set("Asia/Dhaka");
        $date_time_now = date("M-d-Y H:i:s");
        

        if(empty($name)|| empty($email) || empty($comment)){
            $_SESSION["ErrorMessage"]="Fields can't be empty";
        }elseif(strlen($comment)>500){
            $_SESSION["ErrorMessage"]="Please write your comment within 500 charecter";
        }else{
            $query = mysqli_query($con, "INSERT INTO comments VALUES('','$date_time_now','$name','$email','$comment','OFF','','$postIdFromURL')");
            if ($query) {
                $_SESSION["SuccessMessage"]="Comment submited successfully";
                Redirect_to("full-post.php?id={$postIdFromURL}");
            }else{
                $_SESSION["ErrorMessage"]="Submition failed, Please try again...";
                Redirect_to("full-post.php?id={$postIdFromURL}");
            }
        }
    }
?>


       <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-left">
                        <div class="about-title">
                            <h3><?php echo $title; ?></h3>
                        </div>
                        <div class="about-img image-fulwidth"><img src="Upload/problems/<?php echo $image; ?>">
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="data-post">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Complainant Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>Kshiti Ghelani</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Location</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $address; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Area</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $area; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Submit Date</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $date_time; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="full-post-detalis">
                        <h2>Details about Problem</h2>

                        <p><?php echo $details; ?></p>
                    </div>
                </div>
            </div>
            <br><hr>
            <a href="newPostList.php"><span class="btn btn-info fa fa-arrow-left"> Back</span></a>
            <a href="approvePost.php?id=<?php echo $postId; ?>"><span class="btn btn-success pull-right">Approve</span></a> 
        </div>
    </div>
<?php include_once 'includes/footer.php'?>
