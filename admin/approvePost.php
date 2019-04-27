<?php 
session_start();
$admin_username = $_SESSION['username'];
include_once 'includes/config.php';

if (isset($_GET['id'])){
 $postId = $_GET['id'];
 $update_sql = "UPDATE post SET approved='YES', approver='$admin_username' WHERE id='$postId'";
 $result = mysqli_query($con, $update_sql);
 
 
 if ($result){
 	$msg = "Post has been approved";
    header('location:newPostList.php');
 }else{
  
 }
}
?>