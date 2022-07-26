<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/Exception.php';
require '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/PHPMailer.php';
require '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/SMTP.php';

// require 'C:\xampp\htdocs\pro1014_DuAn\sources\Libraries\PHPMailer\src\Exception.php';
// require 'C:\xampp\htdocs\pro1014_DuAn\sources\Libraries\PHPMailer\src\PHPMailer.php';
// require 'C:\xampp\htdocs\pro1014_DuAn\sources\Libraries\PHPMailer\src\SMTP.php';

class Mail {
    private $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'longpt.demo@gmail.com';
        $this->mail->Password = 'ysycgxbwphejcqka';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port = 465;
    }

    public function sendMail($usermail, $title, $message) {
        $resp = [];
        try {
            $this->mail->setFrom('longpt.demo@gmail.com', $title);
            $this->mail->addAddress($usermail, 'Pham Thien Long');
            $this->mail->isHTML(true);
            $this->mail->Subject = $title;
            $this->mail->Body = $message;
            $this->mail->isHTML(true);
            $this->mail->send();
            $resp['status'] = 'success';
        } catch(Exception $e) {
            $resp['statuss'] = 'failed';
            $resp['error'] = $e;
        }
        return $resp;
    }
}
?>