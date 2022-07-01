<?php 
class Category {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;        
    }
    public function getID() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function setName($newName) {
        $this->name = $newName;
    }
    public function __toString()
    {
        return $this->id." - ".$this->name;
    }
}
?>