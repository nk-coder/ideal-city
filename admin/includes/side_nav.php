<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <li>
            <a href="add_admin.php"><i class="fa fa-fw fa-user"></i> Manage Admin</a>
        </li>

		<li>
            <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-user"></i> Users <b class="caret"></b></a>
            <ul id="user" class="collapse">
                <li>
                    <a href="users.php">Users List</a>
                </li>
                <li>
                    <a href="newUserList.php">New Users</a>
                </li>
            </ul>
        </li>

        <!-- new post query -->
        <?php 
        $query_newPost = mysqli_query($con, "SELECT * FROM post WHERE approved='NO' ");
        $row_count_post = mysqli_num_rows($query_newPost);
        ?>
		<li>
            <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-edit"></i> Posts <b class="caret"></b>
                <?php if ($row_count_post>0) {?>
                    <small class="label pull-right label-info1"><?php echo $row_count_post ?></small>
               <?php } ?>
                
            </a>
            <ul id="post" class="collapse">
                <li>
                    <a href="posts.php">Post List</a>
                </li>
                <li>
                    <a href="newPostList.php">New Posts</a>
                </li>
            </ul>
        </li>
        
        <!-- new comments query -->
        <?php 
        $query_newComments = mysqli_query($con, "SELECT * FROM comments WHERE approved='OFF' ");
        $row_count_comment = mysqli_num_rows($query_newComments);
        ?>
        <li>
            <a href="comments.php"><i class="fa fa-comments-o"></i> Comments
                <?php if ($row_count_comment>0) {?>
                    <small class="label pull-right label-info1"><?php echo $row_count_comment ?></small>
               <?php } ?>
            </a>
        </li>
		
        <li>
            <a href="newArea.php"><i class="fa fa-map-marker"></i> Add New Area
            </a>
        </li>				   
    </ul>
</div>