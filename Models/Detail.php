<?php

session_start();

$view = new stdClass();
require_once('Models/trainersDataSet.php');

$productDataSet = new trainersDataSet();
$view->ProductDataSet = $productDataSet->fetchTrainers($_GET['id']);

require_once('Views/Admin.phtml');session_start();