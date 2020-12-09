<!---header--->
<?php include("header.php"); ?>

<!---login--->
<div class="content">
    <!-- registration -->
    <div class="main-1">
        <div class="container">
            <div class="register">
                <div class="register-but">
                    <form action="mediater.php" name="signupform" onsubmit="return validateForm()" method="post">
                        <div class="register-top-grid">
                            <h3 class="text-center pbtm-10 font-large">Register Yourself</h3>
                            <h3>personal information</h3>
                            <div>
                                <span>Name<label>*</label></span>
                                <input type="text" name="name">
                                <input type="hidden" id="varify">
                                <span id="nameMsg" class="red normaltext">*Enter Name</span>
                            </div>
                            <div>
                                <span>Mobile No.<label>*</label></span>
                                <input type="text" name="mob" id="mob" class="onlynumber nocopypaste varifymobEmail"
                                    minlength="10" maxlength="10" autocomplete="off">
                                <span id="mobMsg" class="red normaltext">*Enter Mobile No</span>
                            </div>

                            <!-- <a class="news-letter" href="#">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up
                                for Newsletter</label>
                            </a> -->
                        </div>
                        <div class="clearfix"> </div>
                        <div class="register-bottom-grid">
                            <h3>login information</h3>
                            <div>
                                <span>Email Address<label>*</label></span>
                                <input type="text" name="email" class="varifymobEmail">
                                <span id="emailMsg" class="red normaltext">*Enter Email</span>
                            </div>
                        </div>

                        <div class="clearfix"> </div>

                        <div class="register-top-grid">
                            <div>
                                <span>Password<label>*</label></span>
                                <input type="password" name="pass" minlength="8" maxlength="16"
                                    title="Password length should be between 8 to 16" class="nospace nocopypaste">
                                <span id="passMsg" class="red normaltext">*Enter Password</span>
                            </div>
                            <div>
                                <span>Confirm Password<label>*</label></span>
                                <input type="password" name="repass" minlength="8" maxlength="16"
                                    title="Password length should be between 8 to 16" class="nospace nocopypaste">
                                <span id="repassMsg" class="red normaltext">*Re-Type Password</span>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="register-bottom-grid">
                            <h3>Security information</h3>
                            <div>
                                <span>Question<label>*</label></span>
                                <select name="ques" id="ques">
                                    <option selected disabled value="">-- Select Security Question --</option>
                                    <option>What was your childhood nickname?</option>
                                    <option>What is the name of your favourite childhood friend?</option>
                                    <option>What was your favourite place to visit as a child?</option>
                                    <option>What was your dream job as a child?</option>
                                    <option>What is your favourite teacher's nickname?</option>
                                </select>
                                <span id="quesMsg" class="red normaltext">*Please select one security ques</span>
                            </div>
                            <div>
                                <span>Answer<label>*</label></span>
                                <input type="text" name="ans">
                                <span id="ansMsg" class="red normaltext">*Write Your answer</span>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                        <input type="submit" value="submit" name="signup">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- registration -->
</div>
<!-- login -->
<!---footer--->
<?php include("footer.php"); ?>