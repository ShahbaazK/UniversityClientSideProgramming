<?php

require_once('Models/Database.php');

class LoginDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function login($u_name, $u_password)
    {

        $salt = "ca34ff6ghh7ggs0hmn112dfg'";
        $password_hash = $u_password . $salt;
        $password_hash = sha1($password_hash);

        $sqlQuery = "select u_name from users WHERE u_name = '$u_name' AND u_password = '$password_hash'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result != false) {
            return $result;
        } else {
            return false;
        }
    }

}