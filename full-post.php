<?php include_once("db_config/config.php"); ?>
<?php include_once("includes/session.php") ?>
<?php include_once("includes/function.php") ?>
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

<?php include_once 'template/header.php' ?>
    <?php include_once 'template/nav.php' ?>

    <div class="about-portfolio">
        <div class="container">
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

            <!-- Comment Section -->
            <h3>Comments</h3><hr>
            <div>
               <?php
               echo ErrorMessage();
                echo SuccessMessage();
               ?>
            </div>
            <!-- show comments -->
            <?php 
                $extracComments = mysqli_query($con, "SELECT * FROM comments WHERE post_id='$postIdFromURL' AND approved='ON'");
                
                while ($comments = mysqli_fetch_array($extracComments)) {
                    $commentDate = $comments['date_time'];
                    $commenterName = $comments['name'];
                    $commentsData = $comments['comment'];
            ?>
            <div class="comment_block">
                <div class="cmnt_img_block">
                    <img class="full_left" src="assets/image/head_wet_asphalt.png">
                </div>
                <div class="cmnt_data_block">
                    <p class="commentor"><?php echo $commenterName; ?></p>
                    <p class="comnt_date"><?php echo $commentDate; ?></p>
                    <p class="cmnt_data"><?php echo $commentsData; ?></p>
                </div>
            </div>
            <br>
            <hr>
            <?php } ?>

            <!-- Comment submit section -->
            <span class="FieldInfo">Share your thoughts about this post:-</span><br><br>

            <div>
                <form action="full-post.php?id=<?php echo $postIdFromURL; ?>" method="POST" >
                    <fieldset>
                        <div class="form-group">
                            <label for="name"><span class="FieldInfo">Name</span> </label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="email"><span class="FieldInfo">Email</span></label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="email@example.com">
                        </div>

                        <div class="form-group">
                            <label for="comment_area"><span class="FieldInfo">Comment</span></label>
                            <textarea class="form-control" id="post_text" name="comment" id="comment_area" placeholder="Write your comments..."></textarea> 
                        </div>
                        <br>

                        <input type="Submit" name="Submit_comment" class="btn btn-primary" value="Submit">
                    </fieldset>
                    <br>
                </form>
            </div>
        </div>
    </div>
<?php include_once 'template/footer.php'?>
