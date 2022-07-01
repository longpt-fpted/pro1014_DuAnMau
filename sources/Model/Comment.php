<?php
    class Comment {
        private $userID;
        private $productID;
        private $text;
        private $date;

        public function __construct($userID, $productID, $text, $date)
        {
            $this->userID = $userID;
            $this->productID = $productID;
            $this->text = $text;
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
        public function getDate() {
            return $this->date;
        }
    }
?>