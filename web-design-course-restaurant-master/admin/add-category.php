<?php include('/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/admin/partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                ?>

                <br><br>

<form action=""method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
        <tr>
            <td>Title: </td>
            <td>
                <input type="text" name="title" placeholder="category Title">
            </td>
        </tr>

                <tr>
                    <td>Select Image</td>
                    <td>
                        <input type="file" name="image">
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
        <input type="submit" name="submit" value="Add Category" class="btn-secondary">

    </td>
</tr>

    </table>
</form>




<?php 
if(isset($_POST['submit'])) 
{
   // echo "Clicked";
$title =$_POST['title'];

if(isset($_POST['featured'])){
    $featured = $_POST['featured'];
}
else{
    $feautured = 'No';
}
if(isset($_POST['active'])){
    $active = $_POST['active'];
}
else{
    $active = 'No';
}

//check for image selection or not & set value for image name

if(isset($_FILES['image']['name'])) {
    //upload image
    $image_name = $_FILES['image']['name'];
    if($image_name != ""){

    $source_path = $_FILES['image']['tmp_name'];

    $destination_path = "/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/images/category/";
    $image_name  = "Food_Category_".rand(000, 999).'.'.$ext;
    
    $upload = move_uploaded_file($source_path, $destination_path . $image_name);


    $ext = end(explode('.', $image_name));
   
    
    //check if image is uploaded or not
    if($upload == false) {
        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
        //Redirect 
        header('location:'.SITE_HOME.'admin/add-category.php');
        var_dump($_FILES);  // Check if the file is being received by PHP
        var_dump($upload); 
        die();
    }
}
}
else {
    //dont upload image and set name to blank.
    $image_name = "";
}



$sql= "INSERT INTO category SET
category_title='$title',
category_image = '$image_name',
category_featured= '$featured',
category_active= '$active'
";

$res = mysqli_query($conn,$sql);
if($res==true){
    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
    header('location:'.SITE_HOME.'admin/manage-category.php');

}
else{
    $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
    header('location:'.SITE_HOME.'admin/add-category.php');
    

}

}



?> 




    </div>
</div>

<?php include('/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/admin/partials/footer.php') ?>
