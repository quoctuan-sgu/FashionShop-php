<!-- Header -->
<?php
ob_start();
session_start();
include "view/header.php";
include "model/pdo.php";
include "model/account.php";
include "model/product.php";
include "model/productdetail.php";

// Nguyen Van Dung
include "model/cart.php";
include "model/cart_detail.php";
include "model/bill.php";
include "model/bill_detail.php";
include "model/order.php";
include "model/order_detail.php";
?>

<?php

?>





<!-- Controller -->
<?php

if (isset($_GET['ac']) && $_GET['ac'] != "") {
	$ac = $_GET['ac'];

	switch ($ac) {
		case 'cart':
			// kiểm tra user đã login hay chưa
			if(isset($_SESSION['user'])) { // đã login
				// show cart

				//1. lấy danh sách id sản phẩm
				
				$list_id_product = get_list_code_product($_SESSION['user']['user_id']);
				
			}
			else { //chưa login
				// show cart 
			}
			
			include "view/cart/cart.php";
			break;
		case 'add_to_cart':
			// lấy thông tin sản phẩm
			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_add_to_cart'])) {
				$product_id_get = $_POST['id_product'];
				$quantity_get = $_POST['num-product'];
			}
			// kiểm tra khi nhấn add to cart user đăng nhập chưa:
			if(isset($_SESSION['user'])) {
				// nếu đã đăng nhập:
				// Kiểm tra mã user có trong cart chưa
				$user_cart_info = get_info_user_cart($_SESSION['user']['user_id']);
				if(is_array($user_cart_info)) { 
					extract($user_cart_info);
					$id_cart = $cart_id;
					echo "<script> alert('". $id_cart ."'); </script>";
					// nếu đã tồn tại thì xét sp đã có trong chi tiết cart chưa
					$info_cartdetail = get_info_product_cart_detail($product_id_get);
					if(is_array($info_cartdetail)){
						// nếu tồn tại thì update số lượng theo cart id
						extract($info_cartdetail);
						$quantity_current = $quantity;
						$quantity_new  = $quantity_current + $quantity_get;
						// update số lượng
						update_quantity($quantity_new, $product_id_get);

						// lấy số lượng sản phẩm trong giỏ hàng rồi hiển thị ra
						$sum_product_cart = get_quantity_product($_SESSION['user']['user_id']);
						$_SESSION['sum_product_cart'] = $sum_product_cart;
						echo "<script>
						window.location.href = 'index.php?ac=productDetail&id=". $product_id_get ."';</script>";
					}
					else {
						// nếu chưa thêm dô cart detail
						insert_cartdetail($id_cart, $product_id_get, $quantity_get);
						$sum_product_cart = get_quantity_product($_SESSION['user']['user_id']);
						$_SESSION['sum_product_cart'] = $sum_product_cart;
						echo "<script>
						window.location.href = 'index.php?ac=productDetail&id=". $product_id_get ."';</script>";
					}
				}
				else {
					// nếu chưa tồn tại thì thêm vào cart và trả về id_cart để thêm dô cart detail
					// lấy user_id thêm dô:
					$id_cart = insert_cart($_SESSION['user']['user_id']);
					
					// sau đó thêm sp vào cart detail
					insert_cartdetail($id_cart, $product_id_get, $quantity_get);

					$sum_product_cart = get_quantity_product($_SESSION['user']['user_id']);
					$_SESSION['sum_product_cart'] = $sum_product_cart;
					echo "<script>
					window.location.href = 'index.php?ac=productDetail&id=". $product_id_get ."';</script>";
				}
			}
			else {
				if(!isset($_SESSION['cart_no_login'])) {
					$_SESSION['cart_no_login'] = [];
				}

				// kiểm tra id sp đã tồn tại chưa 
				// nếu rồi thì thêm sl
				if(empty($_SESSION['cart_no_login'])) {
					// tạo 1 mảng: id, quantity
					$cart_product = [$product_id_get, $quantity_get];
					array_push($_SESSION['cart_no_login'], $cart_product);
				}
				else {
					$find = false;
					foreach($_SESSION['cart_no_login'] as $key => $item) {
						if($item[0] == $product_id_get) {
							$_SESSION['cart_no_login'][$key][1] += $quantity_get;
							$find = true;
							break;
						}
					}
					if($find == false) {
						// tạo 1 mảng: id, quantity
						$cart_product = [$product_id_get, $quantity_get];
						array_push($_SESSION['cart_no_login'], $cart_product);
					}
				}

			}
			include "view/product-detail.php";
			break;


		case 'bill_info':

			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_checkout']) && isset($_SESSION['user'])) {

				$list_detail_cart_1 = get_list_code_product($_SESSION['user']['user_id']);
			
				if(isset($_SESSION['user'])) {

					if(empty($list_detail_cart_1)) {
						echo "<script> alert('Giỏ hàng rỗng'); 
						window.location.href = 'index.php?ac=cart';</script></script>";
					}
					else {
						$user_id = $_SESSION['user']['user_id'];

						$user = get_account($user_id);
						if(isset($user)) {
							extract($user);
							$name_user = $user_name;
							$phone = $user_phoneNumber;
						}
	
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$created_date = date('Y-m-d');
	
						// thêm vào bill
						$id_bill = add_new_bill($user_id, $created_date);
	
						// add vào bill info: bill_detail_id	bill_id  product_id	quantity	price	total
						$list_detail_cart = get_list_code_product($_SESSION['user']['user_id']);
	
						$total_bill_cart = 0;
						$total_bill_success= 0;
						if(isset($list_detail_cart)){
							foreach($list_detail_cart as $item) {
								extract($item);
								
	
								$id_pro = $product_id;
								$quantity_pro = $quantity;
	
								$get_pro = get_info_product($id_pro);
								if(isset($get_pro)) {
									extract($get_pro);
	
									$price_pro = $product_price;
									$total_bill_cart = $price_pro * $quantity_pro;
									$total_bill_success += $total_bill_cart;
	
									add_new_bill_detail($id_bill, $id_pro, $quantity_pro, $price_pro, $total_bill_cart);
	
								}
							}
						}
						
						// thêm vào order
						// order_id	user_id	status_id	order_created_date	estimate_ship_date	total

						$ship_date = date('Y-m-d', strtotime($created_date . ' +3 days'));
						//order_id	user_id	status_id	order_created_date	estimate_ship_date	total	

						$idOrder = add_new_order($user_id, $created_date, $ship_date, $total_bill_success);

						$total_bill_cart_2 = 0;
						$list_detail_cart_2 = get_list_code_product($_SESSION['user']['user_id']);
						if(isset($list_detail_cart_2)){
							foreach($list_detail_cart_2 as $item) {
								extract($item);

								$id_pro_2 = $product_id;
								$quantity_pro_2 = $quantity;
	
								$get_pro_2 = get_info_product($id_pro_2);
								if(isset($get_pro_2)) {
									extract($get_pro_2);
	
									$price_pro_2 = $product_price;
									$total_bill_cart_2 = $price_pro_2 * $quantity_pro_2;

									//order_detail_id	order_id	product_id	quantity	price	total
									add_new_order_detail($idOrder, $id_pro_2, $quantity_pro_2, $price_pro_2, $total_bill_cart_2);
								}

							}
						}

						
						
	
						$payment = $_POST['pay'];
	
						$id_province = $_POST['province'];
						$id_district = $_POST['disrict'];
						$id_ward = $_POST['ward'];
						$post_code = $_POST['postcode'];
	
						$province = get_province($id_province);
						if(isset($province)){
							extract($province);
							$name_province = $name;
						}
	
						$district = get_district($id_district);
						if(isset($district)){
							extract($district);
							$name_district = $name;
						}
						
						$ward = get_ward($id_ward);
						if(isset($ward)){
							extract($ward);
							$name_ward = $name;
						}
	
						$address = $post_code . ", " . $name_ward . ", " . $name_district . ", " . $name_province;

						delete_cart_detail($user_id);
						del_cart($user_id);
					}	
				}
				
			}
			else {
				echo "<script> alert('Vui lòng đăng nhập để tiếp tục mua hàng'); 
				window.location.href = 'index.php?ac=signin';</script></script>";
			}

		include "view/bill/bill_info.php";
		break;


		case 'to_bill':

			include "view/bill/list_bill.php";

			break;
		case 'product':

			include "view/product.php";
			break;
		case 'productDetail':
			if(isset( $_GET['id'] ) && !empty($_GET['id'])){
				$currentProductDetailId=$_GET['id'];
				$currentProduct=getProductByProductId( $currentProductDetailId );
				// $listProductDetail=getProductDetailByProductId($currentProductDetailId);
				$categoryId=getCategoryIdByProductId($currentProductDetailId);
				$categoryName=getCategoryNameById($categoryId);
			}
			include "view/product-detail.php";
			break;
		case 'blog':
			include "view/blog.php";
			break;
		case 'about':
			include "view/about.php";
			break;
		case 'contact':
			include "view/contact.php";
			break;

		case 'signin':
			if (isset($_POST['signin']) && ($_POST['signin'])) {
				$email = $_POST['email'];
				$password = $_POST['password'];

				$result = select_one_user($email, $password);

				if (is_array($result)) {
					$_SESSION['user'] = $result;
					$_SESSION['sum_product_cart'] = get_quantity_product($_SESSION['user']['user_id']);
					header('Location: index.php');
				} else {
					$notice = "Đăng nhập thất bại.";
				}
			}
			include "view/account/signin.php";
			break;

		case 'signout':
			session_unset();
			session_destroy();
			header("Location: index.php");
			exit();
			break;

		case 'signup':
			if (isset($_POST['signup']) && ($_POST['signup'])) {
				$email = $_POST['email'];
				$password = $_POST['password'];
				$username = $_POST['username'];
				$phone = $_POST['phone'];

				// check exits Email
				$result = select_one_email($email);
				$notice = "";
				
				// exits Email
				if ($result && $result['email_count'] > 0) {
					$notice = "Email đã được sử dụng.";
				} else {
					insert_user($email, $password, $username, $phone);
					$notice = "Đăng ký thành công.";
				}
			}
			include "view/account/signup.php";
			break;


		default:
			include "view/slider.php";
			include "view/home.php";
	}
} else {
	include "view/slider.php";
	include "view/home.php";
}
?>



<!-- Footer -->
<?php
include "view/footer.php";
ob_end_flush();
?>