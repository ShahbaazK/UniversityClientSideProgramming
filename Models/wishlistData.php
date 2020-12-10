<?php

class wishlistData
{
    protected $_trainerwishlist,$_usernamewishlist, $_wishlistid;

    public function __construct($dbRow) {
        $this->_trainerwishlist = $dbRow['traineridwishlist'];
        $this->_usernamewishlist = $dbRow['usernamewishlist'];
        $this->_wishlistid = $dbRow['wishlistid'];
    }

    public function gettrainerwishlist() { //this function returns to the trainer wishlist
        return $this->_trainerwishlist;
    }

    public function getusernamewishlist() { //this function returns to the username wishlist
        return $this->_usernamewishlist;
    }

    public function getwishlistid() ////this function returns to the wishlist id
    {
        return $this->_wishlistid;
    }
}