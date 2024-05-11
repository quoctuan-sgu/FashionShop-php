<?php 
if(isset( $_POST['orderId']) && intval($_POST['orderId']) <=4) {
    $orderId = $_POST['orderId'];
    getOrderStatusAndUpdateByOne($orderId);
}
if(isset( $_POST['huydon'])) {
    $orderId = $_POST['huydon'];
    huydon($orderId);
}

$status=getAllStatus();
$fromDate = $_POST['fromDate'] ?? date('Y-m-d', strtotime('-1 month'));
$toDate = $_POST['toDate'] ?? date('Y-m-d');
$orders=getOrderFromDateToDate($fromDate,$toDate);
if(isset($_POST['orderStatus'])) {
    $statusId = $_POST['orderStatus'];
    $orders = getOrderFromDateToDate($fromDate,$toDate);
    $orders = array_filter($orders, function($order) use ($statusId) {
        return $order['status_id'] == $statusId;
    });
}

?>
<main class="page-content">
    <div class="container-fluid">
    <h2>Order management</h2>
    <div class="row ml-1 mt-3">
            <form class="row ml-1" method="post">
                <h4 class="mr-1">From date</h4> <input class="datepicker mr-3" type="date" id="fromDate" name="fromDate" value=<?php echo $fromDate?> >
                <h4 class="mr-1">To date</h4> <input type="date" id="toDate" name="toDate" value=<?php echo $toDate?>>
                <button type="submit" class="btn btn-primary ml-3">Filter</button>
            </form>
    </div>
    <div class="row ml-1 mt-3">
        <form method="post">

            <div class="form-group">
                <label for="orderStatus">Order Status:</label>
                <select class="form-control" id="orderStatus" name="orderStatus">
                    <?php foreach($status as $st) { ?>
                        <option value="<?php echo $st['status_id']; ?>"><?php echo $st['status_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>

        <table class="table table-hover">
            <tr class="table-header">
                <th>Order ID</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Order shipment date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach($orders as $order) { ?>
            <tr>
                
                <td><?php echo $order['order_id']; ?></td>
                <td><?php echo $order['user_id']; ?></td>
                <td><?php echo $order['order_created_date']; ?></td>
                <td><?php echo $order['estimate_ship_date'];  ?></td>
                <td><?php echo strval(getOrderTotalFromOrderDetail($order['order_id'])); ?></td>
                <td><?php echo strval(getStatusNameByStatusId($order['status_id']));?></td>
                <td><a href="index.php?ac=orderdetail&id=<?php echo $order['order_id']; ?>" class="btn btn-danger">Detail</a>
                /
                <form method="post">
                    <input type="hidden" name="orderId" value="<?php echo $order['order_id']; ?>">
                    <button type="submit" name="submit" class="btn btn-danger">Process</button>
                </form>
                /
                <form method="post">
                    <input type="hidden" name="huydon" value="<?php echo $order['order_id']; ?>">
                    <button type="submit" name="submit" class="btn btn-danger">Hủy đơn</button>
                </form>
                </td>
                
            </tr>
            <?php } ?>
        </table>
</main>
