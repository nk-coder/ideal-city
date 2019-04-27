<?php include_once("db_config/config.php"); ?>
<?php include_once("includes/session.php") ?>
<?php include_once("includes/function.php") ?>
<?php confirm_login() ?>
<?php include_once 'template/header.php' ?>
<?php include_once 'template/nav.php' ?>
<?php
   // collect user data
   $userEmail = $_SESSION['email'];
   //$user_id = $_SESSION['user_id'];
   $user_data = mysqli_query($con,"SELECT * FROM users WHERE email='$userEmail'");
   $ud=mysqli_fetch_array($user_data);
      $userId = $ud["id"];
      $name = $ud["name"];
      $email = $ud["email"];
      $phone = $ud["phone"];
      $NID_No = $ud["NID_NO"];
      $image = $ud["image"];
      $area = $ud["area"];

?>
	<div class="container emp-profile">
		<form method="post">
			<div class="row">
				<div class="col-md-4">
					<div class="profile-img">
						<img alt="" src="Upload/users/<?php echo $image; ?>">
						<div class="file btn btn-lg btn-primary">
							Change Photo <input name="file" type="file">
						</div>
					</div>
					<div class="profile-work">
						<input class="profile-edit-btn" name="btnAddMore" type="submit" value="Edit Profile">
					</div>
				</div>
				<div class="col-md-8">
					<div class="profile-head">
						<h5><?php echo $name; ?></h5>
					</div>
					<div class="profile-tab">
						<ul class="tab_button">
							<li class="ta_button_Bg1 active" role="presentation">
								<a aria-controls="Upwork" aria-expanded="true" data-toggle="tab" href="#Upwork" role="tab">About</a>
							</li>
							<li class="ta_button_Bg2" role="presentation">
								<a aria-controls="Freelancer" aria-expanded="false" data-toggle="tab" href="#Freelancer" role="tab">Your Posts</a>
							</li>
						</ul>


						<div class="tab-content">
							<div class="tab-pane fade active in" id="Upwork" role="tabpanel">
								<div class="row">
									<div class="col-md-6">
										<label>User Id</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $userId ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Name</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $name ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Email</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $email ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Phone</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $phone ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>NID No</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $NID_No ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Area</label>
									</div>
									<div class="col-md-6">
										<p><?php echo $area ?></p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="Freelancer" role="tabpanel">
								<table class="data-table table table-hover">
									<tr>
										<th>Title</th>
										<th>Date</th>
										<th>Status</th>
										<th></th>
									</tr>
                           <?php
                           //post data collect
                           $post_data = mysqli_query($con,"SELECT * FROM post WHERE user_id='$userId' ORDER BY date_time ASC");
                              while ($pd=mysqli_fetch_array($post_data)) {
                                 $postId = $pd["id"];
                                 $problem_title = $pd["problem_title"];
                                 $date_time = $pd["date_time"];
                                 $status = $pd["current_status_of_work"];

                           ?>
									<tr>
										<td><?php echo $problem_title ?></td>
										<td><?php echo $date_time ?></td>
										<td><?php echo $status ?></td>
										<td>
                                 <!-- <input class="btn btn-info" name="" type="button" value="Details"> -->
                                 <a href="full-post.php?id=<?php echo $postId; ?>"><span class="btn btn-info">Details</span></a> 
                              </td>
									</tr>
						         <?php } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
<?php include_once 'template/footer.php'?>
