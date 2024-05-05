<main class="page-content">
    <div class="container-fluid">

        <div class="title-management">
            <h3>Accounts Management &nbsp; </h3>

            <h5><i class="fa fa-angle-right"></i> &nbsp; Update account</h5>

            <a href="index.php?ac=account" class="all-btn-management btn-secondary">
                <i class="fas fa-angle-double-left"></i> &nbsp; Return
            </a>
        </div>
        <hr>
        
        <form action="#" method="POST">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputPassword" placeholder="Your Email">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Your Password">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" placeholder="Your Name">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputPassword" placeholder="Your Phone Number">
                </div>
            </div>

            <button type="submit" class="btn all-btn-management btn-info btn-lg mx-auto d-block">
                <i class="fas fa-user-plus"></i> &nbsp; Update
            </button>
        </form>