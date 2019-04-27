<?php include("includes/header.php"); ?>
<?php //include_once("includes/function.php"); ?>


        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
		   <?php include("includes/top_nav.php"); ?>

		   <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
             <?php include("includes/side_nav.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- query post data -->
            <?php 
                $query_post_data = mysqli_query($con, "SELECT * FROM post WHERE approved='NO' ");
                $post_data = mysqli_num_rows($query_post_data);
            ?>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $post_data; ?></div>
                                    <div>New Post!</div>
                                </div>
                            </div>
                        </div>
                        <a href="newPostList.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- query user data -->
                <?php 
                $user_query = mysqli_query($con, "SELECT * FROM users WHERE activation='OFF' ");
                $user_data = mysqli_num_rows($user_query);
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $user_data; ?></div>
                                    <div>New Users!</div>
                                </div>
                            </div>
                        </div>
                        <a href="newUserList.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- query comments data -->
                <?php 
                $comment_query = mysqli_query($con, "SELECT * FROM comments WHERE approved='OFF' ");
                $comment_data = mysqli_num_rows($comment_query);
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $comment_data; ?></div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>New Data!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->


            <!-- admin panel start -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-fw fa-user"></i> Admin Panel
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
                            <div class="list-group">
                                <?php 
                                //query for admin data
                                 $query_admin_data = mysqli_query($con, "SELECT * FROM admins");
                                 while($admin_data = mysqli_fetch_array($query_admin_data)){
                                    $name = $admin_data["name"];
                                    $email = $admin_data["email"];
                                    $phone = $admin_data["phone"];
                                 
                                ?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-fw fa-user"></i> <?php echo $name; ?>
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>