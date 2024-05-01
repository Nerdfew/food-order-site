<?php include('partials-front/menu.php');?>



    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            
            $sql = "SELECT * FROM category WHERE category_active ='Yes' AND category_featured='Yes' LIMIT 3";


            $res = mysqli_query($conn, $sql);
            
            
            $count = mysqli_num_rows($res);

            if($count>0)  {

                while($row=mysqli_fetch_assoc($res)) {

                    $id = $row['category_id'];
                    $title  =  $row['category_title'];
                    $image_name = $row['category_image'];
                
                ?>

            <a href="category-foods.php">
                <div class="box-3 float-container">

                    <?php
                        if($image_name == "") {

                            echo "<div class='error'>Image not available</div>";
                        }

                        else {

                            ?>
                            <img src="<?php echo SITE_HOME;?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">

                            <?php
                        }
                    
                    ?>

                    <h3 class="float-text text-white"><?php echo $title;?></h3>
                </div>
            </a>


                <?php


            }
        }

            else {

                echo "<div class='error'>Category not Added.</div>";
            }
            
            
            ?>


            
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            
                $sql2 = "SELECT * FROM food WHERE food_active = 'Yes' AND food_featured = 'Yes' LIMIT 6";

                $res2 = mysqli_query($conn, $sql2);


                $count2  = mysqli_num_rows($res2);


                if($count2 > 0) {


                    while($row=mysqli_fetch_assoc($res2)) {

                        $id = $row['food_id'];
                        $title = $row['food_title'];
                        $price = $row['food_price'];
                        $description = $row['food_description'];
                        $image_name = $row['food_image_name'];
                        ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                <img src="<?php echo SITE_HOME;?>images/food/<?php echo $image_name;?>" alt="<?php echo $image_name;?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price"><?php echo $price;?></p>
                    <p class="food-detail">
                        <?php echo $description;?>
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                        <?php 

                    }


                }
                else {


                    echo "<div class='danger'>Food not available.</div>";

                }




            
            
            
            ?>


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
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

    <?php include('partials-front/footer.php');?>

</body>
</html>