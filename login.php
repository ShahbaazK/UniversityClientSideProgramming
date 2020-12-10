<?php

require_once('Models/LoginDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Login'; //title of the page

$loginDataSet = new LoginDataSet(); //login dataset class

session_start(); //session starts for the user

$usernameError = ""; //validation error for username
$passwordError = ""; //vallidation error for password
$loginError = ""; //validation error for login failed
$success = "";
$errors1 = array(); //the array that stores the errors

$u_name = $_POST['u_name'];
$u_password = $_POST['u_password'];
$result = $loginDataSet->login($u_name, $u_password); //retrieve login function and stores in variable
if (isset($_POST['login'])) {

    if($result != false){
        $_SESSION['username'] = $result;
        echo '<script>window.location="trainers.php"</script>'; //directs the user to the trainers page once logged in
    }


    if(empty($u_name)){
        array_push($errors1, 1);
        $usernameError = "Username required"; //validation for username
    }

    if(empty($u_password)){
        array_push($errors1, 2);
        $passwordError = "Password required"; //validation for password
    }
    if($_POST['check'] != NULL){

        setcookie('u_name', $u_name, time() + 3600);
        setcookie('u_password', $u_password, time() + 3600);
    }

    if(empty($errors1) && ($result['u_name'])){
        $_SESSION['LoginName'] = $username;
    }
    else
    {
        $loginError = "Login Failed!";
        unset($_SESSION['LoginName']);
    }
}
require_once('Views/login.phtml');