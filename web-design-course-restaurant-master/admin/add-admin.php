<?php include("partials/menu.php"); ?>


<div class="main-content">
        <div class= "wrapper"> 
        <h1>Add Admin</h1>

      <?php
          if(isset($_SESSION['add'])) {

            echo $_SESSION['add'];
            unset($_SESSION['add']);


          }
      
      
      ?>



      <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
                  <input type="text" name="full_name" placeholder="Enter your name here">
                </td>
            </tr>
            
            <tr>
                <td>Desired Username: </td>
                <td>
                  <input type="text" name="username" placeholder="Enter your username">
                </td>
            </tr>
            <tr>
                <td>Desired Password: </td>
                <td>
                  <input type="password" name="password" placeholder="Enter your password">
                </td>
            </tr>

            <tr>
              <td>
              <input type="submit" name="submit" value="Add Admin" class="btn btn-secondary">
              </td>
            </tr>

        </table>


      </form>





        </div>

</div>

<?php  include('partials/footer.php'); ?>


<?php
  //Process form values and save to database

  //Checking for submit button press

  if(isset($_POST['submit'])) {

    //button clicked
    

    //get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password encryption
  

  //SQL Query to submit to database

  $sql = "INSERT INTO tbl_admin SET 
    name = '$full_name',
    admin_username = '$username',
    admin_password = '$username'
  ";


  //execute query and save data in database
 

 //\
 $res = mysqli_query($conn, $sql) or die(mysqli_error());

 if($res == TRUE) {
  echo "Successfully Submitted!";


  //Create Session Variable For Message
  $_SESSION['add'] = "Admin Added Successfully!";

  //Redirect to manage admin page
  header("location:".SITE_HOME.'/admin/manage-admin.php');

 }
 else {
  $_SESSION['add'] = "Failed to add.";

  //Redirect to manage admin page
  header("location:".SITE_HOME.'/admin/add-admin.php');
 }
}
?>