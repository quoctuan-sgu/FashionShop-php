<?php
ob_start();
session_start();

// check SESSION
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);

    if ($role_id != 2) {
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}


include "header.php";
include "../model/pdo.php";
include "../model/product.php";
include "../model/account.php";
include "statistical/tempmodel.php";



// Controller
if (isset($_GET['ac']) && $_GET['ac'] != "") {
    $ac = $_GET['ac'];

    switch ($ac) {
        case 'product':
            $action = isset($_GET['act']) ? $_GET['act'] : 'list';

            if ($action == 'add') {
                include 'product/add.php';
            } else if ($action == 'edit') {
                include 'product/edit.php';
            } else if ($action == 'delete') {
                include 'product/delete.php';
            } else {
                include 'product/list.php';
            }
            break;

        case 'orderstatistic':
            include 'statistical/orderstatictis.php';
            break;

        case 'orderdetail':
            include 'statistical/orderdetailstatictis.php';
            break;
        case 'topcustomer':
            include 'statistical/customerstatictis.php';
            break;

        case 'account':
            $action = isset($_GET['act']) ? $_GET['act'] : 'list';

            if ($action == 'add') {
                include 'account/add.php';
            } else if ($action == 'edit') {
                include 'account/edit.php';
            } else if ($action == 'delete') {
                include 'account/delete.php';
            } else {
                include 'account/list.php';
            }
            break;

        case 'signout':
            session_unset();
            session_destroy();
            header("Location: ../index.php");
            exit();
            break;

        default:
            include "home.php";
    }
} else {
    include "home.php";
}



include "footer.php";
ob_end_flush();
