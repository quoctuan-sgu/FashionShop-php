<?php 
    if(isset($_GET['id'])){
        $bill_id = $_GET['id'];
        $billdetails = getBillDetailFromBillId($bill_id);
    }
?>
<main class="page-content">
    <div class="container-fluid">
        <h2>Detail</h2>
        <button type="submit" onclick="window.location.href='index.php?ac=bill' " class="btn btn-info btn-lg mx-auto d-block float-left mb-2">
            Back to bill
        </button>
        <table class="table table-hover">
            <tr class="table-header">
                <th>Bill ID</th>
                <th>Bill Detail Id</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price($)</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php foreach($billdetails as $billdetail) { ?>
            <tr>
                <td><?php echo $billdetail['bill_id']; ?></td>
                <td><?php echo $billdetail['bill_detail_id']; ?></td>
                <td><?php echo $billdetail['product_id']; ?></td>
                <td><a href="../index.php?ac=productDetail&id=<?php echo $billdetail['product_id'] ?>"><?php echo strval(getProductNameByProductId($billdetail['product_id'])); ?></a></td>
                <td><img style="width:50px;height:50px" src="data:image/jpeg;base64,<?php echo base64_encode(strval(getProductImageByProductId($billdetail['product_id']))); ?>" alt="IMG-PRODUCT"></td>
                <td><?php echo $billdetail['price']; ?></td>
                <td><?php echo $billdetail['quantity']; ?></td>
                <td><?php echo $billdetail['total']; ?></td>    
            </tr>
            <?php } ?>
    </div>
</main>
