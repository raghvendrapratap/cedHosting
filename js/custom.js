$(function() {

    $("#nameMsg").hide();
    $("#mobMsg").hide();
    $("#emailMsg").hide();
    $("#passMsg").hide();
    $("#repassMsg").hide();
    $("#quesMsg").hide();
    $("#ansMsg").hide();

    $(".onlynumber").bind("keypress", function(e) {
        var keyCode = e.which ? e.which : e.keyCode

        if (!(keyCode >= 48 && keyCode <= 57)) {
            $(".error").css("display", "inline");
            return false;
        } else {
            $(".error").css("display", "none");
        }
    })

    $("#mob").bind("keyup", function(e) {

        mobile_no = $("#mob").val();

        var fchar = $("#mob").val().substr(0, 1);
        var schar = $("#mob").val().substr(1, 1);
        console.log(schar);

        if (fchar == 0) {
            $('#mob').attr('maxlength', '11');
            $('#mob').attr('minlength', '11');
            if (schar == 0) {
                $("#mob").val(0);
                if (fchar == "") {
                    $("#mob").val("");
                }

            }
        } else {
            $('#mob').attr('maxlength', '10');
            $('#mob').attr('minlength', '10');
        }
    });
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
    // (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/))
    if (name == "") {
        $("#nameMsg").show();
        return false;
    } else if (!name.match(/^[a-zA-Z_]+( [a-zA-Z_]+)*$/)) {
        $("#nameMsg").html("*Name should be alphabetic and one space between words");
        $("#nameMsg").show();
        return false;
    }
    if (mob == "") {
        $("#mobMsg").show();
        return false;
    }
    if (email == "") {
        $("#emailMsg").show();
        return false;
    } else if (!email.match(/^[a-z0-9.]+[a-zA-Z0-9]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/)) {
        $("#emailMsg").html("*Enter valid mail id ,mail id should be in lowercase, i.e- ex.ex@ex.com");
        $("#emailMsg").show();
        return false;
    }
    if (pass == "") {
        $("#passMsg").show();
        return false;
    }
    if (repass == "") {
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
    }
    if (pass != repass) {
        $("#repassMsg").html("*Password doesn't match");
        $("#repassMsg").show();
        return false;
    }
    return true;
}