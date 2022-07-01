<?php
class Order {
    private $id;
    private $userID;
    private $price;
    private $isPayed;
    private $date;
    
    public function __construct($id, $userID, $price, $isPayed, $date)
    {
        $this->id = $id;
        $this->userID = $userID;
        $this->price = $price;
        $this->isPayed = $isPayed;
        $this->date = $date;
    }
    public function getID() {
        return $this->id;
    }
    public function getUserID() {
        return $this->userID;
    }
    public function getPrice() {
        return $this->price;
    }
    public function isPayed() {
        return $this->isPayed;
    }
    public function getDate() {
        return $this->date;
    }
    public function setDate($newDate) {
        $this->date = $newDate;
    }
}
?>