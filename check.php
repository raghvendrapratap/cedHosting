<?php
if (isset($_POST['varifyEmail'])) {
    echo $_POST['emailOTP'];
}
if (isset($_POST['varifyMob'])) {
    echo $_POST['emailOTP1'];
}
?>

<html>

<head>

</head>

<body>


    <form action="" method="post">
        <input type="text" name="emailOTP" class="enteremailOTP">

        <input type="submit" value="Submit OTP" name="varifyEmail" class="enteremailOTP">

    </form>
    <form action="" method="post">
        <input type="text" name="emailOTP1" class="enteremailOTP">

        <input type="submit" value="Submit OTP" name="varifyMob" class="enteremailOTP">

    </form>
</body>

</html>