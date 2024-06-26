<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>ADD FOOD</h1> <br><br>

        <?php 
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                
                ?>
                <br><br>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder= "Title of the Food">
                    </td>
                </tr>

               <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description"  cols="30" rows="5" placeholder="Description of the food"></textarea>

                </td>
               </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name = "category">

                        <?php 
                        $sql = "SELECT * FROM category WHERE category_active ='Yes'"; 
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count>0) {
                            while($row = mysqli_fetch_assoc($res)) {
                                $id = $row['category_id'];
                                $title = $row['category_title'];
                                ?>

                                  <option value="<?php echo $id; ?>"><?php echo $title;?></option>
                               
                               <?php


                            }


                        }
                        else{

                            ?>
                            <option value="0">No category found</option>
                            <?php
                        }


                        ?>

                           
                    </td>
                </tr>

                <tr>
            <td>Feautured: </td>
            <td>
                <input type="radio" name="featured" value="Yes"> Yes
                <input type="radio" name="featured" value="No"> No
            </td>
        </tr>

        <tr>
            <td>Active: </td>
            <td>
                <input type="radio" name="active" value="Yes"> Yes
                <input type="radio" name="active" value="No"> No
            </td>
        </tr>
<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Food" class="btn-secondary">

    </td>
</tr>

            </table>
        </form>

            <?php 
            if(isset($_POST['submit'])){

                $title = $_POST['title'];
                $description = str_replace("'", "", $_POST['description']);                
                $price = $_POST['price'];
                $category = $_POST['category'];

                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                }

                else{
                    $featured = "No";
                }
                if(isset($_POST["active"])){
                    $active = $_POST["active"];

            }
            else{
                $active = "No";
            }

            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'];

                if($image_name!=""){
                    $ext = end(explode('.', $image_name));

                    $image_name = "Food-Name-".rand(0000,9999).".".$ext;

                    $src = $_FILES['image']['tmp_name'];

                    $dst = "/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/images/food/".$image_name;
                    $upload = move_uploaded_file($src, $dst);

                    if($upload==false){

                        $_SESSION['upload']= "<div class='error'> Failed to upload Image.</div>";
                        header('location:'.SITE_HOME.'admin/add-food.php');
                        die();
                    }

                }
            
            }
            else{
                $image_name = "no_image_added";
            }

            // create 2 sql

            $sql2="INSERT INTO food SET
            food_title = '$title',
            food_description = '$description',
            food_price = '$price',
            food_image_name = '$image_name',
            category_id = '$category',
            food_featured ='$featured',
            food_active = '$active'
            ";

            $res2 =mysqli_query($conn, $sql2);
            if($res2==true){
                $_SESSION['add']= "<div class='success'> Food added successfully.</div>";
                header('location:'.SITE_HOME.'admin/manage-food.php');
                
            }
            else{

                $_SESSION['add']= "<div class='error'> failed to add Food.</div>";
                header('location:'.SITE_HOME.'admin/manage-food.php');

            }







            }   

            ?>



    </div>
</div>



<?php include('partials/footer.php'); ?>