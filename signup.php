<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    <link rel="stylesheet" href="css/sign.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" id="bootstrap-css">
</head>

<body>
    <div class="container-fluid sign-container">
        <div class="row justify-content-center">
            <div class="col-md-4 sign-form-2">
                <h3>ĐĂNG KÝ</h3>

                <form action="index.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" value="" />
                    </div>
                    <div class="form-group">
                        <a href="signin.php" class="signin" value="signin">Đăng nhập</a>
                    </div>
                    <div class="row justify-content-center">
                        <input type="submit" class="btnSubmit" value="Đăng ký" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>