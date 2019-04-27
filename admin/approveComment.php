<?php 
session_start();
$admin_username = $_SESSION['username'];
include_once 'includes/config.php';

if (isset($_GET['id'])){
 $commentId = $_GET['id'];
 $update_sql = "UPDATE comments SET approved='ON', approver='$admin_username' WHERE id='$commentId'";
 $result = mysqli_query($con, $update_sql);
 
 
 if ($result){
 	$msg = "Comments has been approved";
    header('location:comments.php');
 }else{
  
 }
}
?>