<?php
// bill_id  product_id	quantity	price	total
    function add_new_bill_detail($bill_id, $product_id, $quantity, $price, $total) {
        $sql = "INSERT INTO billdetail(bill_id, product_id, quantity, price, total) VALUES ('$bill_id', '$product_id', '$quantity', '$price', '$total')";
        pdo_execute($sql);
    }