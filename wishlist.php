<?php

session_start();
$view = new stdClass();
$view->pageTitle = 'WatchList';
$username = 'stc508';
$password = 'shahbaaz14@';
$host = 'helios.csesalford.com';
$dbName = 'stc508';

$view = new stdClass();
$view->pageTitle = 'wishlistData';
$view->deleted = null;

if (isset($_SESSION['username'])) {
    $usernamewishlist = $_SESSION['username'];

    $dbHandle = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $sqlQuery = "SELECT traineridwishlist, wishlistid  FROM stc508.wishlist WHERE usernamewishlist= '$usernamewishlist'"; //sql query for inserting the date to the wishlist
    $statement = $dbHandle->prepare($sqlQuery);
    $rows = $statement->execute();

    $dataSet = [];
    while ($rows = $statement->fetch()) {
        $data = [];
        array_push($data, $rows['traineridwishlist']); //pushes the data to the wishlist table
        array_push($data, $rows['wishlistid']);
        array_push($dataSet, $data);
    }

    $trainerData = [];

    for ($i = 0; $i < count($dataSet); $i++) //    foreach ($dataSet as $item)
    {
        $id = $dataSet[$i][0];
        $sqlQuery = "SELECT *  FROM trainerProducts WHERE trainer_id= '$id '"; //sql query to get the trainer id
        $statement = $dbHandle->prepare($sqlQuery);
        $statement->execute(); // execute the PDO statement

        while ($row = $statement->fetch()) {
            $trainerData[] = $row;
        }
        array_push($trainerData[$i], $dataSet[$i][1]);
    }

    $view->wishlistData = $trainerData;
    $view->deleted = null;
}


if (isset($_GET['delete_id'])) {

    $trainerID = $_GET["delete_id"];

    $sqlQuery = "DELETE FROM stc508.wishlist WHERE traineridwishlist= '$trainerID '"; //sql query to delete the the item from the watchlist
    $statement = $dbHandle->prepare($sqlQuery);
    $statement->execute(); // execute the PDO statement
    header("Refresh:0; url=wishlist.php");

    if (isset($_SESSION['username'])) {
        $usernamewishlist = $_SESSION['username'];
    } else {

    }
}

//Add to the wishlist
if (isset($_GET['id'])) {

    $trainerID = $_GET['id'];
    $dbHandle = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

    $username = $_SESSION['username'];
    $sqlQuery = "INSERT INTO stc508.wishlist (traineridwishlist, usernamewishlist) VALUES('$trainerID', '$username')"; //sql query to add the item to watchlist
    $statement = $dbHandle->prepare($sqlQuery);
    $statement->execute(); // execute the PDO statement

    header('Location: ' . $_SERVER['PHP_SELF']);
}

require_once('Views/wishlist.phtml');