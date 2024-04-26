<?php 

include("/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/config/constants.php");
//Check if values has been passed first 

if(isset($_GET['id']) AND isset($_GET['image_name'])) {


    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    
    
    if($image_name!="") {
        $path = "/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/images/category/".$image_name;
        $remove = unlink($path);

        if($remove==false) {
            $_SESSION['remove'] = "<div class='error'>Image was unable to remove.</div>";

           // header('location:'.SITE_HOME.'admin/manage-category.php');

            die();
        }

        $sql = "DELETE FROM category WHERE category_id = $id";

        $res = mysqli_query($conn, $sql);

        if($res==true) {
            $_SESSION['delete'] = "<div class='success'>Category was deleted!</div>";
            header('location:'.SITE_HOME.'admin/manage-category.php');
        }
        else {
            $_SESSION['delete'] = "<div class='error'>Category delete failed.</div>";
            header('location:'.SITE_HOME.'admin/manage-category.php');

        }


    }

}
else {
    // go back to previous page
    header('location:'.SITE_HOME.'/admin/manage-category.php');
}
?>