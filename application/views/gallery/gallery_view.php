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
                <li class="breadcrumb-item active">Gallery</li>

                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group">
                        
                    </div>
                </li>
            </ol>

            <div class="container-fluid">

                <div class="animated fadeIn">
                    <div class="col-lg-12">
                        
                    <div class="card">
                        <div class="card-body">
                            <table class="table datatable table-bordered table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;

                                        foreach($query as $row)
                                        {
                                    ?> 
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><a href="<?= base_url('uploads/gallery/'.$row->file_name); ?>"><?= $row->file_name; ?></a></td>
                                                <td>
                                                    <?php if($row->approve == 0){echo "<a class='btn btn-danger' href='".base_url('index.php/admin/gallery_approve/'.$row->id)."'>Not Approve</a>";}else{echo "<a class='btn btn-success' href='".base_url('index.php/admin/gallery_disapprove/'.$row->id)."'>Approve</a>";} ?>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $row->id; ?>"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                    <?php

                                            $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    </div>
                </div>
				<?php
					foreach($query as $row)
					{
						$delete = site_url()."/admin/gallery_delete/".$row->id;
				?> 
				<div class="modal fade" id="deleteModal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Delete <?= $row->photo_name; ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to delete <b><?= $row->photo_name; ?></b> ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="location.href='<?= $delete?>'" class="btn btn-primary">Delete</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
				<?php
					}
				?>
            </div>
            <!-- /.conainer-fluid -->

        </main>

    </div>

    <?php $this->load->view('template_data/footer'); ?>

    <?php $this->load->view('template_data/libs'); ?>

</body>

</html>