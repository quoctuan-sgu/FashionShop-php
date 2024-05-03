<?php 
echo '<sript>console.log("order id '.$_GET['id'].'")</script>';
if(isset($_GET['id'])){
    $order_id=$_GET['id'];
    $orderDetail=getOrderDetailByOrderId($order_id);
}

?>
<main class="page-content">
    <div class="container-fluid">
        <h2>Order Detail</h2>
        <table class="table">
            <tr class="table-header">
                <th>Order ID</th>
                <th>Order Detail id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Total</th>
                
            </tr>
            <tr>
                <td><?php echo $orderDetail['order_id']; ?></td>
                <td><?php echo $orderDetail['order_detail_id']?></td>
                <td><?php echo strval(getProductNameByProductId($orderDetail['product_id'])) ?></td>
                <td><?php echo strval(getProductPriceByProductId($orderDetail['product_id']))?> </td>
                <td><?php echo $orderDetail['quantity'] ?></td>
                <td><?php echo $orderDetail['total'] ?></td>
            </tr>
            
        </table>

    </div>
</main>