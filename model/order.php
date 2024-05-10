<?php
    function add_new_order($user_id, $created_date, $ship_date, $total) {
        $sql = "INSERT INTO `order`(user_id, status_id, order_created_date, estimate_ship_date, total) VALUES ('$user_id', 1, '$created_date', '$ship_date', '$total')";
        return pdo_execute_lastInsertId($sql);
    }