<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $orderDetails = pdo_query("SELECT * FROM orderdetail WHERE order_id = $id");
}
?>
<main class="page-content">
    <div class="container-fluid">
        <h2>Order detail</h2>
        <table class="table table-hover">
            <tr class="table-header">
                <th>Product ID</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            <?php foreach($orderDetails as $orderDetail) { ?>
            <tr>
                <td><?php echo $orderDetail['product_id']; ?></td>
                <td><a href="../index.php?ac=productDetail&id=<?php echo $orderDetail['product_id'] ?>"><?php echo strval(getProductNameByProductId($orderDetail['product_id'])); ?></a></td>
                <td><?php echo $orderDetail['quantity']; ?></td>
                <td><?php echo $orderDetail['price']; ?></td>
                <td><?php echo $orderDetail['quantity']*$orderDetail['price']; ?></td>
            </tr>
            <?php } ?>
        </table>

    </div>
</main>
