<?php

function insert_user($user_email, $user_password, $user_name, $user_phoneNumber)
{
    $sql = "INSERT INTO user(user_name, user_email, user_password, user_account_status, user_phoneNumber) 
            VALUES('$user_name', '$user_email', '$user_password', 1, '$user_phoneNumber');
            
            INSERT INTO userrole (user_id, role_id)
            VALUES (LAST_INSERT_ID(), 1);";
    pdo_execute($sql);
}

function select_one_user($user_email, $user_password)
{
    $sql = "SELECT ur.role_id, u.* FROM user u INNER JOIN userrole ur ON u.user_id = ur.user_id WHERE u.user_email = '%s' AND u.user_password ='%s'";
    $sql = sprintf($sql, $user_email, $user_password);
    $rs = pdo_query_one($sql);

    return $rs;
}