<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/Exception.php';
require '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/PHPMailer.php';
require '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/SMTP.php';

// require '/XAMPP/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/Exception.php';
// require '/XAMPP/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/PHPMailer.php';
// require '/XAMPP/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
function sendMail($usermail, $title, $message) {
    global $mail;
    $resp = [];
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'longpt.demo@gmail.com';
        $mail->Password = 'ysycgxbwphejcqka';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        
        $mail->setFrom('longpt.demo@gmail.com', $title);
        $mail->addAddress($usermail, 'Pham Thien Long');
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $message;
        $mail->send();
        $resp['status'] = 'success';
    } catch(Exception $e) {
        $resp['statuss'] = 'failed';
        $resp['error'] = $e;
    }

    return $resp;
}

?>