<?php 
    //create non repeating constants
    session_start();

    define('SITE_HOME',  'http://localhost/Untitled/food-order-site/web-design-course-restaurant-master/');
    define('HOST', '139.67.205.21');
    define('DB_USERNAME','adminsql');
    define('DB_PASSWORD', 'admin');
    define('DB_NAME', 'food-order');
 
 
 $conn = mysqli_connect('139.67.205.21', 'adminsql', 'admin') or die(mysqli_error());

 $db_select  = mysqli_select_db($conn,'food-order') or die(mysqli_error());


?>