<?php include ('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
<h1>Update Category</h1>
<br><br>

<?php 
    //check ID
    if(isset($_GET['id']))
    {
    $id = $_GET['id'];
       $sql = "SELECT * FROM category WHERE category_id= $id";
       $res = mysqli_query($conn,$sql);
      //echo"Getting data";

     $count = mysqli_num_rows($res);
        if($count==1){

            $row = mysqli_fetch_assoc($res);
            $title = $row['category_title'];
            $current_image = $row['category_image'];
            $featured = $row['category_featured'];
            $active = $row['category_active'];
        }
        else{
       $_SESSION['no-category-found']="<div class='error'>Category not found.</div>";
          header('location:'.SITE_HOME.'admin/manage-category.php');     
        }
    }
     else{
        header('location:'.SITE_HOME.'admin/manage-category.php');
    }

?>

<form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
        <tr>
            <td>Title:  </td>
            <td>
                <input type="text" name="title" value="<?php echo $title;?>">
            </td>
        </tr>
        <tr>
            <td>Current Image:</td>
            <td>
              <?php 
              if($current_image != ""){
// display
?>
<img scr="<?php echo SITE_HOME; ?>images/category/<?php echo $current_image; ?>" width="150px">
<?php

              }
             
              else{
                echo"<div class='error'>Image Not Added.</div>";
              }
              ?>
            </td>
        </tr>

        <tr>
            <td>New Image:</td>
            <td>
              <input type="file" name="image"> 

            </td>
        </tr>
        <tr>
            <td>Feautured: </td>
            <td>
                <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                <input <?php if($featured=="No"){echo "checked";} ?>type="radio" name="featured" value="No"> No
            </td>
        </tr>

        <tr>
            <td>Active: </td>
            <td>
            <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                <input <?php if($active=="No"){echo "checked";} ?>type="radio" name="active" value="No"> No
            </td>
        </tr>
<tr>
    <td colspan="2">
        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
        <input type= "hidden" name="id" value= "<?php echo $id;?>">
        <input type="submit" name="submit" value="Add Category" class="btn-secondary">

    </td>
</tr>



    </table>
</form>

<?php 
    if(isset($_POST['submit'])){
    // echo "Clicked";
    $id = $_POST['id'];
    $title= $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

// check image
        if(isset($_FILES['image']['name'])){
        $image_name = $_FILES['image']['name'];
        if($image_name!= ""){

            $ext = end(explode('.', $image_name));
            $image_name  = "Food_Category_".rand(000, 999).'.'.$ext;
            
            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/images/category/";
          
            $upload = move_uploaded_file($source_path, $destination_path . $image_name);
            
            //check if image is uploaded or not
            if($upload == false) {
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                //Redirect 
                header('location:'.SITE_HOME.'admin/manage-category.php');
                var_dump($_FILES);  // Check if the file is being received by PHP
                var_dump($upload); 
                die();
            }

            if($image_name!= ''){

                $remove_path= "../images/category/".$current_image;
                $remove= unlink($remove_path);

                    if($remove == false) {
                $_SESSION['failed-remove']= "<div class='error'>Failed to remove current Image</div>";
                header('location:'.SITE_HOME.'admin/manage-category.php');
                die();
                //Redirect 
                    }
        }
    }
        else{
            $image_name = $current_image;
        }
    }
        else{
            $image_nameimage = $current_image;
        }


    $sql2 = "UPDATE category SET
    category_title = '$title',
    category_image = '$image_name',
    category_featured = '$featured',
    category_active = '$active'
    WHERE category_id = '$id'
    ";

    $res2 = mysqli_query($conn, $sql2);

        if($res2==true){
            $_SESSION['update'] = "<div class='success'>Category updated successfully.</div>";
            header('location:'.SITE_HOME.'admin/manage-category.php');
        }
        else{
            $_SESSION['update'] = "<div class='error'>Fail to update category.</div>";
            header('location:'.SITE_HOME.'admin/manage-category.php');
        }
}
    
?>


    </div>
</div>



<?php include ('partials/footer.php'); ?>