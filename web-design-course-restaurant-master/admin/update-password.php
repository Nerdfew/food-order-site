<?php include('partials/menu.php'); ?>

<div class="main-content">
        <div class= "wrapper"> 
        <h1>Change Password</h1>
        <br><br>

        <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        }
        ?>
        <form action=""method="POST">
<table class="tbl-30">
<tr>
    <td>Current Password: </td>
    <td>
        <input type="password" name="current_password" placeholder="Current Password">
    </td>

    <td>New Password: </td>
    <td>
        <input type="password" name="new_password" placeholder="New Password">
    </td>
    <td>Confirm Password: </td>
    <td>
        <input type="password" name="confirm_password" placeholder="Confirm Password">
    </td>
</tr>
<tr>
    <td colspan="2">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type= "submit" name="submit" value="Change password" class="btn-secondary">
    </td>
</tr>
</table>
        </form>


</div> </div>
<?php 
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $current_password = ($_POST['current_password']);
    $new_password = ($_POST['new_password']);
    $confirm_password = ($_POST['confirm_password']);

    $sql = "SELECT * FROM tbl_admin WHERE admin_id=$id AND admin_password='$current_password'";
    $res = mysqli_query($conn, $sql);

    if($res==true){
        $count=mysqli_num_rows($res);
        if($count==1){
            //echo "User Found";
if($new_password=$confirm_password){
$sql2 = "UPDATE tbl_admin SET
admin_password= '$new_password'
WHERE admin_id = $id";

$res2 = mysqli_query($conn, $sql2);

if($res2==true){
    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
    header('location:'.SITE_HOME.'admin/manage-admin.php');  
}
else{
    $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password. </div>";
    header('location:'.SITE_HOME.'admin/manage-admin.php');  
}
}
else{
    $_SESSION['pwd-not-match'] = "<div class='error'>Password did Not Match. </div>";
    header('location:'.SITE_HOME.'admin/manage-admin.php');  
}
    }
    else{
        $_SESSION['user-not-found'] = "<div class='error'>User Not Found. </div>";
    header('location:'.SITE_HOME.'admin/manage-admin.php');
    }
}
}

?>
<?php include('partials/footer.php'); ?> 