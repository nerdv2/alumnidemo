<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('template_data/head'); ?>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 p-4">
               <h1>Alumni SMA 12 '94 Admin Panel</h1>
            </div>
            <div class="col-md-8">
            
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-body">
                            <?= form_open() ?>
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <div class="text-danger">
                                <?php if (isset($error)) : ?>
                                    <?= $error ?>
                                <?php endif; ?>
                                <?php if (validation_errors()) : ?>
                                    <?= validation_errors() ?>
                                <?php endif; ?>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input type="text" name="usr" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input type="password" name="pwd" class="form-control" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" class="btn btn-primary px-4" value="Login">
                                </div>
                                <div class="col-6 text-right">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src="<?php echo base_url("assets/admin/node_modules/jquery/dist/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/admin/node_modules/popper.js/dist/umd/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/admin/node_modules/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>



</body>

</html>
