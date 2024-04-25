<?php 
include('../config/constants.php');

session_destroy();


header('location:'.SITE_HOME.'.admin/login.php');

?>