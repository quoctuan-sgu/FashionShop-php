<?php 
    if(isset($_GET['user_id'])){
       $orders=getOrderByUserId($_GET['user_id']);
       $totalRevenue=totalRevenueOfOrders($orders);
    }
    // $orders=getAllOrder();
    // $totalRevenue=totalRevenue();
?>
<main class="page-content">
    <div class="container-fluid">
        <div>
            <h2>Order statictis</h2>
            <h3>Total revenue: <?php echo $totalRevenue ?>$</h3>
        </div>
        <table class="table">
            <tr class="table-header">
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Estimate shipment Date</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Customer Address</th>
                <th>Order Total</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
            <?php foreach($orders as $order) { 
                    $user=getUserDetailByUserId($order['user_id']);
                ?>
                <tr>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['order_created_date']; ?></td>
                    <td><?php echo $order['estimate_ship_date']; ?></td>
                    <td><?php echo $user['user_name']; ?></td>
                    <td><?php echo $user['user_phoneNumber']; ?></td>
                    <td><?php echo $user['user_address']; ?></td>
                    <td><?php echo $order['total']; ?></td>
                    <td><?php echo strval(getStatusNameByStatusId($order['status_id'])); ?></td>
                    <td><a href="index.php?ac=orderdetail&id=<?php echo $order['order_id']; ?>">Order Detail</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</main>