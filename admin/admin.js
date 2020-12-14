$(document).ready(function() {
    $('.ctable').DataTable();
});

$check1 = "invalid";
$check2 = "invalid";
$check3 = "invalid";
$check4 = "invalid";
$check5 = "invalid";
$check6 = "invalid";
$check7 = "invalid";
$check8 = "invalid";
$check9 = "invalid";
$check10 = "invalid";

$(".edit").click(function() {
    $up1 = "valid";
    $up2 = "valid";
    $up3 = "valid";
    $up4 = "valid";
    $up5 = "valid";
    $up6 = "valid";
    $up7 = "valid";
    $up8 = "valid";
    $up9 = "valid";
    $up10 = "valid";
    $(".prodCategory").hide();
    $(".prodname").hide();
    $(".lablemprice").hide();
    $(".lableaprice").hide();
    $(".lablemail").hide();
    $(".lablelang").hide();
    $(".labledomain").hide();
    $(".lableband").hide();
    $(".lablesku").hide();
    $(".lableweb").hide();

})
$(".cid").focusout(function() {
    $check1 = "invalid";
    $up1 = "invalid";
    $categoryid = $(this).val();
    if ($categoryid == "" || $categoryid == null) {
        $(".prodCategory").html("*Select Category");
        $(".prodCategory").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $(".prodCategory").hide();
        $(this).css('border', 'solid 3px green');
        $check1 = "valid";
        $up1 = "valid";
    }
})
$(".pname").focusout(function() {
    $check2 = "invalid";
    $up2 = "invalid";
    $pname = $(this).val();
    var ans1 = $pname.replace(/ /g, '');
    var ans2 = Number(ans1);
    if ($pname == "" || $pname == null) {
        $(".prodname").html("*Enter Product Name");
        $(".prodname").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$pname.match(/^([a-zA-Z]+\s+[a-zA-Z])*[(a-zA-Z)]*(-[0-9]+(?!-)+)*$/)) {
        $(".prodname").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $(".prodname").show();
        $(this).css('border', 'solid 3px red');
    } else if (Number.isInteger(ans2)) {
        $(".prodname").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $(".prodname").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $(".prodname").hide();
        $(this).css('border', 'solid 3px green');
        $check2 = "valid";
        $up2 = "valid";
    }
})

// $("#url").focusout(function() {
//     $url = $("#url").val();
//     if ($url == "" || $url == null) {
//         $("#urlid").html("*Enter Product Name");
//         $("#urlid").show();
//         $(this).css('border', 'solid 3px red');
//     } else {
//         $("#urlid").hide();
//         $(this).css('border', 'solid 3px green');
//     }
// })

$(".mpriceid").focusout(function() {
    $check3 = "invalid";
    $up3 = "invalid";
    $mprice = $(this).val();
    $first = $mprice.substr(0, 1);
    $second = $mprice.substr(1, 1);
    if ($mprice == "" || $mprice == 0) {
        $(".lablemprice").html("*Enter Monthly Price");
        $(".lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$mprice.match(/^[0-9]\d*(\.\d{1,2})?$/)) {
        $(".lablemprice").html("*Price can be only integer and only one dot(.) allowed");
        $(".lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $(".lablemprice").html("*In starting you cant have two zero");
        $(".lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $(".lablemprice").hide();
        $(this).css('border', 'solid 3px green');
        $check3 = "valid";
        $up3 = "valid";
    }
})


$(".apriceid").focusout(function() {
    $check4 = "invalid";
    $up4 = "invalid";
    $aprice = $(this).val();

    $first = $aprice.substr(0, 1);
    $second = $aprice.substr(1, 1);
    if ($aprice == "" || $aprice == 0) {
        $(".lableaprice").html("*Enter annual Price");
        $(".lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$aprice.match(/^[0-9]\d*(\.\d{1,2})?$/)) {
        $(".lableaprice").html("*Price can be only integer and only one dot(.) allowed");
        $(".lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $(".lableaprice").html("*In starting you cant have two zero");
        $(".lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $(".lableaprice").hide();
        $(this).css('border', 'solid 3px green');
        $check4 = "valid";
        $up4 = "valid";
    }
})


$(".skuid").focusout(function() {
    $check5 = "invalid";
    $up5 = "invalid";
    $sku = $(this).val();
    if ($sku == "" || $sku == null) {
        $(".lablesku").html("*Enter SKU");
        $(".lablesku").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$sku.match(/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9#-]+$/)) {
        $(".lablesku").html("*SKU can be combination of Alphanumeric/specail character Not only Special character");
        $(".lablesku").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $(".lablesku").hide();
        $(this).css('border', 'solid 3px green');
        $check5 = "valid";
        $up5 = "valid";
    }
})


$(".webid").focusout(function() {
    $check6 = "invalid";
    $up6 = "invalid";
    $web = $(this).val();
    $first = $web.substr(0, 1);
    $second = $web.substr(1, 1);
    if ($web == "" || $web == 0) {
        $(".lableweb").html("*Enter web space.");
        $(".lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$web.match(/^[0-9]\d*(\.\d{1})?$/)) {
        $(".lableweb").html("*Web Space can be only integer and only one dot(.) allowed");
        $(".lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $(".lableweb").html("*In starting you cant have two zero");
        $(".lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $(".lableweb").hide();
        $(this).css('border', 'solid 3px green');
        $check6 = "valid";
        $up6 = "valid";
    }
})

$(".bandid").focusout(function() {
    $check7 = "invalid";
    $up7 = "invalid";
    $band = $(this).val();
    $first = $band.substr(0, 1);
    $second = $band.substr(1, 1);
    if ($band == "" || $band == 0) {
        $(".lableband").html("*Enter  bandwidth.");
        $(".lableband").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$band.match(/^[0-9]\d*(\.\d{1})?$/)) {
        $(".lableband").html("*Bandwidth can be only integer and only one dot(.) allowed");
        $(".lableband").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $(".lableband").html("*In starting you cant have two zero");
        $(".lableband").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $(".lableband").hide();
        $(this).css('border', 'solid 3px green');
        $check7 = "valid";
        $up7 = "valid";
    }
})

$(".domainid").focusout(function() {
    $check8 = "invalid";
    $up8 = "invalid";
    $domain = $(this).val();
    $first = $domain.substr(0, 1);
    if ($first.match(/[0-9]/)) {
        $pattern = /^[0-9]\d*?$/;
    } else if ($first.match(/[a-zA-Z]/)) {
        $pattern = /^[a-zA-Z]*$/;
    }
    if ($domain == "" || $domain == null) {
        $(".labledomain").html("*Enter  No of domain.");
        $(".labledomain").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$domain.match($pattern)) {
        $(".labledomain").html("*Domain can be only Numeric or alphabetic");
        $(".labledomain").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $(".labledomain").hide();
        $(this).css('border', 'solid 3px green');
        $check8 = "valid";
        $up8 = "valid";
    }
})

$(".langid").focusout(function() {
    $check9 = "invalid";
    $up9 = "invalid";
    $lang = $(this).val();
    var ans1 = $lang.replace(/ /g, '');
    var ans2 = Number(ans1);
    if ($lang == "" || $lang == null) {
        $(".lablelang").html("*Enter Language / Technology ");
        $(".lablelang").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$lang.match(/^[a-zA-Z0-9\\s\\,]+$/)) {
        $(".lablelang").html("*Language can be only Alphanumeric or alphabetic And Separate by , ");
        $(".lablelang").show();
        $(this).css('border', 'solid 3px red');
    } else if (Number.isInteger(ans2)) {
        $(".lablelang").html("*Language can be Alphanumeric or alphabetic");
        $(".lablelang").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $(".lablelang").hide();
        $(this).css('border', 'solid 3px green');
        $check9 = "valid";
        $up9 = "valid";
    }

})

$(".mailid").focusout(function() {
    $check10 = "invalid";
    $up10 = "invalid";
    $mail = $(this).val();
    $first = $mail.substr(0, 1);
    if ($first.match(/[0-9]/)) {
        $pattern = /^[0-9]\d*?$/;
    } else if ($first.match(/[a-zA-Z]/)) {
        $pattern = /^[a-zA-Z]*$/;
    }
    if ($mail == "" || $mail == null) {
        $(".lablemail").html("*Enter  No of mail.");
        $(".lablemail").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$mail.match($pattern)) {
        $(".lablemail").html("*Mail can be only Numeric or alphabetic");
        $(".lablemail").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $(".lablemail").hide();
        $(this).css('border', 'solid 3px green');
        $check10 = "valid";
        $up10 = "valid";
    }
})

function validateUpdateForm() {

    if ($check1 == "invalid") {
        return false;
    }
    if ($check2 == "invalid") {
        return false;
    }
    if ($check3 == "invalid") {
        return false;
    }
    if ($check4 == "invalid") {
        return false;
    }
    if ($check5 == "invalid") {
        return false;
    }
    if ($check6 == "invalid") {
        return false;
    }
    if ($check7 == "invalid") {
        return false;
    }
    if ($check8 == "invalid") {
        return false;
    }

    if ($check9 == "invalid") {
        return false;
    }
    if ($check10 == "invalid") {
        return false;
    }
}

function validateUpdateProdForm() {

    if ($up1 == "invalid") {
        return false;
    }
    if ($up2 == "invalid") {
        return false;
    }
    if ($up3 == "invalid") {
        return false;
    }
    if ($up4 == "invalid") {
        return false;
    }
    if ($up5 == "invalid") {
        return false;
    }
    if ($up6 == "invalid") {
        return false;
    }
    if ($up7 == "invalid") {
        return false;
    }
    if ($up8 == "invalid") {
        return false;
    }

    if ($up9 == "invalid") {
        return false;
    }
    if ($up10 == "invalid") {
        return false;
    }
}

$("#catid").bind("keyup onchange", function(e) {
    $("#catmsg").hide();
    var cat = $("#catid").val();

    $.ajax({
        url: 'adminMediater.php',
        type: 'POST',
        data: {
            cat: cat,
            action: 'checkcat',
        },
        success: function(result) {
            console.log(result);
            if (result == "invalid") {
                $("#catmsg").html("Category Name already exists");
                $("#catmsg").show();
            }
        },
        error: function() {
            $("#catmsg").hide();
        }
    })
})

// function validateCatForm() {
//     $("#catmsg").hide();
//     var cat = document.forms["catform"]["category"].value;

//     if (cat == "") {
//         $("#nameMsg").html("*Name should be alphabetic and one space between words");
//         $("#catmsg").show();
//         return false;
//     } else if (!name.match(/^[a-zA-Z]+( [a-zA-Z]+)*$/)) {
//         $("#nameMsg").html("*Name should be alphabetic and one space between words");
//         $("#nameMsg").show();
//         return false;
//     }
//     return true;
// }