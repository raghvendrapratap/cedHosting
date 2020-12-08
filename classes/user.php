<?php
include_once("dbconn.php");

class user
{
    function login($email, $pass, $conn)
    {
        $password = md5($pass);
        $sql = "SELECT * from `tbl_user` WHERE `email`='$email' AND `password`='$password' AND `active`=1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // $_SESSION['userInfo'] = array('username' => $row['user_name'], 'customerid' => $row['user_id'], 'name' => $row['name'], 'is_admin' => $row['is_admin'], 'mob' => $row['mobile']);
            // setCookie("username", $username, time() + 86400);
            if ($row['is_admin'] == 1) {
                if (isset($_SESSION['cabInfo'])) {
                    echo "<script type='text/javascript'>alert('You are Admin. You cant book Cab.'); window.location='admindashboard.php';</script>";
                } else {
                    header('Location: admindashboard.php');
                }
            } else if ($row['is_admin'] == 0) {

                header('Location: index.php');
            }
        } else {
            echo "<script type='text/javascript'>alert('Invalid username or password. Please try again !!'); window.location='login.php';</script>";
        }
    }

    function signup($name, $mob, $email, $pass, $ques, $ans, $conn)
    {
        $password = md5($pass);
        $sql = "INSERT INTO `tbl_user` (`email`, `name`,`mobile`, `is_admin`,`password`, `security_question`,`security_answer`)
         VALUES('$email','$name', '$mob' ,0,'$password','$ques','$ans')";
        if ($conn->query($sql) === true) {
            setCookie("email", $email, time() + 86400);
            header('Location:index.php');
        } else {
            echo "<script type='text/javascript'>alert('Error: " + $conn->error + ", Please try again!!'); window.location='acount.php';</script>";
        }
    }
}