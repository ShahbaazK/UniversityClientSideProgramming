<?php
$view = new stdClass();
$view->pageTitle = 'Register';
$username = 'stc508';
$password = 'shahbaaz14@';
$host = 'helios.csesalford.com';
$dbName = 'stc508';
//posted values from textbox
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$u_name = $_POST["u_name"];
$u_email = $_POST["u_email"];
$u_password = $_POST["u_password"];
$u_cpassword = $_POST["u_cpassword"];
$u_address = $_POST["u_address"];
$p_number = $_POST["p_number"];
//echo $last_name;


$dbHandle = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
//encryption for all passwords
$salt = "ca34ff6ghh7ggs0hmn112dfg'";
$password_hash = $u_password . $salt;
$password_hash = sha1($password_hash);
//sql query for register
$sqlQuery = "INSERT INTO stc508.users (first_name, last_name, u_name, u_email, u_password, u_cpassword, u_address, p_number) 
VALUES ('$first_name','$last_name','$u_name','$u_email','$password_hash','$password_hash','$u_address','$p_number')";

$statement = $dbHandle->prepare($sqlQuery); // prepare PDO statement


//validation errors
$firstnameError = "";
$lastnameError = "";
$nameError = "";
$password1Error = "";
$password2Error = "";
$emailError = "";
$addressError = "";
$phoneError = "";
$useregister = "";

$name = ($_POST["u_name"]);
$password1 = ($_POST["u_password"]);
$email = ($_POST["u_email"]);
$address = ($_POST["u_address"]);
$phone = ($_POST["p_number"]);

$errors = array();


// On submitting form below function will execute.
if (isset($_POST['submit'])) {
    if (empty($_POST["first_name"])) {
        array_push($errors, 1);
        $firstnameError = "First Name is required*"; //validation for firstname
    }
    if (empty($_POST["last_name"])) {
        array_push($errors, 2);
        $lastnameError = "Last Name is required*"; //validation for last name
    }
    if (empty($_POST["u_name"])) {
        array_push($errors, 3);
        $nameError = "Username is required*"; //validation for username
    }
// check name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $u_name)) {
        array_push($errors, 3);
        $nameError = "Only letters and white space allowed*"; //validation for email
    }

    if (empty($_POST["u_password"])) {
        array_push($errors, 4);
        $password1Error = "Password required*"; //validation for password
    }

    if (empty($_POST["u_cpassword"])) {
        array_push($errors, 5);
        $password2Error = "Password required*"; //validation for password confirm
    }
    if ($_POST['u_password'] != $_POST['u_cpassword']) {
        array_push($errors, 4);
        $password2Error = "Passwords do not match!*"; //validation for password match
    }
    if (empty($_POST["u_email"])) {
        array_push($errors, 6);
        $emailError = "Email is required*"; //validation for email
    }
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $u_email)) {
        array_push($errors, 7);
        $emailError = "Invalid email format!"; //validation for email
    }
    if (empty($_POST["u_address"])) {
        array_push($errors, 8);
        $addressError = "Home Address required*"; //validation for address
    }
    if (empty($_POST["p_number"])) {
        array_push($errors, 11);
        $phoneError = "Phone No* is required"; //validation for phone number
    }

    if (empty($errors)) {
        $useregister = "User has been registered!";
        $statement->execute();
    }
}
require_once('Views/register.phtml');