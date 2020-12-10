<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'PostAd | User - ' . ($_SESSION['username']); //session start for user
$username ='stc508';
$password = 'shahbaaz14@';
$host = 'helios.csesalford.com';
$dbName = 'stc508';

$trainer_id = $_POST["trainer_id"];
$trainer_name = $_POST["trainer_name_postad"];
//$u_name = $_POST["u_name"];
$trainer_image = $_POST["filepicture"];
$trainer_feature = $_POST["Colour"];
$trainer_type = $_POST["Brand"];
$trainer_price = $_POST["trainer_price"];
$instock = 'Available';
$advert_Start_Date = $_POST["advert_start_date"];
$advert_End_Date = $_POST["advert_end_date"];
$trainer_location = $_POST["trainer_location"];


$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",  $username, $password);
//encryption for all password
//sql query for post adverts inserted to the trainers table
$sqlQuery = "INSERT INTO stc508.trainerProducts ( trainer_name, trainer_image, trainer_feature, trainer_type, trainer_price, instock, advert_start_date, advert_end_date, trainer_location) 
VALUES ('$trainer_name','$trainer_image','$trainer_feature','$trainer_type',$trainer_price,'$instock','$advert_Start_Date','$advert_End_Date','$trainer_location')";
$statement = $dbHandle->prepare($sqlQuery); // prepare PDO statement

$rows = $statement->execute();
//validation errors
$trainernameError = "";
$trainerimageError = "";
$trainercolourError = "";
$trainerbrandError = "";
$trainerpriceError = "";
$advertStartDateError= "";
$advertEndDateError= "";
$trainer_locationError= "";

$trainer_name = ($_POST["trainer_name"]);
$password1 = ($_POST["u_password"]);
$email = ($_POST["u_email"]);
$address = ($_POST["u_address"]);
$phone = ($_POST["p_number"]);

$errors = array();


// On submitting form below function will execute.
if(isset($_POST['submit'])) {
    if (empty($_POST["trainer_name_postad"])) {
        array_push($errors, 1);
        $trainernameError = "Name of the product is required*"; //validation for product name
    }
   if (empty($_POST["filepicture"])) {
        array_push($errors, 2);
        $trainerimageError = "You need to select a file*"; //validation for file upload
    }
    if (empty($_POST["Colour"])) {
        array_push($errors, 2);
        $trainercolourError = "Colour selection is required*"; //validation for colour
    }
    if (empty($_POST["Brand"])) {
        array_push($errors, 3);
        $trainerbrandError = "You need to select the product brand*"; //validation for brand
    }
    if (empty($_POST["trainer_location"])) {
        array_push($errors, 3);
        $trainer_locationError = "You need to enter a location*"; //validation for brand
    }
    if(empty($_POST["trainer_price"])){
        array_push($errors, 11);
        $trainerpriceError = "Price amount is required*"; //validation for price
    }

    if (empty($errors)){
        $useregister = "Advert has been posted!";
        $statement->execute();
    }
}
require_once('Views/adverts.phtml');