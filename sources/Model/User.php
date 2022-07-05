<?php 
class User {
    private $id;
    private $username;
    private $password;
    private $email;
    private $fullname;
    private $phone;
    private $currency;
    private $role_id;
    private $avatar;
    public function __construct($id, $username, $password, $email, $fullname, $phone, $currency, $role_id, $avatar) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->currency = $currency;
        $this->role_id = $role_id; 
        $this->avatar = $avatar;
    }
    public function getID() {
        return $this->id;
    }
    public function getUsername() {
        return $this->username;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($oldPassword, $newPassword) {
        if($this->password === $oldPassword) {
            $this->password = $newPassword;
        }
    }
    public function checkPassword($input) {
        if($input === $this->password) {
            return true;
        } else return false;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($newEmail) {
        $this->email = $newEmail;
    }
    public function getFullname() {
        return $this->fullname;
    }
    public function setFullname($newFullname) {
        $this->fullname = $newFullname;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function setPhone($newPhone) {
        $this->phone = $newPhone;
    }
    public function getCurrency() {
        return $this->currency;
    }
    public function withdrawCurrency($amount) {
        if($this->currency > $amount && $amount > 0) {
            $this->currency -= $amount;
        }
    }
    public function depositCurrency($amount) {
        if($amount > 0) {
            $this->currency += $amount;
        }
    }
    public function getRoleID() {
        return $this->role_id;
    }
    // public function __toString()
    // {
    //     return $this->id." - ".$this->role_id." - ".$this->username." - ".$this->password." - ".$this->email." - ".$this->fullname." - ".$this->phone." - ".$this->currency;
    // }
}
?>