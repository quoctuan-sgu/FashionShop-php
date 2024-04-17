<?php
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



// Controller
if (isset($_GET['ac'])) {
    $ac = $$_GET['ac'];

    switch ($ac) {
        case '?':
            include "home.php";
            break;

        default:
            include "home.php";
    }
} else {
    include "home.php";
}



include "footer.php";
