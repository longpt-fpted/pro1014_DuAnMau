<?php

include "/storage/ssd2/188/19378188/public_html/Model/Charge.php";

class ChargeDAO {
    private $database;
    public function __construct() {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }
    
    public function getCardByCardcode($cardcode) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('SELECT * FROM `charge` WHERE `charge`.`code` = ?');
            $query->bind_param('s', $cardcode);
            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $charge = $result->fetch_assoc();
                    return new Charge($charge['type'], $charge['value'], $charge['code'], $charge['seri']);
                } else return false;
            } else return false;
        }
    }
}
?>