<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient, $subject, $message)
{
    $mail = new PHPMailer();

    try {
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // Set to 2 for debugging
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'klokeshj5@gmail.com';
        $mail->Password = 'nquz wzni txie rpwz';

        $mail->isHTML(true);
        $mail->addAddress($recipient, 'Esteemed Customer');
        $mail->setFrom('support@spacekraft.in', 'Spacekraft (Password Reset)');
        $mail->Subject = $subject;
        $content = $message;

        $mail->msgHTML($content);

        if (!$mail->send()) {
            // Log the error or handle it as needed
            return false;
        } else {
            return true;
        }
    } catch (Exception $e) {
        // Log the exception or handle it as needed
        return false;
    }
}
?>
