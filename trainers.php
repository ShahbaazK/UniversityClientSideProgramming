<?php

session_start();
require_once('Models/trainerDataSet.php');
$view = new stdClass();
$view->pageTitle = 'Trainer | User - ' . ($_SESSION['username']);


$trainerDataSet = new trainerDataSet();
$view->trainerDataSet = $trainerDataSet->fetchAllTrainers();

if (isset($_POST['searcht'])) {
    $view->trainerDataSet = $trainerDataSet->search();
}


require_once('Views/trainers.phtml');
