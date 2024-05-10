<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
    HÓA ĐƠN MUA HÀNG
	</h2>
</section>
<div>

    <div>Mã hóa đơn: <?= $id_bill ?></div>
    <div>Ngày tạo hóa đơn: <?= $created_date ?></div>
    <div>Phương thức thanh toán: <?= $payment ?></div>
    <div>Địa chỉ nhận hàng: <?= $address ?></div>
    <div>Tên người mua: <?= $name_user ?></div>
    <div>SĐT: <?= $phone ?></div>

    <table border="1">
        <tr>
            <th>Mã SP</th>
            <th>Tên SP</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>
        <?php
            if(isset($list_detail_cart)) {
                foreach($list_detail_cart as $item) {
                    extract($item);
                    $pro_id = $product_id;
                    $pro_quantity = $quantity;
    
                    $pro_detail = get_info_product($pro_id);
                    if(isset($pro_detail)) {
                        extract($pro_detail);
                        $pro_price = $product_price;
                        $price_quantity = $pro_quantity * $pro_price;
                    }
                    echo "<tr>
                            <td>". $pro_id ."</td>
                            <td>". $product_name ."</td>
                            <td>". $quantity ."</td>
                            <td>". $pro_price."$</td>
                            <td>". $price_quantity."$</td>
                        </tr>";
    
                }
            }
            
        ?>
    </table>

    <div>Tổng tiền: <?= $total_bill_cart ?>$</div>

</div>