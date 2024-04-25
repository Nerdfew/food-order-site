<?php include('/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/config/constants.php'); ?>

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

    <input type="submit" name="submit" value="Login" class="btn-primary"><br>
</form>
<br><br>
            <p class="text-center">Created by - <a href="www.Proj.com"></a>Capstone Project</p>
        </div>
        </body>
</html>


<?php 
if(isset($_POST['submit']))
{
    

   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql= "SELECT * FROM tbl_admin WHERE admin_username='$username' AND admin_password='$password'";
   
   $res = mysqli_query($conn, $sql);
   

    $count = mysqli_num_rows($res);
    echo $count;
if($count==1){
   // echo "Successfully Submitted!";
    $_SESSION['login'] = "<div class='success'>Login Successfully.</div>";
    $_SESSION['user'] = $username;
    echo $count;

    //Redirect to manage admin page
    header("location:".SITE_HOME.'admin/');
    exit;
  
   }
   else {
    $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
    echo $count;
    //Redirect to manage admin page
  
  header("location:".SITE_HOME.'admin/login.php');   
}
}
?>


  