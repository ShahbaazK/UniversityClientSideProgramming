<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'showInfo';
$username = 'stc508';
$password = 'shahbaaz14@';
$host = 'helios.csesalford.com';
$dbName = 'stc508';

$view = new stdClass();
$view->pageTitle = 'showInfoData';
$view->deleted = null;

if (isset($_GET['trainer_id'])) {

    if (isset($_SESSION["showInfo"])) // if session is already set
    {
        $item_array_id = array_column($_SESSION["showInfo"], "trainer_location"); // puts session and
        // new item_id into same variable

        if (!in_array($_GET["trainer_id"], $item_array_id)) // if the advert ID and item ID not already in array list
        {

            $count = count($_SESSION["showInfo"]);
            $item_array = array(
                'trainerID' => $_GET["trainer_id"],
                'trainerName' => $_GET["trainer_name"], // ... then an array is created to post the advert details that are passed
                'trainerImage' => $_GET["trainer_image"], // ...into a key array to match the item id, name, colour, brand etc...
                'trainerColour' => $_GET["trainer_feature"],
                'trainerBrandType' => $_GET["trainer_type"],
                'trainerArea' => $_GET["city"],
                'trainerAvailabilty' => $_GET["instock"],
                'trainerPrice' => $_GET["trainer_price"],
                'trainerStartDate' => $_GET["advert_start_date"],
                'trainerEndDate' => $_GET["advert_end_date"]
            );
            $_SESSION["showInfo"][$count] = $item_array; // counts current 'showInfo' session
        }

    } else {
        $item_array = array(
            'trainerID' => $_GET["trainer_id"],
            'trainerName' => $_GET["trainer_name"],  // ... then an array is created to post the advert details that are passed
            'trainerImage' => $_GET["trainer_image"], // ...into a key array to match the item id, name, colour, brand etc...
            'trainerColour' => $_GET["trainer_feature"],
            'trainerBrandType' => $_GET["trainer_type"],
            'trainerArea' => $_GET["city"],
            'trainerAvailabilty' => $_GET["instock"],
            'trainerPrice' => $_GET["trainer_price"],
            'trainerStartDate' => $_GET["advert_start_date"],
            'trainerEndDate' => $_GET["advert_end_date"]

        );
        $_SESSION["showInfo"][0] = $item_array; // else array holds '0' value
    }
}


if (isset($_GET["action"])) // if 'action' querystring already set
{
    if ($_GET["action"] == "delete") // if 'action' equals delete then continue...
    {
        foreach ($_SESSION["showInfo"] as $keys => $values)  // ... uses a foreach loop statement and grabs the session
            // uses the key array to loop through each item ID and advert ID from the session
        {
            if ($values["trainerID"] == $_GET["trainer_id"]) {

                unset($_SESSION["showInfo"][$keys]); // if item ID == advert ID then remove and unset current item key session selected
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="showInfo.php"</script>';
            }
        }
    }
}

if (isset($_GET['trainerID'])) {

    $trainerID = $_GET['trainerID'];
    $dbHandle = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

    $username = $_SESSION['username'];
    $sqlQuery = "INSERT INTO stc508.wishlist (traineridwishlist, usernamewishlist) VALUES('$trainerID', '$username')"; //sql query to add the item to watchlist
    $statement = $dbHandle->prepare($sqlQuery);
    $statement->execute(); // execute the PDO statement

    header('Location: ' . $_SERVER['PHP_SELF']);
}

require_once('Views/showInfo.phtml');