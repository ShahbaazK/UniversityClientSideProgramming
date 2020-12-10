<?php

require_once('Models/Database.php');
require_once('Models/trainersData.php');

class trainerDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

// this get the trainers data from the database
    public function fetchAllTrainers()
    {
        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

        //$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
        $sqlQuery = 'SELECT * FROM trainerProducts';
        if ($sort == "lowToHigh") {
            $sqlQuery .= " ORDER BY trainer_price ASC"; //this filters it by price ascending
        } elseif ($sort == "highToLow") {
            $sqlQuery .= " ORDER BY trainer_price DESC"; //this filters it by price descending
        } elseif ($sort == "name(A-Z)") {
            $sqlQuery .= " ORDER BY trainer_name ASC"; //this filters it by name descending
        } elseif ($sort == "instock") {
            $sqlQuery .= " ORDER BY instock DESC"; //this filters it by availability ascending
        } elseif ($sort == "nike") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_type = 'Nike'"; //this filters it by type of trainers
        } elseif ($sort == "adidas") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_type = 'Adidas'"; //this filters it by type of trainers
        } elseif ($sort == "converse") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_type = 'Converse'"; //this filters it by type of trainers
        } elseif ($sort == "puma") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_type = 'Puma'"; //this filters it by type of trainers
        } elseif ($sort == "lessThan50") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_price  BETWEEN 0 AND 50"; //this filters it by price
        } elseif ($sort == "lessThan100") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_price  BETWEEN 0 AND 100";//this filters it by price
        } elseif ($sort == "lessThan150") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_price BETWEEN 0 AND 150";//this filters it by price
        } elseif ($sort == "lessThan200") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_price BETWEEN 0 AND 200";//this filters it by price
        } elseif ($sort == "lessThan250") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_price BETWEEN 0 AND 250";//this filters it by price
        } elseif ($sort == "lessThan300") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_price BETWEEN 0 AND 300";//this filters it by price
        } elseif ($sort == "Black") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_feature = 'Black'";//this filters it by colour
        } elseif ($sort == "Blue") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_feature = 'Blue'";//this filters it by colour
        } elseif ($sort == "Red") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_feature ='Red'";//this filters it by colour
        } elseif ($sort == "Green") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_feature ='Green'";//this filters it by colour
        } elseif ($sort == "Grey") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_feature ='Grey'";//this filters it by colour
        } elseif ($sort == "White") {
            $sqlQuery = " SELECT * FROM trainerProducts WHERE trainer_feature ='White'";//this filters it by colour
        } else {
            $sqlQuery = 'SELECT * FROM trainerProducts';
        }


        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new trainersData($row);
        }
        return $dataSet;
    }

    public function search()
    {

        $search = $_POST['search'];
        $sqlQuery = "SELECT * FROM trainerProducts WHERE CONCAT(trainer_name, trainer_type, trainer_feature) like '%$search%'";

        $statement = $this->_dbHandle->prepare($sqlQuery);           // prepares query
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {

            $dataSet[] = new trainersData($row);
        }
        return $dataSet;
    }

}