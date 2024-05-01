<?php include('partials-front/menu.php') ?>


<?php
    if(isset($_GET['category_id'])) {

        $category_id = $_GET['category_id'];

        $sql = "SELECT category_title FROM category WHERE category_id=$category_id";


        $res = mysqli_query($conn, $sql);

        $row=mysqli_fetch_assoc($res);

        $category_title = $row['category_title'];



    }
    else {
        header('location:'.SITE_HOME);
    }



?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Food in <a href="#" class="text-white">"<?php echo $category_title ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            
                $sql2  = "SELECT * FROM food WHERE category_id = $category_id";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

            if($count2 >0) {
                while($row=mysqli_fetch_assoc($res2)) {

                    $id = $row['food_id'];
                    $title = $row['food_title'];
                    $price = $row['food_price'];
                    $description = $row['food_description'];
                    $image_name = $row['food_image_name'];
                    $active = $row['food_active'];
                ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                <img src="<?php echo SITE_HOME;?>images/food/<?php echo $image_name;?>" alt="<?php echo $image_name;?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title ?></h4>
                    <p class="food-price"><?php echo $price ?></p>
                    <p class="food-detail">
                    <?php echo $description ?>
                    </p>
                    <br>

                    <a href="<?php echo SITE_HOME;?>order.php?food_id=<?php echo $id?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            
            <?php 
                }   
            } 
            else {
               
                echo "<div class='error'>No food in this category.</div>";


            }
            ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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

    <?php include('partials-front/footer.php') ?>

</body>
</html>