<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login- Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

          <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }

            ?>


<form action="" method="POST" class="text-center">
    Username: <br>
    <input type="text" name="username" placeholder="Enter Username"> <br> <br>
    Password: <br>
    <input type="password" name="password" placeholder="Enter Password"> <br> <br>

    <input type="submit" name="submit" value="login" class="btn-primary"><br>
</form>
<br><br>
            <p class="text-center">Created by - <a href="www.Proj.com"></a>Capstone Project</p>
        </div>

        <?php 
if(isset($_POST['submit'])){
   // echo"Button Clicked";

   $username = $_POST['username'];
   $password = md5($_POST['password']);

   $sql= "SELECT* FROM tbl_admin WHERE username='$username' AND password='$password'";
   $res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if($count==1){
   // echo "Successfully Submitted!";
    $_SESSION['login'] = "<div class='success'>Login Successfully.</div>";
    $_SESSION['user'] = $username;


    //Redirect to manage admin page
    header("location:".SITEURL.'admin/');
  
   }
   else {
    $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
  
    //Redirect to manage admin page
    header("location:".SITEURL.'admin/login.php');
   }
}
?>


    </body>
</html>