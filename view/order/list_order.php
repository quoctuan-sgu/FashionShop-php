<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
    DANH SÁCH ĐƠN HÀNG
	</h2>
</section>

<?php
	if(isset($_SESSION['user'])) {
		echo "<table border='1'class='table table-hover'>
		<tr class='table-header'>
			<th>Mã đơn hàng</th>
			<th>Trạng thái</th>
			<th>Ngày đặt</th>
			<th>Tổng tiền</th>
			<th>Địa chỉ</th>
			<th>Thanh toán</th>
			<th colspan='3'>Hành động</th>
		</tr>";
		
			if(!empty($list_all_order)) {
				foreach($list_all_order as $item) {
					extract($item);
	
					$name_stt = get_name_status($status_id);
	
					echo "<tr>
							<td>".$order_id."</td>
							<td>".$name_stt."</td>
							<td>". $order_created_date."</td>
							<td>".$total."</td>
							<td>".$address_order."</td>
							<td>".$payment."</td>
							<td><a href='index.php?ac=info_order&id=".$order_id."'>Xem chi tiết</a></td>
							<td><a href='index.php?ac=info_order&id=".$order_id."'>Xác nhận đã nhận</a></td>
							<td><a href='index.php?ac=info_order&id=".$order_id."'>Hủy đơn</a></td>
						</tr>";
				}
			}
			else {
				echo "<tr>
							<td colspan='9'> Không có danh sách đơn hàng!</td>
						</tr>";
			}
	
			

		
	
		
	
	echo "</table>";
	}
	else {
		echo "Vui lòng đăng nhập";
	}
?>

