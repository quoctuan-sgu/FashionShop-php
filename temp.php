<?php
file admin index

case 'account':
    $action = isset($_GET['act']) ? $_GET['act'] : 'list';

    if ($action == 'add') {
        include 'account/add.php';
    } else if ($action == 'edit') {
        include 'account/edit.php';
    } else if ($action == 'lock' || $action == 'unlock') {
        include 'account/delete.php';
    } else {
        include 'account/list.php';
    }
    break;

    
function lock_user($user_id)
{
    $sql = "UPDATE user 
            SET user_account_status = 0
            WHERE user_id = '$user_id';";

    pdo_execute($sql);
}

function unlock_user($user_id)
{
    $sql = "UPDATE user 
            SET user_account_status = 1
            WHERE user_id = '$user_id';";

    pdo_execute($sql);
}

if (isset($_GET['id'])) {
    $action = $_GET['act'];
    $user_id = $_GET['id'];

    if ($action == 'lock') {
        lock_user($user_id);
        header("Location: index.php?ac=account");
    } else if ($action == 'unlock') {
        unlock_user($user_id);
        header("Location: index.php?ac=account");
    }
}