<!-- Header -->
<?php include "view/header.php";
	  include "model/pdo.php";
	  include "view/slider.php"
?>


<?php
	// Controller
	if(isset($_GET['ac']) && $_GET['ac'] != "") {
		$ac = $_GET['ac'];
		switch($ac) {
			// TRang Cart
			case 'cart':
				include "view/cart/cart.php";
				break;
			case 'product':
				include "view/product.php";
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
			case 'login':
				include "view/account/signin.php";
				break;
			case 'signup':
				include "view/account/signup.php";
				break;

			default:
				include "view/home.php";
			
		}
	}
	else {
		include "view/home.php";
	}

	include "view/footer.php";
?>