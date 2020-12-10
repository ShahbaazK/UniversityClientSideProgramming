<?php

require('Models/Database.php');
require('Models/mapLocationData.php');

class mapLocationDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

// this get the trainers data from the database
    public function fetchAllLocationTrainers()
    {
        {
            $sqlQuery = 'SELECT * FROM trainerProducts';


            $statement = $this->_dbHandle->prepare($sqlQuery);
            $statement->execute(); // execute the PDO statement

            $dataSet = [];
            while ($row = $statement->fetch()) {
                $dataSet[] = new mapLocationData($row);
            }
            return $dataSet;
        }
    }

    public function mapLocationsearch()
    {

        $search = $_POST['search'];
        $sqlQuery = "SELECT * FROM trainerProducts WHERE city like '%$search%'";

        $statement = $this->_dbHandle->prepare($sqlQuery);           // prepares query
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {

            $dataSet[] = new mapLocationData($row);
        }
        return $dataSet;
    }
}