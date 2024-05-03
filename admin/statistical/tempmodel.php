<?php 
    function getAllOrder(){
        $sql="SELECT * FROM `order` WHERE 1";
        return pdo_query($sql);
    }
    function totalRevenue(){
        $sql="SELECT SUM(total) as total FROM `order` WHERE 1";
        return pdo_query_value($sql);
    }
    function getOrderDetailByOrderId($id){
        echo '<sript>console.log("order id '.$id.'")</script>';
        $sql="SELECT * FROM `orderdetail` WHERE  order_id=".$id;
        return pdo_query($sql);
    }
    function getStatusNameByStatusId($id){
        $sql="select status_name from status where status_id=".$id;
        return pdo_query_value($sql);
    }
    function getUserDetailByUserId($id){
        $sql="select * from user where user_id=".$id;
        return pdo_query_one($sql);
    }
    function getProductNameByProductId($id){
        $sql="select product_name from product where product_id=".$id;
        return pdo_query_value($sql);
    }
    function getProductPriceByProductId($id){
        $sql="select product_price from product where product_id=".$id;
        return pdo_query_value($sql);
    }
    function getProductImageByProductId($id){
        $sql="select product_image from product where product_id=".$id;
        return pdo_query_value($sql);
    }
?>