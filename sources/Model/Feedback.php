<?php
class Feedback {
    private $userID;
    private $productID;
    private $text;
    private $rating;
    private $date;
    public function __construct($userID, $productID, $text, $rating, $date)
    {
        $this->userID = $userID;
        $this->productID = $productID;
        $this->text = $text;
        $this->rating = $rating;
        $this->date = $date;
    }
    public function getUserID() {
        return $this->userID;
    }
    public function getProductID() {
        return $this->productID;
    }
    public function getText() {
        return $this->text;
    }
    public function getRating() {
        return $this->rating;
    }
    public function getDate() {
        return $this->date;
    }
}
?>