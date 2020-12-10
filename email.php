<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/cedcoss/vendor/autoload.php';
$times = 101;
for ($i = 0; $i <= 100; $i++) {
    $email = "";
    $mail = new PHPMailer();
    try {
        $mail->isSMTP(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rpratap.raghu352@gmail.com';
        $mail->Password = 'aAqQ1!2@';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setfrom('rpratap.raghu352@gmail.com', '');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = '';
        $mail->Body = '';
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        echo $i;
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    echo $i;
}