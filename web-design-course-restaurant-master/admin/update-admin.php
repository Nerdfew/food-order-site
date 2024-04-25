<?php include('/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/admin/partials/menu.php'); ?>

<div class="main-content">
        <div class= "wrapper"> 
        <h1>Update Admin</h1>
        <br><br>
        
        <?php 
        $id=$_GET['id'];
        $sql="SELECT * FROM tbl_admin WHERE admin_id= $id";
        $res=mysqli_query($conn, $sql);
        echo $id;
        if($res==true){
            $count = mysqli_num_rows($res);
            if($count==1){
              //  echo"Admin Available";
              $row=mysqli_fetch_assoc($res);
              $full_name=$row['name'];
              $username=$row['admin_username'];
                    }
                    else{
                        header('location:'.SITE_HOME.'admin/manage-admin.php');
                    }
                }
                ?>

        <form action=""method="POST">
<table class="tbl-30">
<tr>
    <td>Full Name: </td>
    <td>
        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
    </td>

    <td>Username: </td>
    <td>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </td>
</tr>
<tr>
    <td colspan="2">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type= "submit" name="submit" value="Update Admin" class="btn-secondary">
    </td>
</tr>
</table>
        </form>
</div> </div>

<?php 
if(isset($_POST['submit'])){
   // echo"Button Clicked";
   $id = $_POST['id'];
   $full_name= $_POST['full_name'];
   $username = $_POST['username'];

   $sql= "UPDATE tbl_admin SET
   name = '$full_name',
   admin_username = '$username'
   WHERE admin_id = '$id'
   ";

   $res = mysqli_query($conn, $sql);

   if($res ==true) {
   // echo "Successfully Submitted!";
    $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
  
    //Redirect to manage admin page
    header("location:".SITE_HOME.'/admin/manage-admin.php');
  
   }
   else {
    $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
  
    //Redirect to manage admin page
    header("location:".SITE_HOME.'/admin/manage-admin.php');
   }
}
?>
<?php include('partials/footer.php'); ?> 