<?php include("includes/header.php"); ?>

<?php 

	$error_array = array(); 

	if (isset($_POST["submit"])) {
		$current_status = mysqli_real_escape_string($con,$_POST["status"]);

    	
    		$getEditIdFromURL = $_GET['id'];
    		$query = mysqli_query($con, "UPDATE post SET current_status_of_work='$current_status'WHERE id='$getEditIdFromURL' ");
    		if ($query) {
    			array_push ($error_array,"Status updated successfully");
    		}else{
    			array_push ($error_array,"Status update Failed");
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
                            Update the status of post 
                        </h1>
                        <?php 
							$postId = $_GET['id']; //take id from url 
							$current_status_post = mysqli_query($con, "SELECT current_status_of_work FROM post WHERE id='$postId'");
							$cs = mysqli_fetch_array($current_status_post);
							$status_name =$cs['current_status_of_work'];
						?>

						<form action="" method="POST" >
							<div class="col-md-6 col-md-offset-3">
								<div class="form-group">
								<span class="FieldInfo">Existing Status: </span>
								<b><?php echo $status_name; ?></b>
								<br>
								<label  for="category_select"><span class="FieldInfo">Status:</span></label>
								<select class="form-control" id="category_select" name="status">
									<?php
									$status_data = mysqli_query($con, "SELECT * FROM current_status ORDER BY id DESC");
									while($sd = mysqli_fetch_array($status_data)){
										$id = $sd["id"];
										$statusName = $sd["status"];
									?>
										<option><?php echo $statusName ?></option>
									<?php } ?>	
								</select>
							</div>				
								<?php if(in_array("Status update Failed", $error_array)) echo "<span style='color: #e74c3c;'>Status update Failed.</span><br />";
							?>
							<?php if(in_array("Status updated successfully", $error_array)) echo "<span style='color: #009432;'>Status updated successfully.</span><br />";
							?>

								<div class="form-group">
									<input type="submit" name="submit" class="btn btn-primary pull-right" >
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