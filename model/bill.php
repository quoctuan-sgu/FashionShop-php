<?php
    function add_new_bill($user_id, $created_date) {
        $sql = "INSERT INTO bill (user_id, created_date) VALUES ('$user_id', '$created_date')";
        return pdo_execute_lastInsertId($sql);
    }

    function get_bill($bill_id) {
        $sql = "SELECT * FROM bill WHERE bill_id = $bill_id";
        return pdo_query_one($sql);
    }