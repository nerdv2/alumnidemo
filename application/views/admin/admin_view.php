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
                <li class="breadcrumb-item active">Dashboard</li>

                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group">

                    </div>
                </li>
            </ol>

            <div class="container-fluid">

                <div class="animated fadeIn">
                    <div class="col-lg-12">

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