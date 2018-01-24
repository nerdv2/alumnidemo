<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('template_data/head'); ?>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <?php $this->load->view('template_data/header'); ?>

    <div class="app-body">
        <?php $this->load->view('template_data/sidebar'); ?>

        <!-- Main content -->
        <main class="main">

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item">Header</li>

                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a class="btn" href="javascript:;" onclick="submit_form();"><i class="fa fa-save"></i> &nbsp;Save</a>
                        <a class="btn" href="<?= base_url('index.php/database'); ?>"><i class="icon-arrow-left"></i> &nbsp;Back</a>
                    </div>
                </li>
            </ol>

            <div class="container-fluid">

                <div class="animated fadeIn">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12">
                                <?= form_open('', 'class="formdata"'); ?>

                                    <?php if (validation_errors()) : ?>
                                        <div class="col-md-12">
                                            <div class="alert alert-danger" role="alert">
                                                <?= validation_errors() ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label" for="text-input">Title <sup class="text-danger">*</sup></label>
                                        <div class="col-md-9">
                                            <input type="text" id="text-input" name="title" value="<?= $query->title; ?>" class="form-control" data-parsley-required="true" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 form-control-label" for="text-input">Text <sup class="text-danger">*</sup></label>
                                        <div class="col-md-9">
                                            <textarea name="text" class="form-control" data-parsley-required="true" required><?= $query->text; ?></textarea>
                                        </div>
                                    </div>

                                </form>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>


            </div>
            <!-- /.conainer-fluid -->

        </main>

    </div>

    <?php $this->load->view('template_data/footer'); ?>

    <?php $this->load->view('template_data/libs'); ?>

</body>

</html>