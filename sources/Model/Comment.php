<?php
    class Comment {
        private $id;
        private $userID;
        private $productID;
        private $text;
        private $date;
        private $parentID;
        public function __construct($id, $userID, $productID, $text, $parentID, $date)
        {
            $this->id = $id;
            $this->userID = $userID;
            $this->productID = $productID;
            $this->text = $text;
            $this->date = $date;
            $this->parentID = $parentID;
        }
        public function getID() {
            return $this->id;
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
        public function getParentID() {
            return $this->parentID;
        }
        public function getDate() {
            return $this->date;
        }
    }
?>