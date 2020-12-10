<?php

require_once ('Models/Database.php');
require_once ('Views/registerData.php');

class registerDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function signupuser()
    {
        $sqlQuery = "INSERT INTO users (first_name, last_name, u_name, u_email, u_password, u_cpassword, u_address, p_number) 
        VALUES ('".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["u_name"]."','".$_POST["u_email"]."',".$_POST["u_cpassword"]."','".$_POST["u_address"]."','".$_POST["p_number"]."')";


        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new registerData($row);
        }
        return $dataSet;
    }
    }