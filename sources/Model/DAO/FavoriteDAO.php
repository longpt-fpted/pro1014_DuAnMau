<?php
    // include "/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Model/Favorite.php";
    include "../Model/Favorite.php";

    class FavoriteDAO {
        private $database;
        public function __construct()
        {
            $this->database = new Database();
            $this->database = $this->database->getDatabase();
        }
        /*public function getAllFavoritesByUserID($id) {
            if($this->database->connect_error) {
                return false;
            } else {
                $query = $this->database->prepare("SELECT *, DATE_FORMAT(`favorite`.`date`, '%d/%l/%Y') AS `fdate` FROM `favorite` WHERE `favorite`.`user_id` = $id");
                //$query->bind_param('s',$id);
                if($query->execute()) {
                    $result = $query->get_result();
                    if($result->num_rows > 0) {
                        $favorites = [];
                        while($row = $result->fetch_assoc()) {
                            $favorite = new Favorite($row['user_id'], $row['product_id'], $row['fdate']);
                            $favorites[] = $favorite;
                        }

                        return $favorites;
                    } else return false;
                } else return false;
            }
        }*/
        public function createNewFavorite($userID, $productID) {
            if($this->database->connect_error) {
                return false;
            } else {
                $query = $this->database->prepare("INSERT INTO `favorite`(`user_id`, `product_id`, `date`) VALUES (?, ?, ?)");
                $date = date("Y-m-d");
                $query->bind_param('sss', $userID, $productID, $date);

                return $query->execute();
            }
        }
        public function deleteFavoriteByUserIDandProductID($userID, $productID) {
            if($this->database->connect_error) {
                return false;
            } else {
                $query = $this->database->prepare("DELETE FROM `favorite` WHERE `favorite`.`user_id` = ? AND `favorite`.`product_id` = ?");
                $query->bind_param('ss', $userID, $productID);

                return $query->execute();
            }
        }
        public function isExistFavorite($userID, $productID) {
            if($this->database->connect_error) {
                return false;
            } else {
                $query = $this->database->prepare("SELECT *, DATE_FORMAT(`favorite`.`date`, '%d/%l/%Y') AS `fdate` FROM `favorite` WHERE `favorite`.`user_id` = ? AND `favorite`.`product_id` = ?");
                $query->bind_param('ss', $userID, $productID);

                if($query->execute()) {
                    $result = $query->get_result();
                    return $result->num_rows > 0;
                } else return false;
            }
        }
        public function getFavoritesByUserAndProduct($userID, $productID) {
            if($this->database->connect_error) {
                return false;
            } else {
                $query = $this->database->prepare("SELECT *, DATE_FORMAT(`favorite`.`date`, '%d/%l/%Y') AS `fdate` FROM `favorite` WHERE `favorite`.`user_id` = ? and `favorite`.`product_id` = ?");
                $query->bind_param('ss', $userID, $productID);
                if($query->execute()) {
                    $result = $query->get_result();
                    if($result->num_rows > 0) {
                        $favorite = $result->fetch_assoc();
                        return new Favorite($favorite['user_id'], $favorite['product_id'], $favorite['fdate']);
                    } else return false;
                } else return false;
            }
        }
        public function getFavoritesByProductID($productID) {
            if($this->database->connect_error) {
                return false;
            } else {
                $query = $this->database->prepare("SELECT *, DATE_FORMAT(`favorite`.`date`, '%d/%l/%Y') AS `fdate` FROM `favorite` WHERE `favorite`.`product_id` = ?");

                $query->bind_param("s", $productID);

                if($query->execute()) {
                    $result = $query->get_result();
                    if($result->num_rows > 0) {
                        $favorites = [];
                        while($row = $result->fetch_assoc()) {
                            $favorite = new Favorite($row['user_id'], $row['product_id'], $row['fdate']);
                            $favorites[] = $favorite;
                        }

                        return $favorites;
                    } else return false;
                } else return false;
            }
        }
    }
    
?>