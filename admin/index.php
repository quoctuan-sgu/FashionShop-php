<?php

    // include ở đây nhé
    include "../model/pdo.php";
    include "header.php";



    // Controller ở đây nhé
    if(isset($_GET['ac'])) {
        $ac = $$_GET['ac'];
        switch($ac) {
            // case ở đây rồi include giao diện vào đây nha. NHớ break
        }
    }
    else {
        // nếu không tồn tại => load trang home admin
        include "home.php";

    }
    // footer
    include "footer.php";
?>