<?php 
include('/Applications/XAMPP/xamppfiles/htdocs/Untitled/food-order-site/config/constants.php');
unset($_SESSION['login']);
session_destroy();


header('location:'.SITE_HOME.'admin/login.php');

?>