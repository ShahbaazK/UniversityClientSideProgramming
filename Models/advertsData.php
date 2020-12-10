<?php

class advertsData
{
    protected $_trainer_id,$_trainer_name, $_trainer_image, $protected_trainer_features, $_trainer_type, $_trainer_price, $_trainer_stock, $_trainer_location;

    public function __construct($dbRow) {
        $this->_trainer_id = $dbRow['trainer_id'];
        $this->_trainer_name = $dbRow['trainer_name'];
        $this->_trainer_image = $dbRow['trainer_image'];
        $this->protected_trainer_features = $dbRow['trainer_feature'];
        $this->_trainer_type = $dbRow['trainer_type'];
        $this->_trainer_price = $dbRow['trainer_price'];
        $this->_trainer_stock = $dbRow['instock'];
        $this->_trainer_location = $dbRow['trainer_location'];
    }

    public function getTrainer_id() {
        return $this->_trainer_id;
    }

    public function getTrainer_name() {
        return $this->_trainer_name;
    }

    public function getTrainer_image() {
        return $this->_trainer_image;
    }

    public function getTrainer_feature() {
        return $this->protected_trainer_features;
    }

    public function getTrainer_type() {
        return $this->_trainer_type;
    }

    public function getTrainer_price() {
        return $this->_trainer_price;
    }
    public function getTrainer_stock() {
        return $this->_trainer_stock;
    }
    public function getTrainer_location() {
        return $this->_trainer_location;
    }
}