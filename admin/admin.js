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

$("#cid").focusout(function() {
    $check1 = "invalid";
    $categoryid = $("#cid").val();
    if ($categoryid == "" || $categoryid == null) {
        $("#prodCategory").html("*Select Category");
        $("#prodCategory").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#prodCategory").hide();
        $(this).css('border', 'solid 3px green');
        $check1 = "valid";
    }
})

$("#pname").focusout(function() {
    $check2 = "invalid";
    $pname = $("#pname").val();
    var ans1 = $pname.replace(/ /g, '');
    var ans2 = Number(ans1);
    if ($pname == "" || $pname == null) {
        $("#prodname").html("*Enter Product Name");
        $("#prodname").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$pname.match(/^[a-zA-Z0-9]+( [a-zA-Z0-9]+)*$/)) {
        $("#prodname").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $("#prodname").show();
        $(this).css('border', 'solid 3px red');
    } else if (Number.isInteger(ans2)) {
        $("#prodname").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $("#prodname").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#prodname").hide();
        $(this).css('border', 'solid 3px green');
        $check2 = "valid";
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

$("#mpriceid").focusout(function() {
    $check3 = "invalid";
    $mprice = $("#mpriceid").val();
    $first = $mprice.substr(0, 1);
    $second = $mprice.substr(1, 1);
    if ($mprice == "" || $mprice == 0) {
        $("#lablemprice").html("*Enter Monthly Price");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$mprice.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lablemprice").html("*Price can be only integer and only one dot(.) allowed");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lablemprice").html("*In starting you cant have two zero");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lablemprice").hide();
        $(this).css('border', 'solid 3px green');
        $check3 = "valid";
    }
})


$("#apriceid").focusout(function() {
    $check4 = "invalid";
    $aprice = $("#apriceid").val();
    $first = $aprice.substr(0, 1);
    $second = $aprice.substr(1, 1);
    if ($aprice == "" || $aprice == 0) {
        $("#lableaprice").html("*Enter annual Price");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$aprice.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableaprice").html("*Price can be only integer and only one dot(.) allowed");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableaprice").html("*In starting you cant have two zero");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableaprice").hide();
        $(this).css('border', 'solid 3px green');
        $check4 = "valid";
    }
})


$("#skuid").focusout(function() {
    $check5 = "invalid";
    $sku = $("#skuid").val();
    if ($sku == "" || $sku == null) {
        $("#lablesku").html("*Enter SKU");
        $("#lablesku").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$sku.match(/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[#-]).{1,}$/)) {
        $("#lablesku").html("*SKU can be combination of Alphanumeric/specail character Not only Special character");
        $("#lablesku").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lablesku").hide();
        $(this).css('border', 'solid 3px green');
        $check5 = "valid";
    }
})


$("#webid").focusout(function() {
    $check6 = "invalid";
    $web = $("#webid").val();
    $first = $web.substr(0, 1);
    $second = $web.substr(1, 1);
    if ($web == "" || $web == 0) {
        $("#lableweb").html("*Enter web space.");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$web.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableweb").html("*Web Space can be only integer and only one dot(.) allowed");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableweb").html("*In starting you cant have two zero");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableweb").hide();
        $(this).css('border', 'solid 3px green');
        $check6 = "valid";
    }
})

$("#bandid").focusout(function() {
    $check7 = "invalid";
    $band = $("#bandid").val();
    $first = $band.substr(0, 1);
    $second = $band.substr(1, 1);
    if ($band == "" || $band == 0) {
        $("#lableband").html("*Enter  bandwidth.");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$band.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableband").html("*Bandwidth can be only integer and only one dot(.) allowed");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableband").html("*In starting you cant have two zero");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableband").hide();
        $(this).css('border', 'solid 3px green');
        $check7 = "valid";
    }
})


$("#domainid").focusout(function() {
    $check8 = "invalid";
    $domain = $("#domainid").val();
    $first = $domain.substr(0, 1);
    if ($first.match(/[0-9]/)) {
        $pattern = /^[0-9]\d*?$/;
    } else if ($first.match(/[a-zA-Z]/)) {
        $pattern = /^[a-zA-Z]*$/;
    }
    if ($domain == "" || $domain == null) {
        $("#labledomain").html("*Enter  No of domain.");
        $("#labledomain").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$domain.match($pattern)) {
        $("#labledomain").html("*Domain can be only Numeric or alphabetic");
        $("#labledomain").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#labledomain").hide();
        $(this).css('border', 'solid 3px green');
        $check8 = "valid";
    }
})

$("#langid").focusout(function() {
    $check9 = "invalid";
    $lang = $("#langid").val();
    var ans1 = $lang.replace(/ /g, '');
    var ans2 = Number(ans1);
    if ($lang == "" || $lang == null) {
        $("#lablelang").html("*Enter Language / Technology ");
        $("#lablelang").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$lang.match(/^[a-zA-Z0-9\\s\\,]+$/)) {
        $("#lablelang").html("*Language can be only Alphanumeric or alphabetic And Separate by , ");
        $("#lablelang").show();
        $(this).css('border', 'solid 3px red');
    } else if (Number.isInteger(ans2)) {
        $("#lablelang").html("*Language can be Alphanumeric or alphabetic");
        $("#lablelang").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lablelang").hide();
        $(this).css('border', 'solid 3px green');
        $check9 = "valid";
    }

})

$("#mailid").focusout(function() {
    $check10 = "invalid";
    $mail = $("#mailid").val();
    $first = $mail.substr(0, 1);
    if ($first.match(/[0-9]/)) {
        $pattern = /^[0-9]\d*?$/;
    } else if ($first.match(/[a-zA-Z]/)) {
        $pattern = /^[a-zA-Z]*$/;
    }
    if ($mail == "" || $mail == null) {
        $("#lablemail").html("*Enter  No of mail.");
        $("#lablemail").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$mail.match($pattern)) {
        $("#lablemail").html("*Mail can be only Numeric or alphabetic");
        $("#lablemail").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lablemail").hide();
        $(this).css('border', 'solid 3px green');
        $check10 = "valid";
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