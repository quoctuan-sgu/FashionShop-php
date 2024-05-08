<?php

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $result = select_one_user($user_id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $role = $_POST['inlineRadioOptions'];

    update_user($email, $password, $username, $phone, $user_id, $role);
    header("Location: index.php?ac=account");
}

?>

<main class="page-content">
    <div class="container-fluid">

        <div class="title-management">
            <h3>Accounts Management &nbsp; </h3>

            <h5><i class="fa fa-angle-right"></i> &nbsp; Update account</h5>

            <a href="index.php?ac=account" class="btn all-btn-management btn-secondary">
                <i class="fas fa-angle-double-left"></i> &nbsp; Return
            </a>
        </div>
        <hr>

        <?php if (is_array($result)) {
            foreach ($result as $row) { ?>

        <form action="#" method="POST" class="form-management">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?= $row['user_id']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                        value="<?= $row['user_email']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Your Password"
                        value="<?= $row['user_password']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Your Name"
                        value="<?= $row['user_name']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="phone" placeholder="Your Phone Number"
                        value="<?= $row['user_phoneNumber']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Role</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1"
                        <?php echo $row['role_id'] == 1 ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="inlineRadio2">Customer</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2"
                        <?php echo $row['role_id'] == 2 ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="inlineRadio2">Admin</label>
                </div>
            </div>

            <button type="submit" class="btn btn-info btn-lg mx-auto d-block">
                <i class="fas fa-user-plus"></i> &nbsp; Update
            </button>
        </form>

        <?php }
        } ?>