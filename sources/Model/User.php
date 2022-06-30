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

    public function __construct($id, $username, $password, $email, $fullname, $phone, $currency, $role_id) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->currency = $currency;
        $this->role_id = $role_id; 
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
            $this->passthru = $newPassword;
        }
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($newEmail) {
        $this->email = $newEmail;
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
}
?>