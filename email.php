use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/cedcoss/vendor/autoload.php';
?>
<?php
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['phone'];
$password=$_POST['password'];
$cnfm_password=$_POST['cnfm_password'];
$question=$_POST['ques'];
$answere=$_POST['ans'];
if($password==$cnfm_password){
$user=new User();
$sql=$u