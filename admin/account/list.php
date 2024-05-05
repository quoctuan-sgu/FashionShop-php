<main class="page-content">
    <div class="container-fluid">

        <div class="title-management">
            <h3>Accounts Management</h3>

            <a href="index.php?ac=account&act=add" class="all-btn-management btn-success">
                <i class="fas fa-user-plus"></i> &nbsp; Create a new account
            </a>
        </div>
        <hr>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>test@gmail.com</td>
                        <td>password</td>
                        <td>0704407644</td>
                        <td>Quoc Tuan</td>
                        <td>Admin</td>
                        <td>Online</td>
                        <td>
                            <a href="index.php?ac=account&act=edit" class="all-btn-management btn-outline-info">
                                <i class="fa fa-pen"></i>&nbsp;Update
                            </a>
                            &nbsp;&nbsp;
                            <a href="index.php?ac=account&act=delete" class="all-btn-management btn-outline-danger">
                                <i class="fa fa-trash"></i>&nbsp;Delete
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>