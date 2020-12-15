<?php
session_start();
include_once("classes/dbconn.php");
include_once("classes/user.php");
$dbconn = new dbconn();
$user = new user();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/cedcoss/vendor/autoload.php';

if (isset($_POST['signup'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $mob = isset($_POST['mob']) ? $_POST['mob'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    $repass = isset($_POST['repass']) ? $_POST['repass'] : '';
    $ques = isset($_POST['ques']) ? $_POST['ques'] : '';
    $ans = isset($_POST['ans']) ? $_POST['ans'] : '';

    $signup = $user->signup($name, $mob, $email, $pass, $ques, $ans, $dbconn->conn);
}

if (isset($_POST['login'])) {

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

    $login = $user->login($email, $pass, $dbconn->conn);
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'varifyMobEmail') {
        $mob = isset($_POST['mob']) ? $_POST['mob'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $varify = $user->varifyMobEmail($mob, $email, $dbconn->conn);
        echo $varify;
    }
}
if (isset($_POST['action'])) {

    if ($_POST['action'] == 'sendOTPMob') {
        $mob = isset($_POST['mob']) ? $_POST['mob'] : '';
        $otp = rand(1111, 9999);
        $_SESSION['mobOTP'] = array('otp' => $otp, 'mob' => $mob);
        $fields = array(
            "sender_id" => "FSTSMS",
            "message" => "This is your OTP : " . $otp,
            "language" => "english",
            "route" => "p",
            "numbers" => $mob,
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                "authorization: hmYZpSyEB3azn5UFHKI8loufwtxL2jDVcdN1ekrP0AsJXQgW9MseKOVGMULTpj04EDAiFh6XtbrPog25",
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
        echo "Send";
    }
}

if (isset($_POST['varifyMob'])) {

    $mob = isset($_POST['mobvalue']) ? $_POST['mobvalue'] : '';
    $userotp = isset($_POST['mobOTP']) ? $_POST['mobOTP'] : '';
    $otp = $_SESSION['mobOTP']['otp'];
    if ($userotp == $otp) {
        unset($_SESSION['mobOTP']);
        unset($_SESSION['Varifyuser']);
        $updateMobApproval = $user->updateMobApproval($mob, $dbconn->conn);
    } else {
        echo "<script type='text/javascript'>alert('Invalid OTP! Please try again'); window.location='varification.php';</script>";
    }
}

//Email varification
if (isset($_POST['action'])) {

    if ($_POST['action'] == 'sendOTPEmail') {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $otp = rand(1111, 9999);
        $_SESSION['emailOTP'] = array('otp' => $otp, 'email' => $email);

        $mail = new PHPMailer();
        try {
            $mail->isSMTP(true);
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'rpratap.raghu352@gmail.com';
            $mail->Password = 'Misti@1105';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setfrom('rpratap.raghu352@gmail.com', 'CedHosting');
            $mail->addAddress($email);
            // $mail->addAddress($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'Account Verification';
            $mail->Body = 'Hi User,Here is your otp for account verification' . $otp;
            $mail->AltBody = 'Body in plain text for non-HTML mail clients';
            $mail->send();
            echo "Send";
            // header('location: verification.php?email=' . $email);
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
        echo "Send";
    }
}

if (isset($_POST['varifyEmail'])) {

    $email = isset($_POST['emailvalue']) ? $_POST['emailvalue'] : '';
    $emailotp = isset($_POST['emailOTP']) ? $_POST['emailOTP'] : '';
    $otp = $_SESSION['emailOTP']['otp'];
    if ($emailotp == $otp) {
        unset($_SESSION['emailOTP']);
        unset($_SESSION['Varifyuser']);
        $updateemailApproval = $user->updateEmailApproval($email, $dbconn->conn);
    } else {
        echo "<script type='text/javascript'>alert('Invalid OTP! Please try again'); window.location='varification.php';</script>";
    }
}