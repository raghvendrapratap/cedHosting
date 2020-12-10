<!---header--->
<?php include("header.php"); ?>

<!---login--->
<div class="content">
    <!-- registration -->
    <div class="main-1">
        <div class="container">

            <?php if (isset($_SESSION['Varifyuser'])) {
            ?>

            <div class="register">
                <div class="register-but">
                    <form action="mediater.php" method="post">
                        <div class="register-top-grid">
                            <h3 class="text-center pbtm-10 font-large">Varify Yourself</h3>
                            <h3>Email Varification</h3>
                            <div>
                                <span>Email Address<label>*</label></span>
                                <p><label><?php echo $_SESSION['Varifyuser']['email'] ?></label></p>
                                <input type="hidden" value="<?php echo $_SESSION['Varifyuser']['email'] ?>"
                                    id="emailvalue" name="emailvalue">
                                <input type="text" name="emailOTP" placeholder="Enter OTP" class="enteremailOTP">
                                <span class="enteremailOTP">
                                    <p id="resendmsgEmail">Varification code has been sent on</p>
                                    <?php echo $_SESSION['Varifyuser']['email'] ?>
                                </span>
                            </div>

                        </div>
                        <div class="clearfix"> </div>
                        <div class="register-top-grid">
                            <input type="button" value="Varify Email" class="varifybtn sendemailOTP" id="sendOTPtomail">
                            <input type="submit" value="Submit OTP" name="varifyEmail" class="enteremailOTP">
                            <input type="button" value="Resend OTP" class="varifybtn enteremailOTP"
                                id="resendOTPtomail">
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
                <div class="register-but">
                    <form action="mediater.php" name="signupform" method="post">
                        <div class="register-bottom-grid">
                            <h3>Mobile Varification.</h3>
                            <div>
                                <span>Mobile No.<label>*</label></span>
                                <p><label><?php echo $_SESSION['Varifyuser']['mob'] ?></label></p>
                                <input type="hidden" value="<?php echo $_SESSION['Varifyuser']['mob'] ?>" id="mobvalue"
                                    name="mobvalue">
                                <input type="text" name="mobOTP" class="entermobOTP" placeholder="Enter OTP">
                                <span class="entermobOTP">
                                    <p id="resendmsg">Varification code has been sent on</p>
                                    <?php echo $_SESSION['Varifyuser']['mob'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                        <div class="register-top-grid">
                            <input type="button" value="Varify Mob" class=" varifybtn sendmobOTP">
                            <input type="submit" value="Submit OTP" name="varifyMob" class="entermobOTP">
                            <input type="button" value="Resend OTP" class="varifybtn entermobOTP" id="resendmobOTP">
                        </div>

                    </form>
                </div>
            </div>
            <?php } else { ?>
            <h3 class="text-center pbtm-10 font-large">Please login or Register for varification</h3>
            <h3 class="text-center pbtm-10 "><a href="login.php">Click here to login</a> OR <a href="account.php">Click
                    here to Register</a></h3>
            <?php } ?>
        </div>
    </div>
    <!-- registration -->
</div>
<!-- login -->
<!---footer--->
<?php include("footer.php"); ?>