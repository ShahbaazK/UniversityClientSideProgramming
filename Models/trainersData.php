<?php

class trainersData {

    protected $_trainer_id,$_trainer_name, $_trainer_image, $protected_trainer_features, $_trainer_type, $_trainer_price, $_trainer_stock, $_advert_start_date, $_advert_end_date;

    public function __construct($dbRow) {
        $this->_trainer_id = $dbRow['trainer_id'];
        $this->_trainer_name = $dbRow['trainer_name'];
        $this->_trainer_image = $dbRow['trainer_image'];
        $this->protected_trainer_features = $dbRow['trainer_feature'];
        $this->_trainer_type = $dbRow['trainer_type'];
        $this->_trainer_price = $dbRow['trainer_price'];
        $this->_trainer_stock = $dbRow['instock'];
        $this->_advert_start_date = $dbRow['advert_start_date'];
        $this->_advert_end_date = $dbRow['advert_end_date'];
    }

    public function getTrainer_id() { //this function returns the trainer id
        return $this->_trainer_id;
    }

    public function getTrainer_name() { //this function returns the trainer name
        return $this->_trainer_name;
    }

    public function getTrainer_image() { //this function returns the trainer image
        return $this->_trainer_image;
    }

    public function getTrainer_feature() { //this function returns the trainer feature
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
    public function getAdvert_start_Date() {
        return $this->_advert_start_date;
    }
    public function getAdvert_end_Date() {
        return $this->_advert_end_date;
    }
}