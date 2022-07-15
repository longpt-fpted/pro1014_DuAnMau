<?php
class Favorite {
    private $userID;
    private $productID;
    private $date;
    public function __construct($userID, $productID, $date)
    {
        $this->userID = $userID;
        $this->productID = $productID;
        $this->date = $date;        
    }

    public function getUserID() {
        return $this->userID;
    }
    public function getProductID() {
        return $this->productID;
    }
    public function getDate() {
        return $this->date;
    }
    public function setDate($newDate) {
        $this->date = $newDate;
    }
}
?>