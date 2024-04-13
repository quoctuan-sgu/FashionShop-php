<!-- Viết các hàm truy vấn sql của sản phẩm như: thêm sản phẩm, xóa sản phẩm, lấy thông tin sản phẩm, cập nhật thông tin sản phẩm... -->
<!-- Ví dụ
    // hàm thêm sản phẩm mới
    function add_product($ten_sp, $gia_sp, $fileName, $mota_sp, $ma_dm, $gia_ban) {
        $sql = "INSERT INTO sanpham(ten_sp, gia_sp, anh_sp, mota_sp, luotxem_sp, ma_dm, trangthai, gia_ban) VALUES('$ten_sp', '$gia_sp', '$fileName', '$mota_sp', 0, '$ma_dm', 1, '$gia_ban')";
        pdo_execute($sql);
    } 
-->
<?php
 function loadSanPham_Product(){
    $sql="select * from product order by product_name";
    return pdo_query($sql);
}
 function searchFunction($searchText) {
    $sql= "select * from product where 1";
    $sql.=" and product_name like '%".$searchText."%'";
    $listProduct=pdo_query($sql);
    return $listProduct;
}
function loadAllCategory(){
    $sql= "select * from categories";
    $listCategories=pdo_query($sql);
    return $listCategories;
}
function loadProductByCategory($categoryId){
    $sql= 'select * from product where product.category_id='.$categoryId;
    $listProduct=pdo_query($sql);
    return $listProduct;
}
function loadProductByPageIdx($pageIndex,$pageSize){
    $offSet=($pageIndex-1)*$pageSize;
    $sql='Select * from product limit '.$offSet.','.$pageSize;

    $listProduct=pdo_query($sql);
    return $listProduct;

}
function loadProductByPageIdxAndCategory($pageIndex,$pageSize,$categoryId){
    $offSet=($pageIndex-1)*$pageSize;
    $sql='Select * from product where product.category_id = '.$categoryId.' limit '.$offSet.','.$pageSize;
    // $sql='Select * from product limit '.$offSet.','.$pageSize.' where product.category_id='.$categoryId;
    $listProduct=pdo_query($sql);
    return $listProduct;
}
function totalPage($listProduct,$pageSize){
    $totalPage=ceil(count($listProduct)/$pageSize);
    return $totalPage;
}
function loadProductByColor($color){
    $sql= 'select * from product where product.product_color='.$color;
    $listProduct=pdo_query($sql);
    return $listProduct;
}
function getUniqueProductColors($listProduct) {
    $uniqueColors = [];

    foreach($listProduct as $product) {
        // Check if the product color is not already in the uniqueColors array
        if(!in_array($product['product_color'], $uniqueColors)) {
            // Add the product color to the uniqueColors array
            $uniqueColors[] = $product['product_color'];
        }
    }

    return $uniqueColors;
}
function filterProductByColor($color){
    $sql= "select * from product where product.product_color='".$color."'";
    $listProudct=pdo_query($sql);
    return $listProudct;
}
function constructQuery($color = null, $category = null, $searchKeywork = null,$pageIdx=null, $pageSize=null) {
    $sql = "SELECT * FROM product WHERE 1";

    // Add conditions based on the provided arguments
    if ($color !== null && $color!=='') {
        $sql .= " AND product_color = '".$color."'";
    }
    if ($category !== null && $category!=='') {
        $sql .= " AND category_id = ".$category;
    }
    // Add additional conditions as needed
    
    // Add search  clause
    if ($searchKeywork !== null && $searchKeywork!='') {
        $sql .= " and product_name like '%".$searchKeywork."%'";
    }
    if($pageIdx!==null && $pageSize!=''){
        if($pageIdx==1){
            $sql.=' limit '.($pageIdx-1).','.$pageSize;
        }
        else{
            $sql.=' limit '.($pageIdx-1)+$pageSize.','.$pageSize;
        }

    }
    echo "<script>console.log('Debug Objects: " . $sql . "' );</script>";

    return $sql;
}
function filterBy($color = null, $category = null, $searchKeywork = null,$pageIdx=null, $pageSize=null){
    $sql=constructQuery($color, $category, $searchKeywork,$pageIdx,$pageSize);
    $listProduct=pdo_query($sql);
    return $listProduct;
}
function getProductByProductId($id){
    $sql='select * from product where product_id='.$id;
    $productDetail=pdo_query_one($sql);
    return $productDetail;
}
//cheat
function getCategoryNameById($id){
    $sql='select category_name from categories where category_id='.$id;
    $categoryName=pdo_query_value($sql);
    return $categoryName;
}
?>