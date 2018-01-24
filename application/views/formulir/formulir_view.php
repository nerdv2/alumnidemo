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
                <li class="breadcrumb-item active">Formulir</li>

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
                                        <th>Nama</th>
                                        <th>Kelas</th>
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
                                                <td><?= $row->name; ?></td>
                                                <td><?= $row->nmkelas; ?></td>
                                                <td><a href="<?= base_url('uploads/formulir/'.$row->photo_file); ?>"><?= $row->photo_file; ?></a></td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#detailModal<?= $row->id; ?>">Detail</button>
                                                    <?php if($row->approve == 0){echo "<a class='btn btn-danger' href='".base_url('index.php/admin/formulir_approve/'.$row->id)."'>Not Approve</a>";}else{echo "<a class='btn btn-success' href='".base_url('index.php/admin/formulir_disapprove/'.$row->id)."'>Approve</a>";} ?>
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
						$delete = site_url()."/admin/formulir_delete/".$row->id;
                ?> 
                <div class="modal fade" id="detailModal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-info" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Detail <?= $row->name; ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
								<div class="form-group row">
									<label for="name" class="col-sm-3 col-form-label">Nama</label>
									<div class="col-sm-9">
										<p class="form-control-plaintext">: <?= $row->name; ?></p>
									</div>
								</div>
								<div class="form-group row">
									<label for="ipAddress" class="col-sm-3 col-form-label">Nama Panggilan</label>
									<div class="col-sm-9">
										<p class="form-control-plaintext">: <?= $row->username; ?></p>
									</div>
								</div>
                                <div class="form-group row">
                                    <label for="ipAddress" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-plaintext">: <?= $row->email; ?></p>
                                    </div>
                                </div>
								<div class="form-group row">
									<label for="domain" class="col-sm-3 col-form-label">Phone</label>
									<div class="col-sm-9">
										<p class="form-control-plaintext">: <?= $row->phone; ?></p>
									</div>
								</div>
								<div class="form-group row">
									<label for="username" class="col-sm-3 col-form-label">Alamat</label>
									<div class="col-sm-9">
										<p class="form-control-plaintext">: <?= $row->address; ?></p>
									</div>
								</div>
                                <div class="form-group row">
									<label for="username" class="col-sm-3 col-form-label">Kota</label>
									<div class="col-sm-9">
										<p class="form-control-plaintext">: <?= $row->kota; ?></p>
									</div>
								</div>
								<div class="form-group row">
									<label for="password" class="col-sm-3 col-form-label">Kelas Terakhir</label>
									<div class="col-sm-9">
										<p class="form-control-plaintext">: <?= $row->nmkelas; ?></p>
									</div>
								</div>
								<div class="form-group row">
									<label for="description" class="col-sm-3 col-form-label">Pekerjaan Terakhir</label>
									<div class="col-sm-9">
										<p class="form-control-plaintext">: <?= $row->last_job; ?></p>
									</div>
								</div>
								<div class="form-group row">
									<label for="vpn" class="col-sm-3 col-form-label">Keahlian</label>
									<div class="col-sm-9">
										<p class="form-control-plaintext">: <?= $row->keahlian; ?></p>
									</div>
								</div>

                                <div class="form-group row">
                                    <label for="user_level" class="col-sm-3 col-form-label">Tempat Pilihan</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-plaintext">: <?= $row->nmtempat; ?></p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_level" class="col-sm-3 col-form-label">Waktu Pilihan</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-plaintext">: <?= $row->nmwaktu; ?></p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_level" class="col-sm-3 col-form-label">Pesan</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-plaintext">: <?= $row->pesan; ?></p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_level" class="col-sm-3 col-form-label">Twitter</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-plaintext">: <?= $row->twitter; ?></p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_level" class="col-sm-3 col-form-label">Facebook</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-plaintext">: <?= $row->facebook; ?></p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_level" class="col-sm-3 col-form-label">Instagram</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-plaintext">: <?= $row->instagram; ?></p>
                                    </div>
                                </div>
								
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
				<div class="modal fade" id="deleteModal<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-danger" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Delete <?= $row->name; ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to delete <b><?= $row->name; ?></b> ?</p>
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