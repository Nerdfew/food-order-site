<?php include("/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/admin/partials/menu.php"); ?>
<?php include ("/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/admin/partials/login-check.php");?>

        <div class="main-content">
        <div class= "wrapper"> 
        <h1>Dashboard</h1>

        <br>
        <?php 
          if(isset($_SESSION['login']))
          {
            echo $_SESSION['login'];
             unset($_SESSION['login']);
         }
      ?>
<br>
        <div class="col-4 text-center">
     <h1>5</h1> 
     <br />
      Categories
        </div> 

        <div class="col-4 text-center">
     <h1>5</h1> <br />
      Categories
        </div> 

        <div class="col-4 text-center">
     <h1>5</h1> <br />
      Categories
        </div> 

        <div class="col-4 text-center">
     <h1>5</h1> <br />
      Categories
        </div> 

        <div class="clearfix"></div>

        <?php include('partials/footer.php'); ?> 