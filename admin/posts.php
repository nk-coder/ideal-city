<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
        <?php include("includes/top_nav.php") ?>

            <!-- Sidebar Menu Items -->
    
        <?php include("includes/side_nav.php"); ?>
           <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">                 
                       <?php 
                            $viewQuery = mysqli_query($con, "SELECT * FROM post ORDER BY date_time ASC");
                            if(mysqli_num_rows($viewQuery) == 0){
                                echo "<h3>There is no Post to authorze</h3>";
                            }else{
                        ?>
                        <h1 class="page-header">
                            Posts
                         
                        </h1>
                          <p class="bg-success">
                            <?php //echo $message; ?>
                        </p>

                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="table-wrapper-scroll-y">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>No</th>
                            <th>Problem title</th>
                            <th>Date & Time</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Address</th>
                            <th>Current Status of work</th>
                            <th>Approver</th>
                            <th>Action</th>
                            <th>Details</th>
                        </tr>
                        <?php 
                            
                            $srNo = 0;
                            while ($vq=mysqli_fetch_array($viewQuery)) {
                                $postId = $vq["id"];
                                $title = $vq["problem_title"];
                                $date_time = $vq["date_time"];
                                $email = $vq["email"];
                                $phone = $vq["phone"];
                                $image = $vq["image"];
                                $address = $vq["address"];
                                $current_status = $vq["current_status_of_work"];
                                $approver = $vq["approver"];
                                $srNo++;
                        ?>
                            <tr>
                                <td><?php echo $srNo ?></td>
                                <td><?php echo $title ?></td>
                                <td><?php echo $date_time ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $phone ?></td>
                                <td><img class="admin-user-thumbnail user_image user-img" src="../Upload/problems/<?php echo $image; ?>"></td>
                                <td><?php echo $address ?></td>
                                <td><?php echo $current_status ?></td>
                                <td><?php echo $approver ?></td>
                                
                                <td>
                                    <a href="editPost.php?id=<?php echo $postId; ?>"><span class="btn btn-warning">Edit</span></a> 
                                    <!-- <a href="deletePost.php?delete=<?php echo $postId; ?>"><span class="btn btn-danger">Delete</span></a>  -->
                                </td>
                                <td>
                                    <a href="../fullPost.php?id=<?php echo $postId; ?>" target="_blank"><span class="btn btn-info">Live Preview</span></a> 
                                </td>
                            </tr>
                        <?php } }?>
                    </table>
                    </div>
                </div>
                             <!--End of Table-->
                        

                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>

 