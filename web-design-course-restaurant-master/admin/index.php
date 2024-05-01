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
<br><br>
        <div class="col-4 text-center">

        <?php 
        $sql = "SELECT * FROM category";

        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
       
        ?>

        <br>
     <h1><?php echo $count ;?></h1> 
     <br />
      Categories
        </div> 

        <div class="col-4 text-center">
        <?php 
        $sql2 = "SELECT * FROM food";

        $res2 = mysqli_query($conn,$sql2);
        $count2 = mysqli_num_rows($res2);
       
        ?>
     <h1><?php echo $count2 ;?></h1> <br />
      Foods
        </div> 

        <div class="col-4 text-center">
        <?php 
        $sql3 = "SELECT * FROM orders";

        $res3 = mysqli_query($conn,$sql3);
        $count3 = mysqli_num_rows($res3);
       
        ?>
     <h1><?php echo $count3 ;?></h1> <br />
     Total Orders
        </div> 

        <div class="col-4 text-center">
          <?php 
          $sql4 = "SELECT SUM(orders_total) AS Total FROM orders WHERE orders_status= 'Delivered'";
          $res4 = mysqli_query($conn,$sql4);
          $row4 = mysqli_fetch_assoc($res4);

          $total_revenue = $row4['Total'];
          
          ?>
     <h1>$<?php echo $total_revenue ;?></h1> <br />
      Revenue Generated
        </div> 

        <div class="clearfix"></div>

        <?php include('partials/footer.php'); ?> 