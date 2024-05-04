----Lấy default lọc top 5 người dùng mua nhiều nhất
----Khi bấm lọc lấy giá trị post lọc 5 người mua nhiều nhất
----Sẽ có cột detail bấm vào sẽ qua các order được người dùng đó mua bấm chi tiết sẽ ra các sản phẩm mà người dùng đó đã mua ở đơn hàng đó.
----Làm cái trên = cách ẩn order statictis đi, truyền user id vào chỉ lọc order có user id đó thôi.Là done.
----Bỏ statistic này vào dashboard vì nó chỉ có 1 option.
<?php 
$fromDate = $_GET['fromDate'] ?? date('Y-m-d', strtotime('-1 month'));
$toDate = $_GET['toDate'] ?? date('Y-m-d');

?>
<main class="page-content">
    <div class="container-fluid">
        <h2>Customer statictis</h2>
        <div class="row ml-1 mt-3">
            
            <h4 class="mr-1">From date</h4> <input class="datepicker mr-3" type="date" id="fromDate" value="<?php echo date('Y-m-d',strtotime('-1 month')); ?>">
            <h4 class="mr-1">To date</h4> <input type="date" id="toDate" value="<?php echo date('Y-m-d'); ?>">
        </div>
        
    </div>
</main
