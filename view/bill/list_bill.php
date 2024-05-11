<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
    DANH SÁCH HÓA ĐƠN
	</h2>
</section>

<table border="1">
    <tr>
        <th>Mã hóa đơn</th>
        <th>Ngày tạo</th>
        <th>Tổng tiền</th>
        <th>Hành động</th>
    </tr>
    <?php
    if(!empty($list_bill)) {
			foreach($list_bill as $item) {
                extract($item);


                $bill_info = get_info_one_bill($bill_id);
                $total_bill = 0;
                foreach($bill_info as $item) {
                    extract($item);
                    $total_bill += $total;
                }

                echo "<tr>
                        <td>".$bill_id."</td>
                        <td>".$created_date."</td>
                        <td>". $total_bill ."$</td>
                        <td><a href='index.php?ac=view_info_bill&id=".$bill_id."'>Xem chi tiết</a></td>
                    </tr>";
            }
    }
    else {
        echo "<tr>
                <td colspan='4'> Không có danh sách hóa đơn</td>
            </tr>";
    }
    ?>

    
    
    
</table>