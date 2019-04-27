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
                        $inactive_user_data = mysqli_query($con, "SELECT * FROM users WHERE activation='OFF'");
                        if(mysqli_num_rows($inactive_user_data) == 0){
                            echo "<h3>There is no users to authorze</h3>";
                        }else{
                    ?>
                    <h1 class="page-header">
                        New Users
                     
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
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>NID</th>
                                        <th>Area</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php 
                                    
                                    $srNo = 0;
                                    while ($inactive_ud=mysqli_fetch_array($inactive_user_data)) {
                                        $userId = $inactive_ud["id"];
                                        $name = $inactive_ud["name"];
                                        $username = $inactive_ud["username"];
                                        $email = $inactive_ud["email"];
                                        $phone = $inactive_ud["phone"];
                                        $image = $inactive_ud["image"];
                                        $NID = $inactive_ud["NID_NO"];
                                        $area = $inactive_ud["area"];
                                        $srNo++;
                                    ?>
                                    <tr>
                                        <td><?php echo $srNo ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $username ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td><img class="admin-user-thumbnail user_image user-img" src="../Upload/users/<?php echo $image; ?>" ></td>
                                        <td><?php echo $NID ?></td>
                                        <td><?php echo $area ?></td>
                                        
                                        <td>
                                            <a href="approveUser.php?id=<?php echo $userId; ?>"><span class="btn btn-success">Approve</span></a>
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

 
 