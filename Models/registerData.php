<?php


class registerData
{
    protected $_user_id,$_first_name,$_last_name,$_u_name,$_u_email,$_u_password,$c_password,$_u_address,$_p_number;

    public function __construct($dbRow) {
        $this->_user_id = $dbRow['user_id'];
        $this->_first_name = $dbRow['first_name'];
        $this->_last_name = $dbRow['last_name'];
        $this->_u_name = $dbRow['u_name'];
        $this->_u_email = $dbRow['u_email'];
        $this->_u_password = $dbRow['u_password'];
        $this->c_password = $dbRow['u_cpassword'];
        $this->_u_address = $dbRow['u_address'];
        $this->_p_number =$dbRow['p_number'];
    }

    public function getUser_id() {
        return $this->_user_id;
    }

    public function getFirst_name() {
        return $this->_first_name;
    }

    public function getLast_name() {
        return $this->_last_name;
    }

    public function getU_name() {
        return $this->_u_name;
    }

    public function getU_email() {
        return $this->_u_email;
    }

    public function getU_password() {
        return $this->_u_password;
    }

    public function getU_cpassword() {
        return $this->c_password;
    }

    public function getU_address() {
        return $this->_u_address;
    }

    public function getP_number() {
        return $this->_p_number;
    }

}