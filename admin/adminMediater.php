<?php
session_start();
include("../classes/product.php");
include_once("../classes/user.php");
$dbconn = new dbconn();
$product = new product();

if (isset($_POST['addCategory'])) {
    $parentId = isset($_POST['parentId']) ? $_POST['parentId'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $link = isset($_POST['link']) ? $_POST['link'] : '';

    $addCategory = $product->addCategory($parentId, $category, $link, $dbconn->conn);
    if (isset($addCategory)) {

        header("Location:category.php?alert=added");
    } else {
        header("Location:category.php?alert=addedFail");
    }
}

if (isset($_GET['action'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($_GET['action'] == 'delete') {
        $deleteCategory = $product->deleteCategory($id, $dbconn->conn);
        if (isset($deleteCategory)) {

            header("Location:category.php?alert=delete");
        } else {
            header("Location:category.php?alert=deleteFail");
        }
    }

    if ($_GET['action'] == 'disable') {
        $available = 0;
        $changeStatusCategory = $product->changeStatusCategory($available, $id, $dbconn->conn);
        if (isset($changeStatusCategory)) {

            header("Location:category.php");
        } else {
            echo "<script type='text/javascript'>alert('Some Error, Please try again'); window.location='category.php';</script>";
        }
    }

    if ($_GET['action'] == 'enable') {
        $available = 1;
        $changeStatusCategory = $product->changeStatusCategory($available, $id, $dbconn->conn);
        if (isset($changeStatusCategory)) {

            header("Location:category.php");
        } else {
            echo "<script type='text/javascript'>alert('Some Error, Please try again'); window.location='category.php';</script>";
        }
    }

    if ($_GET['action'] == 'disableprod') {
        $available = 0;
        $changeStatusCategory = $product->changeStatusCategory($available, $id, $dbconn->conn);
        if (isset($changeStatusCategory)) {

            header("Location:viewproduct.php");
        } else {
            echo "<script type='text/javascript'>alert('Some Error, Please try again'); window.location='viewproduct.php';</script>";
        }
    }

    if ($_GET['action'] == 'enableprod') {
        $available = 1;
        $changeStatusCategory = $product->changeStatusCategory($available, $id, $dbconn->conn);
        if (isset($changeStatusCategory)) {

            header("Location:viewproduct.php");
        } else {
            echo "<script type='text/javascript'>alert('Some Error, Please try again'); window.location='viewproduct.php';</script>";
        }
    }
    if ($_GET['action'] == 'deleteprod') {
        $deleteCategory = $product->deleteProduct($id, $dbconn->conn);
        if (isset($deleteCategory)) {

            header("Location:viewproduct.php?alert=delete");
        } else {
            header("Location:viewproduct.php?alert=deleteFail");
        }
    }
}

if (isset($_POST['updateCategory'])) {

    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $link = isset($_POST['link']) ? $_POST['link'] : '';
    $id = isset($_POST['cid']) ? $_POST['cid'] : '';

    $updateCategory = $product->updateCategory($id, $category, $link, $dbconn->conn);

    if (isset($updateCategory)) {

        header("Location:category.php?alert=update");
    } else {
        header("Location:category.php?alert=updateFail");
    }
}

if (isset($_POST['newproduct'])) {

    $categoryid = isset($_POST['categoryid']) ? $_POST['categoryid'] : '';
    $pname = isset($_POST['pname']) ? $_POST['pname'] : '';
    $url = isset($_POST['url']) ? $_POST['url'] : '';
    $mprice = isset($_POST['mprice']) ? $_POST['mprice'] : '';
    $aprice = isset($_POST['aprice']) ? $_POST['aprice'] : '';
    $sku = isset($_POST['sku']) ? $_POST['sku'] : '';
    $webspace = isset($_POST['webspace']) ? $_POST['webspace'] : '';
    $bandwidth = isset($_POST['bandwidth']) ? $_POST['bandwidth'] : '';
    $domain = isset($_POST['domain']) ? $_POST['domain'] : '';
    $lang = isset($_POST['lang']) ? $_POST['lang'] : '';
    $mailbox = isset($_POST['mailbox']) ? $_POST['mailbox'] : '';

    $prod_desc = array(
        "webspace" => $webspace,
        "bandwidth" => $bandwidth,
        "domain" => $domain,
        "lang" => $lang,
        "mailbox" => $mailbox,
    );

    $prod_desc_json = json_encode($prod_desc);

    $addproduct = $product->addProduct($categoryid, $pname, $url, $prod_desc_json, $mprice, $aprice, $sku, $dbconn->conn);

    if (isset($addproduct)) {
        header("Location:addproduct.php?alert=added");
    } else {
        header("Location:addproduct.php?alert=addedFail");
    }
}
// Update

if (isset($_POST['updateproduct'])) {

    $pid = isset($_POST['pid']) ? $_POST['pid'] : '';
    $pname = isset($_POST['pname']) ? $_POST['pname'] : '';
    $url = isset($_POST['url']) ? $_POST['url'] : '';
    $mprice = isset($_POST['mprice']) ? $_POST['mprice'] : '';
    $aprice = isset($_POST['aprice']) ? $_POST['aprice'] : '';
    $webspace = isset($_POST['webspace']) ? $_POST['webspace'] : '';
    $bandwidth = isset($_POST['bandwidth']) ? $_POST['bandwidth'] : '';
    $domain = isset($_POST['domain']) ? $_POST['domain'] : '';
    $lang = isset($_POST['lang']) ? $_POST['lang'] : '';
    $mailbox = isset($_POST['mailbox']) ? $_POST['mailbox'] : '';

    $prod_desc = array(
        "webspace" => $webspace,
        "bandwidth" => $bandwidth,
        "domain" => $domain,
        "lang" => $lang,
        "mailbox" => $mailbox,
    );

    $prod_desc_json = json_encode($prod_desc);

    $addproduct = $product->updateProduct($pid, $pname, $url, $prod_desc_json, $mprice, $aprice, $dbconn->conn);

    if (isset($addproduct)) {
        header("Location:viewproduct.php?alert=update");
    } else {
        header("Location:viewproduct.php?alert=updateFail");
    }
}