<div class="container-fluid sign-container">
    <div class="row justify-content-center">
        <div class="col-md-4 sign-form" style="margin: 10% 4% 12% 4%;">
            <h2>ĐĂNG NHẬP</h2>

            <form action="index.php?ac=signin" method="POST">

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email *" name="email" />
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password *" name="password" />
                </div>

                <div class="row justify-content-end">
                    <a href="index.php?ac=signup">Đăng ký</a>
                </div>

                <div class="row justify-content-center">
                    <input type="submit" class="btnSubmit" value="Đăng nhập" name="signin" />
                </div>
            </form>

            <?php if (isset($notice)) { ?>
                <h5><?= $notice; ?></h5>
            <?php } ?>
        </div>
    </div>
</div>