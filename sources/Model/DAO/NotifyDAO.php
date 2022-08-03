<?php
include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Notify.php";
// include "../Model/Notify.php";

class NotifyDAO {
    private $database;
    public function __construct() {
        $this->database = new Database();
        $this->database = $this->database->getDatabase();
    }
    public function getNotifyByID($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`notify`.`date`, '%d/%m/%Y') AS `fdate` FROM `notify` WHERE `notify`.`id` = ?");
            $query->bind_param('s', $id);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $notify = $result->fetch_assoc();
                    return new Notify($notify['id'], $notify['user_id'], $notify['type'], $notify['type_id'], $notify['title'], $notify['fdate']);
                } else return false;
            } else return false;
        }
    }
    public function getNotifyByUserIDAndTypeIDWithType($uid, $tid, $type) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`notify`.`date`, '%d/%m/%Y') AS `fdate` FROM `notify` WHERE `notify`.`user_id` = ? AND `notify`.`type_id` = ? AND `notify`.`type` = ?");
            $query->bind_param('sss', $uid, $tid, $type);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $notify = $result->fetch_assoc();
                    return new Notify($notify['id'], $notify['user_id'], $notify['type'], $notify['type_id'], $notify['fdate']);
                } else return false;
            } else return false;
        }
    }
    public function getAllNotifiesByUserID($userID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT *, DATE_FORMAT(`notify`.`date`, '%d/%m/%Y') AS `fdate` FROM `Notify` WHERE `Notify`.`user_id` = ? ORDER BY `fdate`");
            $query->bind_param('s', $userID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $notifies = [];
                    while($row = $result->fetch_assoc()) {
                        $notify = new Notify($row['id'], $row['user_id'], $row['type'], $row['type_id'], $row['fdate']);
                        $notifies[] = $notify;
                    }
                    return $notifies;
                } else return false;
            } else return false;
        }
    }
    public function createNotifyToUser($userID, $type, $tID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("INSERT INTO `Notify`(`user_id`, `type`, `type_id`, `date`) VALUES (?, ?, ?, ?)");
            $date = date("Y-m-d");
            $query->bind_param('ssss', $userID, $type, $tID, $date);

            return $query->execute();
        }
    }
    public function getNumbersOfNotify($userID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("SELECT count(`notify`.`id`) as `numbersOfNotify` FROM `Notify` WHERE `Notify`.`user_id` = ?");
            $query->bind_param('s', $userID);

            if($query->execute()) {
                $result = $query->get_result();
                if($result->num_rows > 0) {
                    $notify = $result->fetch_assoc();
                    return $notify['numbersOfNotify'];
                } else return false;
            } else return false;
        }
    }
    public function isNotifyExist($userID, $type, $tID) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare('SELECT * FROM `notify` WHERE `notify`.`user_id` = ? AND `notify`.`type` = ? AND `notify`.`type_id` = ?');
            $query->bind_param("sss", $userID, $type, $tID);
            if($query->execute()) {
                $result = $query->get_result();
                return $result->num_rows > 0;
            } else return false;
        }
    }
    public function removeNotifyByID($id) {
        if($this->database->connect_error) {
            return false;
        } else {
            $query = $this->database->prepare("DELETE FROM `Notify` WHERE `notify`.`id` = ?");
            $query->bind_param('s', $id);
            return $query->execute();
        }
    }
}
?>