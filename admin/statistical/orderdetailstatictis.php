<?php 
if(isset($_GET['id'])){
    $orderDetails=getOrderDetailByOrderId($_GET['id']);
}

?>
<main class="page-content">
    <div class="container-fluid">
        <h2>Order Detail</h2>
        <table class="table table-hover">
            <tr class="table-header">
                <th>Order ID</th>
                <th>Order Detail id</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Total</th>
                
            </tr>
            
                <?php 
                    foreach($orderDetails as $orderDetail){
                        $product=getProductNameByProductId($orderDetail['product_id']);
                        $productPrice=getProductPriceByProductId($orderDetail['product_id']);
                        $productImage=getProductImageByProductId($orderDetail['product_id']);
                ?>
                <tr class="table-body">
                    <td><?php echo $orderDetail['order_id']; ?></td>
                    <td><?php echo $orderDetail['order_detail_id']; ?></td>
                    <td><?php echo $product; ?></td>
                    <td><img style="width:50px;height:50px" src="data:image/jpeg;base64,<?php echo base64_encode($productImage); ?>" alt="IMG-PRODUCT"></td>
                    <td><?php echo $productPrice; ?></td>
                    <td><?php echo $orderDetail['quantity']; ?></td>
                    <td><?php echo $productPrice*$orderDetail['quantity']; ?></td>
                </tr>
                   <?php } ?>
            
            
        </table>
        <a href="index.php?ac=orderstatistic">Back to order statictis</a>

    </div>
</main>