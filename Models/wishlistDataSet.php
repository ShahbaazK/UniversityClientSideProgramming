<?php

require_once ('Models/Database.php');
require_once ('Models/wishlistData.php');
require_once ('Models/wishlistDataSet.php');

class wishlistDataSet
{
    protected $dbHandle, $dbInstance;

    public function __construct()
    {
        $this->dbInstance = Database::getInstance();
        $this->dbHandle = $this->dbInstance->getdbConnection();

    }
//
//    public function addToWishlist($traineridwishlist, $usernamewishlist, $wishlistid)
//
//    //$username = $_SESSION['username'];
//    $sqlQuery = "INSERT INTO stc508.wishlist (traineridwishlist, usernamewishlist, wishlistid)
//    VALUES ($traineridwishlist, $usernamewishlist, $wishlistid)";
//
//
//    $statement = $this->dbHandle->prepare($sqlQuery);
//    $statement->execute(); // execute the PDO statement
//
//    header('Location: ' . $_SERVER['PHP_SELF']);
}