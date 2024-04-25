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
                ?>

                <br><br>

<form action=""method="POST">
    <table class="tbl-30">
        <tr>
            <td>Title: </td>
            <td>
                <input type="text" name="title" placeholder="category Title">
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
    $feautured = $_POST['featured'];
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

$sql= "INSERT INTO tbl_category SET
title='$category_title',
featured='$category_featured',
active='$category_active'
";

$res = mysqli_query($conn,$sql);
if($res==true){
    $_SESSION['add'] = "<div class='success'> Category Added Successfully.</div>";
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
