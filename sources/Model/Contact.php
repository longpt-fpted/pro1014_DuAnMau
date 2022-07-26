<?php
class Contact {
    private $id;
    private $fullname;
    private $email;
    private $type;
    private $subject;
    private $message;
    
    public function __construct($id, $fullname, $email, $type, $subject, $message)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->type = $type;
        $this->subject = $subject;
        $this->message = $message;
    }
    public function getID() {
        return $this->id;
    }
    public function getFullname() {
        return $this->fullname;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getType() {
        return $this->type;
    }
    public function getSubject() {
        return $this->subject;
    }
    public function getMessage() {
        return $this->message;
    }
}
?>