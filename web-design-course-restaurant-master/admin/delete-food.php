<?php 
include('partials/menu.php'); 

echo "Delete Food Page";

if(isset($_GET['id']) && isset($_GET['image_name'])) {



    $id = $_GET['id'];

    $image_name = $_GET['image_name'];

    if($image_name != "") {
        $path = "/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/web-design-course-restaurant-master/images/food/".$image_name;

        $remove = unlink($path);


        if($remove == false) {

            $_SESSION['upload'] = "<div class='error'>Failed to remove image.</div>";

            header('location:'.SITE_HOME.'admin/manage-food.php');

            die();

        }
    }
    $sql = "DELETE FROM food WHERE food_id = $id";

    $res= mysqli_query($conn, $sql); 

    if ($res == true) {
        $_SESSION['delete'] =  "<div class='success'>Food Deleted Successfully.</div>";
        header('location:'.SITE_HOME.'admin/manage-food.php');

            die();
    }
    else {
        $_SESSION['delete'] =  "<div class='success'>Failed to delete food.</div>'";
        header('location:'.SITE_HOME.'admin/manage-food.php');
    }




}
else {

$_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";

header('location:'.SITE_HOME.'admin/manage-food.php');

}

?>