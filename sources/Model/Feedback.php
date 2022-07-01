<?php
class Feedback {
    private $userID;
    private $productID;
    private $text;
    private $rating;

    public function __construct($userID, $productID, $text, $rating)
    {
        $this->userID = $userID;
        $this->productID = $productID;
        $this->text = $text;
        $this->rating = $rating;
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
}
?>