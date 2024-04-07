<div class="container-fluid sign-container">
    <div class="row justify-content-center">
        <div class="col-md-4 sign-form" style="margin: 6% 4% 8% 4%;">
            <h2>ĐĂNG KÝ</h2>

            <form action="index.php?ac=signup" method="POST">

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email *" name="email" />
                    <div class="error-message" id="email-error"></div>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password *" name="password" />
                    <div class="error-message" id="password-error"></div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name *" name="username" />
                    <div class="error-message" id="username-error"></div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Phone Number *" name="phone" />
                    <div class="error-message" id="phone-error"></div>
                </div>

                <div class="row justify-content-end">
                    <a href="index.php?ac=signin">Đăng nhập</a>
                </div>

                <div class="row justify-content-center">
                    <input type="submit" class="btnSubmit" value="Đăng ký" name="signup" onclick="return validationForm();" />
                </div>
            </form>

            <?php if (isset($notice)) { ?>
                <h5><?= $notice; ?></h5>
            <?php } ?>
        </div>
    </div>

    <script>
        function validationForm() {
            var email = document.querySelector('input[name="email"]').value;
            var password = document.querySelector('input[name="password"]').value;
            var username = document.querySelector('input[name="username"]').value;
            var phone = document.querySelector('input[name="phone"]').value;

            var emailError = document.getElementById('email-error');
            var passwordError = document.getElementById('password-error');
            var usernameError = document.getElementById('username-error');
            var phoneError = document.getElementById('phone-error');

            if (/\s/.test(email) || email === '') {
                emailError.textContent = 'Email không hợp lệ!';
                return false;
            } else {
                emailError.textContent = '';
            }

            if (/\s/.test(password) || password === '') {
                passwordError.textContent = 'Mật khẩu không hợp lệ!';
                return false;
            } else {
                passwordError.textContent = '';
            }

            if (username.trim() === '') {
                usernameError.textContent = 'Tên không hợp lệ!';
                return false;
            } else {
                usernameError.textContent = '';
            }

            if (/^[0][0-9]{9}$/.test(phone)) {
                phoneError.textContent = '';
            } else {
                phoneError.textContent = 'Số điện thoại không hợp lệ!';
                return false;
            }
            
            return true;
        }
    </script>

</div>