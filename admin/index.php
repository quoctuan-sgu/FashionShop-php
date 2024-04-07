<?php
// check SESSION
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);

    if ($role_id == 1) {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
?>


<?php
include "header.php";
include "../model/pdo.php";



// Controller
if (isset($_GET['ac'])) {
    $ac = $$_GET['ac'];

    switch ($ac) {
        case '':
            break;
    }
} else {
    include "home.php";
}



include "footer.php";
