<?php

session_start();
require_once('Models/mapLocationDataSet.php');
$view = new stdClass();
$view->pageTitle = 'WatchList';
$username = 'stc508';
$password = 'shahbaaz14@';
$host = 'helios.csesalford.com';
$dbName = 'stc508';

$view = new stdClass();
$view->pageTitle = 'Location';
$view->deleted = null;

$mapLocationDataSet = new mapLocationDataSet();

$view->mapLocationDataSet = $mapLocationDataSet->fetchAllLocationTrainers();

if (isset($_POST['SearchLocation'])) {

    $view->mapLocationDataSet = $mapLocationDataSet->mapLocationsearch();
}
require_once('Views/MapItems.phtml');