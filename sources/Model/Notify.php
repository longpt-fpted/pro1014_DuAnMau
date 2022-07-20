<?php
class Notify {
    private $id;
    private $userID;
    private $type;
    private $typeID;
    private $date;

    public function __construct($id, $userID, $type, $typeID, $date) {
        $this->id = $id;
        $this->userID = $userID;
        $this->type = $type;
        $this->typeID = $typeID;
        $this->date = $date;
    }
    public function getID() {
        return $this->id;
    }
    public function getUserID() {
        return $this->userID;
    }
    public function getType() {
        return $this->type;
    }
    public function getTypeID() {
        return $this->typeID;
    }
    public function getDate() {
        return $this->date;
    }
}