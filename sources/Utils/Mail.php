<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/Exception.php';
require '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/PHPMailer.php';
require '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/SMTP.php';

// include_once '/Applications/XAMPP/xamppfiles/htdocs/pro1014_duan/sources/Libraries/PHPMailer/src/SMTP.php';
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
        $this->mail->CharSet = 'UTF-8';
        $this->mail->SMTPDebug=0;
    }

    public function sendMail($usermail, $title, $message) {
        try {
            $this->mail->setFrom('longpt.demo@gmail.com', $title);
            $this->mail->addAddress($usermail, 'Pham Thien Long');
            $this->mail->isHTML(true);
            $this->mail->Subject = $title;
            $this->mail->Body = $message;
            $this->mail->isHTML(true);
            $this->mail->send();
            $resp = true;
        } catch(Exception $e) {
            $resp = false;
        }
        return $resp;
    }
    public function getCheckoutMail($user, $orders) {
        $username = $user->getFullname();
        $ordersString = "";
        $count = 1;
        $totalPrice = 0;
        foreach ($orders as $order) {
            $orderName = $order['name'];
            $orderQuantity = $order['quantity'];
            $orderTotalPrice = $order['totalprice'];
            $totalPrice += $orderTotalPrice;
            $ordersString .= 
            "<tr>
                <td>$count</td>
                <td>$orderName</td>
                <td>$orderQuantity</td>
                <td>$orderTotalPrice</td>
            </tr>";
            $count++;
        }
        
        $result = "<style>
                        table, th, td {
                            border: .5px solid black;
                            border-collapse: collapse;
                        }
                        tr {
                            display: grid;
                            grid-template-columns: 1fr 1fr 1fr 1fr;
                            /* gap: 1.5em; */
                        }
                        td {
                            padding: .5em .75em;
                        }
                    </style>
                    <em>Xin chào $username, </em>
                    <br/>
                    <p>Chúng tôi xin xác nhận đơn hàng của bạn, đơn hàng của bạn gồm: </p>
                    <table>
                        <tr>
                            <td>Stt</td>
                            <td>Tên sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Tổng giá</td>
                        </tr>".
                        $ordersString
                        ."
                    </table>
                    <br/>";
        if($totalPrice >= 1000000 && $totalPrice < 5000000) {
            $result .= "
            <p>Vì giá trị đơn hàng của bạn trên 1.000.000đ, chúng tôi đã gửi tặng bạn 1 mã giảm giá với trị giá 100.000đ</p>
            <p>Cảm ơn bạn đã lựa chọn tin tưởng DemonStone Store!</p>
            <p>DemonStone Store.</p>
            ";
        } else if($totalPrice >= 5000000 && $totalPrice < 10000000) {
            $result .= "
            <p>Vì giá trị đơn hàng của bạn trên 5.000.000đ, chúng tôi đã gửi tặng bạn 1 mã giảm giá với trị giá 200.000đ</p>
            <p>Cảm ơn bạn đã lựa chọn tin tưởng DemonStone Store!</p>
            <p>DemonStone Store.</p>
            ";
        } else if($totalPrice >= 10000000) {
            $result .= "
            <p>Vì giá trị đơn hàng của bạn trên 10.000.000đ, chúng tôi đã gửi tặng bạn 1 mã giảm giá với trị giá 500.000đ</p>
            <p>Cảm ơn bạn đã lựa chọn tin tưởng DemonStone Store!</p>
            <p>DemonStone Store.</p>
            ";
        }
               
        return $result;
    }
}
?>