<!-- Header -->
<?php
ob_start();
session_start();
include "view/header.php";
include "model/pdo.php";
include "model/account.php";
include "model/product.php";
include "model/productdetail.php";
?>



<!-- Controller -->
<?php
if (isset($_GET['ac']) && $_GET['ac'] != "") {
	$ac = $_GET['ac'];

	switch ($ac) {
		case 'cart':
			include "view/cart/cart.php";
			break;
		case 'product':
			include "view/product.php";
			break;
		case 'productDetail':
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

				$result = check_user($email, $password);

				if (is_array($result)) {
					$_SESSION['user'] = $result;
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
					insert_user($email, $password, $username, $phone, 1);
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