<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'Admin';

($_SESSION['u_name']); //username session stored
if(("admin")){ //If session not registered
   // header("location:login.php"); // Redirect to login.php page
}
else //Continue to current page
    header( 'Content-Type: text/html; charset=utf-8' );


require_once('Views/Admin.phtml');