<?php 
//Include constants.php file here
include('../config/constants.php');

//1. get the ID of admin to deleted
$id = $_GET['id'];

//2. create SQL Query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql);

if($res==true)
{
   // echo "Admin Deleted";
   $_SESSION['delete'] = "Admin Deleted Succesfully";
   header('localhost:'.SITEURL.'admin/manage-admin.php');
}
else{
    //echo "Failed to Delete Admin";
    $_SESSION['delete'] = "Failed to Delete Admin. Try Again Later";
   header('localhost:'.SITEURL.'admin/manage-admin.php');
}

//3. redirect to manage admin page with message (success/error)

?>