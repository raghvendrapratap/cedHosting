<?php

include_once("dbconn.php");

class product
{
    function allParentCategory($conn)
    {
        $sql = "SELECT * from `tbl_product` WHERE `prod_parent_id`=0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        }
    }

    function addCategory($parentId, $category, $link, $conn)
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i');
        $sql = "INSERT INTO `tbl_product` (`prod_parent_id`,`prod_name`,`html`,`prod_available`,`prod_launch_date`) VALUES($parentId, '$category', '$link',1,'$date')";
        if ($conn->query($sql) === true) {
            return "Added";
        }
    }

    function showCategory($pid, $conn)
    {
        $sql = "SELECT * from `tbl_product` WHERE `prod_parent_id`=$pid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        }
    }

    function detailCategory($pid, $conn)
    {
        $sql = "SELECT * from `tbl_product` WHERE `id`=$pid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        }
    }

    function deleteCategory($id, $conn)
    {
        $sql = "DELETE from `tbl_product` WHERE `id`=$id";
        if ($conn->query($sql) === true) {
            return "Deleted";
        }
    }

    function changeStatusCategory($available, $id, $conn)
    {
        $sql = "UPDATE `tbl_product` SET `prod_available`=$available WHERE `id`=$id";
        if ($conn->query($sql) === true) {
            return "Updated";
        }
    }

    function updateCategory($id, $category, $link, $conn)
    {
        $sql = "UPDATE `tbl_product` SET `prod_name`='$category',`html`='$link' WHERE `id`=$id";
        if ($conn->query($sql) === true) {
            return "Updated";
        }
    }


    function addProduct($categoryid, $pname, $url, $prod_desc_json, $mprice, $aprice, $sku, $conn)
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i');
        $sql = "INSERT INTO `tbl_product` (`prod_parent_id`,`prod_name`,`html`,`prod_available`,`prod_launch_date`) VALUES($categoryid, '$pname', '$url',1,'$date')";
        if ($conn->query($sql) === true) {
            $last_id = $conn->insert_id;
            $sql = "INSERT INTO `tbl_product_description` ( `prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES($last_id, '$prod_desc_json', $mprice,$aprice,'$sku')";
            if ($conn->query($sql) === true) {
                return "Added";
            }
        }
    }
    function showProduct($conn)
    {
        $sql = "SELECT * FROM `tbl_product` JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id where NOT tbl_product.prod_parent_id=1;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        }
    }

    function showallProductofCategory($pid, $conn)
    {
        $sql = "SELECT * FROM `tbl_product` JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id where tbl_product.prod_parent_id=$pid;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        }
    }

    function deleteProduct($id, $conn)
    {

        $sql = " DELETE `tbl_product` , `tbl_product_description` FROM `tbl_product` JOIN `tbl_product_description` ON tbl_product.id = tbl_product_description.prod_id where tbl_product_description.prod_id=$id ";
        if ($conn->query($sql) === true) {
            return "Deleted";
        }
    }

    function updateProduct($sku, $categoryid, $pid, $pname, $url, $prod_desc_json, $mprice, $aprice, $conn)
    {
        $sql = "UPDATE `tbl_product` SET `prod_parent_id`='$categoryid', `prod_name`='$pname',`html`='$url' WHERE `id`=$pid ";

        if ($conn->query($sql) === true) {

            $sql = "  UPDATE `tbl_product_description` SET `description`='$prod_desc_json',`mon_price`=$mprice,`annual_price`=$aprice ,`sku`='$sku' WHERE `prod_id`=$pid";
            if ($conn->query($sql) === true) {
                return "Updated";
            }
        }
    }

    function checkcategory($cat, $conn)
    {
        $sql = "SELECT * FROM `tbl_product` where `prod_name`='$cat'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        }
    }
}