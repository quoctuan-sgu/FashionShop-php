<?php

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    delete_user($user_id);
    header("Location: index.php?ac=account");
}
