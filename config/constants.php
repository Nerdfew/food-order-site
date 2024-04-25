<?php 
    //create non repeating constants
    session_start();

    define('SITE_HOME',  'http://localhost/Untitled/food-order-site/web-design-course-restaurant-master/');
    define('HOST', '100.67.126.41');
    define('DB_USERNAME','adminsql');
    define('DB_PASSWORD', 'admin');
    define('DB_NAME', 'food-order');
 
 
 $conn = mysqli_connect('100.67.126.41', 'adminsql', 'admin') or die(mysqli_error());

 

 $db_select  = mysqli_select_db($conn,'food-order') or die(mysqli_error());


?>