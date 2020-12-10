<?php
$username = 'stc508';
$password = 'shahbaaz14@'; // I need to change my password, please do not laugh
$host = 'helios.csesalford.com';
$dbName = 'stc508';

$view = new stdClass();
$connect = mysqli_connect($host, $username, $password, $dbName);
$output = '';

if (!empty($_GET['q'])) { //if the textbox is not empty then request "q"
    $q = $_GET['q']; //requests "q"
    $sql = "SELECT * FROM trainerProducts WHERE trainerProducts.trainer_name LIKE '%$q%'"; //sql query to get the information for trainer products from the database
    $result = mysqli_query($connect, $sql); //this connects the datasbase connection

    while ($output = mysqli_fetch_assoc($result)) { //this will echo out the results that are similar to the input of a user type in the searchbox
        echo '<p>' . $output['trainer_name'] . "  " . '</p>'; //the output shows the result of trainer names that are listed in the database
    }

}




