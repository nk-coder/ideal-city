<?php 
include_once 'includes/config.php';

if (isset($_GET['id'])){
 $userId = $_GET['id'];
 $update_sql = "UPDATE users SET activation='ON' WHERE id='$userId'";
 $result = mysqli_query($con, $update_sql);
 $msg = "User has been approved";
 
 if ($result){
   header('location:users.php');
 }else{
  
 }
}
?>