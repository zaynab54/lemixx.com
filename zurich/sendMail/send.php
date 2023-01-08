<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'limexgroup.finance@gmail.com';
    $mail->Password = 'kkudpbfhpipcoaua';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));


    $mail->setFrom('limexgroup.finance@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    $mail->send();

}
?>