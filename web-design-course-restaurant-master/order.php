<?php include('partials-front/menu.php') ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    




<?php  

            if(isset($_GET['food_id'])){
                $food_id = $_GET['food_id'];


                $sql = "SELECT * FROM food WHERE food_id= $food_id";
                $res= mysqli_query($conn,$sql);
                $count= mysqli_num_rows($res);

                if($count==1){
                    $row =mysqli_fetch_assoc($res);

                    $title = $row['food_title'];
                    $price = $row['food_price'];
                    $image_name = $row['food_image_name'];

                }
                else{
                    header('location:'.SITE_HOME);

                }

            }

            else{
                header('location:'.SITE_HOME);
            }

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">

                    <?php 
                    if($image_name==""){
                        echo "<div class= 'error'> Image not Available.</div>";
                    }
                    else{
                        ?>
                         <img src="<?php echo SITE_HOME; ?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                        <?php
                    }
                    
                    ?>
                       
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="orders_food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price;?></p>
                        <input type="hidden" name="orders_price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="orders_quantity" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php

if(isset($_POST['submit'])){

    $food = $_POST['orders_food'];
    $price = $_POST['orders_price'];
    $quantity = $_POST['orders_quantity'];
    $total = $price * $quantity;

    $order_date = date('Y-m-d H:i:sa');
    $status = "ordered";
    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];

    
    $sql2= "INSERT INTO orders SET
    orders_food = '$food',
    orders_price = $price,
    orders_quantity = $quantity,
    orders_total = $total,
    orders_date = '$order_date',
    orders_status = '$status',
    orders_customer_name = '$customer_name',
    orders_customer_contact = '$customer_contact',
    orders_customer_email = '$customer_email',
    orders_customer_address = '$customer_address'
    
     ";

     $res2=mysqli_query($conn,$sql2);

     if($res2==true){

        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
        header('location:'.SITE_HOME);
     }
     else{

        $_SESSION['order'] = "<div class='error text-center'>Fail to order food.</div>";
        header('location:'.SITE_HOME);
     }

    
}
            
            ?>



        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>