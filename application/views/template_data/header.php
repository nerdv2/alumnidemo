    <header class="app-header navbar">

        <ul class="nav navbar-nav ml-auto pr-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-md-down-none"><?= $_SESSION['username']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div>
                    <a class="dropdown-item" href="<?= base_url('index.php/admin/changepass'); ?>"><i class="fa fa-key"></i> Change Password</a>
                    <a class="dropdown-item" href="<?= base_url('index.php/admin/logout'); ?>"><i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
        </ul>

    </header>