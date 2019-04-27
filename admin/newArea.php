<?php include("includes/header.php"); ?>

<!--PHP code for new admin registration-->
<?php
	$name = "";
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

		$area_check = mysqli_query($con,"SELECT name FROM areas WHERE name='$name'");
		$num_of_row = mysqli_num_rows($area_check);
		if($num_of_row > 0){
			array_push ($error_array,"Area already exist");
		}


		if(empty($error_array)){

			$query = mysqli_query($con, "INSERT INTO areas VALUES('', '$name')");
			array_push ($error_array,"New Area added successfully");

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
                        Add New Area  
                    </h1>

					<form action="" method="POST" enctype="multipart/form-data">
						<div class="col-md-6 col-md-offset-3">				
							<div class="form-group">
								<label for="name">Area Name</label>
								<input type="text" name="name" class="form-control" required>
							</div>
							<?php if(in_array("Area already exist", $error_array)) echo "<span style='color: #e74c3c;'>Area name already exist.</span><br />";
							?>
							<?php if(in_array("New Area added successfully", $error_array)) echo "<span style='color: #009432;'>New Area added successfully.</span><br />";
							?>
							
							<div class="form-group">
								<input type="submit" name="create" class="btn btn-primary pull-right" >
						    </div>
						</div>  
					</form>
                </div>
            </div>
            <!-- /.row -->
            <hr>

        	<div class="row">
                <div class="col-lg-12">                 
                   
                    <h1 class="page-header">
                        Area List
                    </h1>

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="table-wrapper-scroll-y">
	                   			<table class="table table-striped table-hover">
		                        	<tr>
			                            <th>No</th>
			                            <th>Email</th>
		                        	</tr>
		                        	<?php 
		                        	    
		                            $srNo = 0;
		                            $query_area_data = mysqli_query($con, "SELECT * FROM areas");
		                            while ($area_data=mysqli_fetch_array($query_area_data)) {
		                                $name = $area_data["name"];
		                                $srNo++;
		                        	?>
		                            <tr>
		                                <td><?php echo $srNo ?></td>
		                                <td><?php echo $name ?></td>
		                            </tr>
		                        	<?php  }?>
	                    		</table>
                    		</div>
            			</div>
                         <!--End of Table-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include("includes/footer.php"); ?>



