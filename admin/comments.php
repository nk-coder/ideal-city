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
                    <h1 class="page-header">
                        Unpproved Comments
                    </h1>               
                    <?php 
                        $msg ="";
                        $unapproved_comments = mysqli_query($con, "SELECT * FROM comments WHERE approved='OFF'");
                        if(mysqli_num_rows($unapproved_comments) == 0){
                            echo "<h3>There is no comments to authorze</h3>";
                        }else{
                    ?>
                    
                    <p class="bg-success">
                        <?php echo $msg; ?>
                    </p>

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="table-wrapper-scroll-y">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>No</th>
                                        <th>Date and Time</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Post ID</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php 
                                    
                                    $srNo = 0;
                                    while ($una_cmnt=mysqli_fetch_array($unapproved_comments)) {
                                        $commentId = $una_cmnt["id"];
                                        $date = $una_cmnt["date_time"];
                                        $name = $una_cmnt["name"];
                                        $email = $una_cmnt["email"];
                                        $comment = $una_cmnt["comment"];
                                        $post_id = $una_cmnt["post_id"];
                                        $srNo++;
                                    ?>
                                    <tr>
                                        <td><?php echo $srNo ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $comment ?></td>
                                        <!-- <td><?php echo $post_id ?></td> -->
                                        <td>
                                            <a href="../full-post.php?id=<?php echo $post_id; ?>" target="_blank"><span class="label label-info1"><?php echo $post_id; ?></span></a>
                                        </td>
                                        
                                        <td>
                                            <a href="approveComment.php?id=<?php echo $commentId; ?>"><span class="btn btn-success">Approve</span></a>
                                        </td> 
                                    </tr>
                                    <?php } }?>
                                </table>
                            </div>
                        </div>
                         <!--End of Table-->
                    </div>
                <!-- end1 -->

                <div class="col-lg-12">
                    <h1 class="page-header">
                        Approved Comments
                    </h1>                
                    <?php 
                        $approved_comments = mysqli_query($con, "SELECT * FROM comments WHERE approved='ON'");
                        if(mysqli_num_rows($approved_comments) == 0){
                            echo "<h3>There is no comments</h3>";
                        }else{
                    ?>

                    <p class="bg-success">
                        <?php //echo $message; ?>
                    </p>

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="table-wrapper-scroll-y">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>No</th>
                                        <th>Date and Time</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Aprrover</th>
                                        <th>Post ID</th>
                                    </tr>
                                    <?php 
                                    
                                    $srNo = 0;
                                    while ($cmnt=mysqli_fetch_array($approved_comments)) {
                                        $commentId = $cmnt["id"];
                                        $date = $cmnt["date_time"];
                                        $name = $cmnt["name"];
                                        $email = $cmnt["email"];
                                        $comment = $cmnt["comment"];
                                        $approver = $cmnt["approver"];
                                        $post_id = $cmnt["post_id"];
                                        $srNo++;
                                    ?>
                                    <tr>
                                        <td><?php echo $srNo ?></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $comment ?></td>
                                        <td><?php echo $approver ?></td>
                                        <td>
                                            <a href="../full-post.php?id=<?php echo $post_id; ?>" target="_blank"><span class="label label-info1"><?php echo $post_id; ?></span></a>
                                        </td>
                                        
                                    </tr>
                                    <?php } }?>
                                </table>
                            </div>
                        </div>
                        <?php //echo $_SESSION['username']; ?>
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

 
 