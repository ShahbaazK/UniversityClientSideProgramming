<?php

class LoginData
{
    protected $_u_name,$_u_password;

    public function __construct($dbRow) {

        $this->_u_name = $dbRow['u_name'];
        $this->_u_password = $dbRow['u_password'];
    }

    public function getU_name() {
        return $this->_u_name;
    }

    public function getU_password() {
        return $this->_u_password;
    }

}