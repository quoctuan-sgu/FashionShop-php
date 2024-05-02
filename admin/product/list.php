<?php 
    $pageSize=3;
    $pageIndex=1;
    if(isset($_POST['page'])){
        $pageIndex=$_POST['page'];
    }
    $products =loadSanPham_OrderByProductId();
    $totalPage=ceil(count($products)/$pageSize);
    $products=array_slice($products,($pageIndex-1)*$pageSize,$pageSize);
    
    
?>
<main class="page-content">
    <div class="container-fluid">
        <div>
            <h2>Product Management</h2>
            <a href="index.php?ac=product&act=add"> <i class="fa fa-plus"></i>Add new product</a>
        </div>
        <table class="table table-hover">
            <tr class="table-header">
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Color</th>
                <th>Product Size</th>
                <th>Product Category</th>
                <th>Product Image</th>
                <th>Product Description</th>
                <th>Product Action</th>
            </tr>
            <?php foreach($products as $product) { ?>
                <tr>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><?php echo $product['product_price']; ?></td>
                    <td><?php echo $product['product_color']; ?></td>
                    <td><?php echo $product['product_size']; ?></td>
                    <td><?php 
                            echo strval(getCategoryNameById($product['category_id']));
                        ?>
                    </td>
                    <?php 
                        echo'<td><img style="width:50px;height:50px" src="data:image/jpeg;base64,'.base64_encode($product['product_image']).'" alt="IMG-PRODUCT"></td>'
                    ?>
                    <td><?php echo $product['product_description']; ?></td>
                    <td>
                        <a href="index.php?ac=product&act=edit&id=<?php echo $product['product_id']; ?>"><i class="fa fa-pen mr-2"></i></a>
                        <a href="index.php?ac=product&act=delete&id=<?php echo $product['product_id']; ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <div class="mt-5">
            <ul class="pagination justify-content-center">
                <?php
                    echo '<form method="POST" id="paginationForm" class="row m-l-5">';
                        if($totalPage > 1){
                            for($i = 1; $i <= $totalPage; $i++){
                                echo '<li class="page-item"><button class=" page-link" type="submit" name="page" value="'.$i.'">'.$i.'</button></li>';
                            }
                        }
                    echo '</form>';
                ?>
            </ul>
        </div>
    </div>
</main>
<!-- <main class="page-content">
    <div class="container-fluid">
    <h2>Admin Page</h2>
    </div>    
</main> -->