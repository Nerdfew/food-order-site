<?php include('partials-front/menu.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php  $search = $_POST['search']; ?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php
            
                $sql  = "SELECT * FROM food WHERE food_title LIKE '%$search%' OR food_description LIKE '%$search%'";   


                $res =  mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0) {

                    while($row=mysqli_fetch_assoc($res)) {

                        $id = $row['food_id'];
                        $title = $row['food_title'];
                        $price = $row['food_price'];
                        $description = $row['food_description'];
                        $image_name = $row['food_image_name'];
                        $active = $row['food_active'];
                    
                ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                <img src="<?php echo SITE_HOME;?>images/food/<?php echo $image_name;?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title?></h4>
                    <p class="food-price"><?php echo $price?></p>
                    <p class="food-detail">
                    <?php echo $description?>.
                    </p>
                    <br>

                    <a href="<?php echo SITE_HOME; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                <?php
                    }
                }

                else {

                    echo "<div class='error'>Search not found.</div>";

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