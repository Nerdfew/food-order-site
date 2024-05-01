<?php include('partials/menu.php');
?>


<?php
    if(isset($_GET['id'])) {


        $id = $_GET['id'];
        $sql2 = "SELECT * FROM food WHERE food_id=$id";
        $res2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($res2);


        $title = $row['food_title'];
        $description = $row['food_description'];
        $price = $row['food_price'];
        $current_image = isset($row['food_image_name']) ? $row['food_image_name'] : '';        
        $current_category = $row['category_id'];
        $featured = $row['food_featured'];
        $active = $row['food_active'];




    }




?>


<div class="main-content">
    <div class="wrapper">

    <h1>Update Food</h1>

    <br><br>


    <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value = "<?php echo $title?>">
                    </td>
                </tr>

               <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description"  cols="30" rows="5"><?php echo $description;?></textarea>

                </td>
               </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>

                    <?php 
                    if($current_image == "") {
                        echo "<div class='error'>Image not found.</div>";
                    }

                    else {
                        ?>
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>"> 
            <td><img src="<?php echo SITE_HOME; ?>images/food/<?php echo $current_image?>" alt="<?php echo $title?>" width="150px" name="current_image"></td>                        <?php
                    }
                   ?>
                    </td>
           
                </tr>
                <br><br>
                <tr>
                    <td>Select New Image: </td>
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
                                $category_title = $row['category_title'];

                                $category_id = $row['category_id'];
                                ?>

                                <option <?php if($current_category==$category_id) {echo "Selected";} ?> value="<?php echo $category_id;?>"><?php echo $category_title?> </option>
                               <?php


                            }


                        }
                        else{

                            echo "<option value ='0'>Category Not Available.</option>";
                        }


                        ?>
                    </select>
                           
                    </td>
                </tr>

            <tr>
            <td>Feautured: </td>
            <td>
                <input <?php if($featured == "Yes") {echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                <input <?php if($featured == "No") {echo "checked";}?> type="radio" name="featured" value="No"> No
            </td>
        </tr>

        <tr>
            <td>Active: </td>
            <td>
                <input <?php if($active == "Yes") {echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                <input <?php if($active == "No") {echo "checked";}?> type="radio" name="active" value="No"> No
            </td>
        </tr>
<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Update Food" class="btn-secondary">

    </td>
</tr>

            </table>
        </form>
    </div>
</div>

        <?php
        
            if(isset($_POST['submit'])) {
                

                $id = isset($_POST['id']) ? $_POST['id'] : '';

                $title = $_POST['title'];

                $description = $_POST['description'];

                $price = $_POST['price'];

                $current_image = $_POST['current_image'];

                $category  = $_POST['category'];

                $featured  = $_POST['featured'];

                $active  = $_POST['active'];



                if(isset($_FILES['image']['name'])) {

                    $image_name = $_FILES['image']['name'];

                    if($image_name != "") {



                        $ext = end(explode('.', $image_name));

                        $image_name = "Food-Name-".rand(0000,9999).'.'.$ext;

                        $src_path = $_FILES['image']['tmp_name'];

                        $dest_path  = "/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/images/food/".$image_name;

                        $upload = move_uploaded_file($src_path, $dest_path);



                        if($upload == FALSE) {
                            $_SESSION['upload'] = "<div class='error'>Failed to upload new image.</div>";
                            header('location:'.SITE_HOME.'admin/manage-food.php');
                            exit();
                        }
                        if($current_image!="") {
                            $remove_path  = "/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/images/food/".$current_image;
                            $remove  = unlink($remove_path);
                            if($remove == false) {
                                $_SESSION['remove-failed']  = "<div class='error'>Failed to remove image.</div>";
                                header('location:'.SITE_HOME.'admin/manage-food.php');
                                exit();
                            }
                        }

                    }

                }

                else {

                    $image_name =  $current_image;
                }



                $sql3 = "UPDATE food SET 
                    food_title = '$title',

                    food_description  = '$description',

                    food_price  = '$price',

                    category_id = '$category',

                    food_featured  = '$featured',


                    food_active = '$active'

                    WHERE food_id = '$id'
                    
                
                ";

            $res3 = mysqli_query($conn, $sql3);
          

            if($res3) {
                $_SESSION['update'] = "<div class='success'>Food has been updated Successfully!</div>";
                header('location:'. SITE_HOME .'admin/manage-food.php');
                exit();
            }
            else {
                $_SESSION['update'] = "<div class='success'>Food wasn't able to be updated.</div>";
                header('location:'.SITE_HOME.'admin/manage-food.php');
                exit();

            }





            }
        
        
        
        
        
        ?>











    
    </div>


</div>



<?php include ('partials/footer.php');