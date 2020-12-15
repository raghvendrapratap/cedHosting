$(function() {

    $("#nameMsg").hide();
    $("#mobMsg").hide();
    $("#emailMsg").hide();
    $("#passMsg").hide();
    $("#repassMsg").hide();
    $("#quesMsg").hide();
    $("#ansMsg").hide();
    $(".enteremailOTP").hide();
    $(".entermobOTP").hide();

    $(".onlynumber").bind("keypress", function(e) {
        var keyCode = e.which ? e.which : e.keyCode

        if (!(keyCode >= 48 && keyCode <= 57)) {
            $(".error").css("display", "inline");
            return false;
        } else {
            $(".error").css("display", "none");
        }
    })
    $(".nospace").bind("keypress", function(e) {
        var keyCode = e.which ? e.which : e.keyCode

        if ((keyCode == 32)) {
            $(".error").css("display", "inline");
            return false;
        } else {
            $(".error").css("display", "none");
        }
    })

    $("#mob").keyup(function() {
        $("#mobMsg").hide();
        var first = $("#mob").val().substr(0, 1);

        if (first == 0) {
            $('#mob').attr('maxlength', '11');
            $('#mob').attr('minlength', '11');

        } else {
            $('#mob').attr('maxlength', '10');
            $('#mob').attr('minlength', '10');
        }
    });

    $('.nocopypaste').bind("cut copy paste drag drop", function(e) {
        e.preventDefault();
    });

    $(".varifymobEmail").bind("keyup onchange", function(e) {
        $("#emailMsg").hide();
        $("#mobMsg").hide();
        var mob = document.forms["signupform"]["mob"].value;
        var email = document.forms["signupform"]["email"].value;
        $("#varify").val("");
        $.ajax({
            url: 'mediater.php',
            type: 'POST',
            data: {
                mob: mob,
                email: email,
                action: 'varifyMobEmail',
            },
            success: function(result) {
                console.log(result);
                if (result == "MobExists") {
                    $("#mobMsg").html("*Mobile no. already exists");
                    $("#mobMsg").show();
                    $("#varify").val("invalidMob");

                }
                if (result == "EmailExists") {
                    $("#emailMsg").html("*Email already exists");
                    $("#emailMsg").show();
                    $("#varify").val("invalidEmail");
                }
            },
            error: function() {
                $("#emailMsg").hide();
                $("#mobMsg").hide();
                $("#varify").val("");
            }
        })
    })

})

function validateForm() {
    $("#nameMsg").hide();
    $("#mobMsg").hide();
    $("#emailMsg").hide();
    $("#passMsg").hide();
    $("#repassMsg").hide();
    $("#quesMsg").hide();
    $("#ansMsg").hide();
    var name = document.forms["signupform"]["name"].value;
    var mob = document.forms["signupform"]["mob"].value;
    var email = document.forms["signupform"]["email"].value;
    var pass = document.forms["signupform"]["pass"].value;
    var repass = document.forms["signupform"]["repass"].value;
    var ques = document.forms["signupform"]["ques"].value;
    var ans = document.forms["signupform"]["ans"].value;

    var firstmob = mob.substr(0, 1);
    var secondmob = mob.substr(1, 1);

    if (name == "") {
        $("#nameMsg").show();
        return false;
    } else if (!name.match(/^[a-zA-Z]+( [a-zA-Z]+)*$/)) {
        $("#nameMsg").html("*Name should be alphabetic and one space between words");
        $("#nameMsg").show();
        return false;
    }

    if (mob == "" || mob == 0) {
        $("#mobMsg").html("*Enter valid mob no.!");
        $("#mobMsg").show();
        return false;
    } else if (firstmob == 0 && secondmob == 0) {
        $("#mobMsg").html("*In starting you cant have two zero");
        $("#mobMsg").show();
        return false;
    }

    if (firstmob == 0) {
        var x = 0;
        for (var i = 2; i <= 10; i++) {

            var firstchar = mob.substr(1, 1);
            var secondchar = mob.substr(i, 1);
            if (firstchar != secondchar) {
                var x = 1;
            }
        }
        if (x == 0) {
            $("#mobMsg").html("*All no can't be same");
            $("#mobMsg").show();
            return false;
        }
    } else if (firstmob != 0) {
        var x = 0;
        for (var i = 1; i <= 9; i++) {

            var firstchar = mob.substr(0, 1);
            var secondchar = mob.substr(i, 1);
            if (firstchar != secondchar) {
                var x = 1;
            }
        }
        if (x == 0) {
            $("#mobMsg").html("*All no can't be same");
            $("#mobMsg").show();
            return false;
        }
    }

    if (email == "") {
        $("#emailMsg").html("*Enter mail");
        $("#emailMsg").show();
        return false;
    } else if (!email.match(/^(?!.*\.{2})[a-z0-9]+[a-z0-9.]+[a-z0-9]+@[a-z]{1,}[.]+[a-z]*$/)) {
        $("#emailMsg").html("*Enter valid mail id ,mail id should be in lowercase, i.e- ex.ex@ex.com");
        $("#emailMsg").show();
        return false;
    }
    $x = $("#varify").val();
    if ($x == "invalidMob") {
        $("#mobMsg").html("*Mobile no. already exists");
        $("#mobMsg").show();
        return false;
    } else if ($x == "invalidEmail") {
        $("#emailMsg").html("*Email already exists");
        $("#emailMsg").show();
        return false;
    }

    if (pass == "") {
        $("#passMsg").show();
        return false;
    } else if (!pass.match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,16}$/)) {
        $("#passMsg").html("*Password must contain uppercase, lowercase, special character and numeric value AND length is 8 to 16.");
        $("#passMsg").show();
        return false;
    }
    if (repass == "") {
        $("#repassMsg").show();
        return false;
    }

    if (pass != repass) {
        $("#repassMsg").html("*Password doesn't match");
        $("#repassMsg").show();
        return false;
    }
    if (ques == "") {
        $("#quesMsg").show();
        return false;
    }
    if (ans == "") {
        $("#ansMsg").show();
        return false;
    } else if (!ans.match(/^[a-zA-Z0-9_]+( [a-zA-Z0-9_]+)*$/)) {
        $("#ansMsg").html("*Ans can be alpha-numeric / only alphabetic,.");
        $("#ansMsg").show();
        return false;
    }
    var ans1 = ans.replace(/ /g, '');
    var ans2 = Number(ans1);
    if (Number.isInteger(ans2)) {
        $("#ansMsg").html("*Ans can be alpha-numeric / only alphabetic,.");
        $("#ansMsg").show();
        return false;
    }
    return true;
}



$(".sendmobOTP").click(function() {
    var mob = $("#mobvalue").val();
    // var mob = $("#emailvalue").val();
    // $(".sendmobOTP").hide();
    // $(".entermobOTP").show();
    $.ajax({
        url: 'mediater.php',
        type: 'POST',
        data: {
            mob: mob,
            action: 'sendOTPMob',
        },
        success: function(result) {
            console.log(result);
            $(".sendmobOTP").hide();
            $(".entermobOTP").show();
        },
        error: function() {

        }
    })
})

$("#resendmobOTP").click(function() {
    var mob = $("#mobvalue").val();
    // var mob = $("#emailvalue").val();
    // $(".sendmobOTP").hide();
    // $(".entermobOTP").show();
    $.ajax({
        url: 'mediater.php',
        type: 'POST',
        data: {
            mob: mob,
            action: 'sendOTPMob',
        },
        success: function(result) {
            console.log(result);
            $("#resendmsg").html("Varification code has been re-sent on")
            $(".sendmobOTP").hide();
            $(".entermobOTP").show();
        },
        error: function() {

        }
    })
})

//email otp

$("#sendOTPtomail").click(function() {
    var email = $("#emailvalue").val();

    $.ajax({
        url: 'mediater.php',
        type: 'POST',
        data: {
            email: email,
            action: 'sendOTPEmail',
        },
        success: function(result) {
            console.log(result);
            $(".sendemailOTP").hide();
            $(".enteremailOTP").show();
        },
        error: function() {

        }
    })
})

$("#resendOTPtomail").click(function() {
    var email = $("#emailvalue").val();

    $.ajax({
        url: 'mediater.php',
        type: 'POST',
        data: {
            email: email,
            action: 'sendOTPEmail',
        },
        success: function(result) {
            console.log(result);
            $("#resendmsgEmail").html("Varification code has been re-sent on ")
            $(".sendemailOTP").hide();
            $(".enteremailOTP").show();
        },
        error: function() {

        }
    })
})