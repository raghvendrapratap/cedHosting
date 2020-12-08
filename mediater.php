<?php
include_once("classes/dbconn.php");
include_once("classes/user.php");
$dbconn = new dbconn();
$user = new user();

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