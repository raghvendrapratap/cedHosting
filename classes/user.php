<?php
include_once("dbconn.php");

class user
{
    function login($email, $pass, $conn)
    {
        $password = md5($pass);
        $sql = "SELECT * from `tbl_user` WHERE `email`='$email' AND `password`='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row['active'] == 1) {
                $_SESSION['userInfo'] = array('email' => $row['email'], 'id' => $row['id'], 'name' => $row['name'], 'is_admin' => $row['is_admin']);

                setCookie("email", $email, time() + 86400);

                if ($row['is_admin'] == 1) {

                    header('Location: admin/index.php');
                } else if ($row['is_admin'] == 0) {
                    header('Location: index.php');
                }
            } elseif ($row['active'] == 0) {
                if ($row['email_approved'] == 0 && $row['phone_approved'] == 0) {
                    $_SESSION['Varifyuser'] = array('email' => $row['email'], 'mob' => $row['mobile']);
                    echo "<script type='text/javascript'>alert('Please varify your mail or phone to login!!'); window.location='varification.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Invalid username or password. Please try again !!'); window.location='login.php';</script>";
                }
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
            $_SESSION['Varifyuser'] = array('email' => $email, 'mob' => $mob);
            echo "<script type='text/javascript'>alert('Successfully Registered!! Now varify yourself for login '); window.location='varification.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error: " + $conn->error + ", Please try again!!'); window.location='acount.php';</script>";
        }
    }

    function varifyMobEmail($mob, $email, $conn)
    {
        $sql = "SELECT * from `tbl_user` WHERE `email`='$email' OR `mobile`='$mob'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['mobile'] === $mob) {
                return "MobExists";
            } else if ($row['email'] === $email) {
                return "EmailExists";
            }
        }
    }

    function updateMobApproval($mob,  $conn)
    {
        $sql = "UPDATE tbl_user SET `phone_approved`=1, `active`=1  WHERE `mobile`='$mob'";
        if ($conn->query($sql) === true) {
            echo "<script type='text/javascript'>alert('Successfully Varified!! Now you can login'); window.location='login.php';</script>";
        } else {
            return "Updation Failed";
        }
    }

    function updateEmailApproval($email,  $conn)
    {
        $sql = "UPDATE tbl_user SET `email_approved`=1, `active`=1  WHERE `email`='$email'";
        if ($conn->query($sql) === true) {
            echo "<script type='text/javascript'>alert('Successfully Varified!! Now you can login'); window.location='login.php';</script>";
        } else {
            return "Updation Failed";
        }
    }
}