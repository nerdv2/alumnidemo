<!DOCTYPE HTML>
<!--
	Story by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Alumni SMA 12 '94</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" type="image/png" href="<?= base_url("images/logo.png"); ?>"/>
		<link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css"); ?>" />
		<link rel="stylesheet" href="<?= base_url("assets/css/main.css"); ?>" />
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- One -->
					<section class="banner style1 orient-left content-align-left fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="content">
							<h1>Alumni SMA 12 '94</h1>
							<p class="major">Selamat datang ke halaman website alumni SMA 12 tahun 1994.</p>
							<ul class="actions vertical">
								<li><a href="#formulir" class="button big wide smooth-scroll-middle">Isi Formulir</a></li>
								<li><a href="#gallery" class="button big wide smooth-scroll-middle">Gallery Photo</a></li>
								<li><a href="#dataalumni" class="button big wide smooth-scroll-middle">Data Alumni</a></li>
							</ul>
						</div>
						<div class="image" style="background-color: rgba(0,0,0,0) !important;">
							<img style="padding-top:50px;" src="<?= base_url("images/logo.png"); ?>" alt="" />
						</div>
					</section>

				<!-- Two -->
					<section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in" id="first">
						<div class="content">
							<h2><?= $header->title; ?></h2>
							<p><?= $header->text; ?></p>
						</div>
					</section>

				<!-- Five -->
					<section class="wrapper style1 align-center">
						<div class="inner">
							<h2>Galery</h2>
							<p>Kumpulan foto lama kita, merenungkan masa indah dunia sekolah.</p>

							<ul class="actions vertical">
								<li><a href="#" data-toggle="modal" data-target="#uploadFoto" class="button big wide smooth-scroll-middle">Upload Foto Lama</a></li>
							</ul>
						</div>

						<!-- Gallery -->
							<div class="gallery style2 medium lightbox onscroll-fade-in" id="gallery">
								<?php
									shuffle($gallery);
									foreach ($gallery as $list) {
										if($list->approve == 1) {
								?>
									<article>
										<a href="<?= base_url("uploads/gallery/".$list->file_name); ?>" class="image">
											<img src="<?= base_url("uploads/gallery/".$list->file_name); ?>" alt="<?= $list->photo_name; ?>" />
										</a>
										<div class="caption">
											<h3><?= $list->photo_name; ?></h3>
											<p><?= $list->photo_desc; ?></p>
											<ul class="actions">
												<li><span class="button small">Details</span></li>
											</ul>
										</div>
									</article>
								<?php
									}}
								?>
								
							</div>

					</section>

				<!-- Six -->
					<section class="wrapper style1 align-center" id="dataalumni">
						<div class="inner">
							<h2>Alumni SMA 12 '94</h2>
							<p>Data teman-teman kita semua, teman yang kita banggakan dan cintai semua.</p>
							<!-- Gallery -->
							<?php
								foreach($kelas as $listkelas) {

							?>
							<div class='gallery style2 medium lightbox onscroll-fade-in hidden' id='galleryclass-<?=$listkelas['id'];?>'>
								<?php
									foreach ($formulir as $list) {
										if($list->approve == 1 && $list->lastclass == $listkelas['id']) {
								?>
									<article>
										<a href="<?= base_url("uploads/formulir/".$list->photo_file); ?>" class="image">
											<img src="<?= base_url("uploads/formulir/".$list->photo_file); ?>" alt="<?= $list->name; ?>" />
										</a>
										<div class="caption">
											<h3><?= $list->name; ?></h3>
											<p><?= $list->kota; ?></p>
											<p><?= $list->nmkelas; ?></p>
											<ul class="icons">
												<li><a href="https://twitter.com/<?=$list->twitter;?>" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="https://facebook.com/<?=$list->facebook;?>" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
												<li><a href="https://instagram.com/<?=$list->instagram;?>" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="mailto:<?=$list->email;?>" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
											</ul>
										</div>
									</article>
								<?php
									}}
								?>
							</div>
							<?php
								}
							?>
						</div>
						<div class="inner">
							<ul class="actions">
								<?php
									$i = 0;
									$length = count($kelas);
									foreach ($kelas as $list) {
										if ($i == $length - 1) {
											echo '<li class="menuclasslist-last"><a href="#dataalumni" class="galleryclass-'.$list['id'].'">'.$list['name'].'</a></li>';
										} else {
											echo '<li class="menuclasslist galleryclass-'.$list['id'].'"><a href="#dataalumni" class="galleryclass-'.$listkelas['id'].'">'.$list['name'].'</a></li>';
										}
										$i++;
									}
								?>
							</ul>
						</div>
					</section>

				<!-- Seven -->
					<section class="wrapper style1 align-center" id="formulir">
						<div class="inner medium">
							<h2>Get in touch</h2>
							<?php echo validation_errors(); ?>
							<?= form_open_multipart('mainController/inputformulir'); ?>
								<div class="field half first">
									<label for="name">Nama sesuai KTP*</label>
									<input type="text" name="name" id="name" value="" required />
								</div>
								<div class="field half">
									<label for="email">Email</label>
									<input type="email" name="email" id="email" value="" />
								</div>
								<div class="field half first">
									<label for="nama_panggilan">Nama panggilan waktu SMA*</label>
									<input type="text" name="nama_panggilan" id="nama_panggilan" value="" required />
								</div>
								<div class="field half">
									<label for="no_hp">No. HP*</label>
									<input type="text" name="no_hp" id="no_hp" value="" required />
								</div>
								<div class="field">
									<label for="alamat">Alamat*</label>
									<textarea name="alamat" id="alamat" rows="4" required></textarea>
								</div>
								<div class="field">
									<label for="kota">Kota*</label>
									<input type="text" name="kota" id="kota" value="" required />
								</div>
								<div class="field">
									<label for="kelas_terakhir">Kelas Terakhir*</label>
									<select name="kelas_terakhir" required>
										<option value="">Pilih Kelas</option>
										<?php
											foreach($kelas as $list) {
												echo "<option value='". $list['id'] . "'>" . $list['name'] . "</option>";
											}
										?>
									</select>
								</div>
								<div class="field">
									<label for="photo_file">Foto (jaman dahulu atau yang saat ini)*</label>
									<input type="file" id="photo_file" class="form-control" name="photo_file" accept="image/*" required>
								</div>

								<hr>

								<div class="field half first">
									<label for="last_job">Pekerjaan Terakhir</label>
									<input type="text" name="last_job" id="last_job" value="" />
								</div>

								<div class="field half">
									<label for="keahlian">Bidang Keahlian</label>
									<input type="text" name="keahlian" id="keahlian" value="" />
								</div>

								<div class="field">
									<label>Dimanakah tempat yang paling baik untuk dilaksanakannya acara?</label>
									<input type="radio" name="tempat_pilihan" id="kampus12" value="0">
									<label for="kampus12">Kampus SMA 12</label>
									<input type="radio" name="tempat_pilihan" id="auditorium" value="1">
									<label for="auditorium">Auditorium Hotel</label>
									<input type="radio" name="tempat_pilihan" id="resto" value="2">
									<label for="resto">Resto / Cafe</label>
									<input type="radio" name="tempat_pilihan" id="tempatwisata" value="3">
									<label for="tempatwisata">Taman / Tempat Wisata</label>
								</div>

								<div class="field">
									<label>Kapankah waktu yang paling tepat untuk dilaksanakannya acara?</label>
									<input type="radio" name="waktu_pilihan" id="feb19" value="0">
									<label for="feb19">Februari 2019</label>
									<input type="radio" name="waktu_pilihan" id="mei19" value="1">
									<label for="mei19">Mei 2019</label>
									<input type="radio" name="waktu_pilihan" id="jul19" value="2">
									<label for="jul19">Juli 2019</label>
									<input type="radio" name="waktu_pilihan" id="sep19" value="3">
									<label for="sep19">September 2019</label>
								</div>

								<div class="field">
									<label for="pesan">Pesan anda untuk acara?</label>
									<input type="text" name="pesan" id="pesan" value="" />
								</div>

								<hr>

								<div class="field half first">
									<label for="twitter">Twitter</label>
									<input type="text" name="twitter" id="twitter" placeholder="Contoh: twitteranda (tanpa @)" />
								</div>

								<div class="field half">
									<label for="facebook">Facebook</label>
									<input type="text" name="facebook" id="facebook" placeholder="Contoh: abraham.lincoln" />
								</div>

								<div class="field">
									<label for="instagram">Instagram</label>
									<input type="text" name="instagram" id="instagram" placeholder="" />
								</div>

								<ul class="actions">
									<li><input type="submit" name="submit" id="submit" value="Send Formulir" /></li>
								</ul>
							<?= form_close(); ?>

						</div>
					</section>

				<!-- Footer -->
					<footer class="wrapper style1 align-center">
						<div class="inner">
							<ul class="icons">
								<li><a href="https://www.facebook.com/groups/47896211946/" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
							</ul>
							<img style="width: 15%;" src="<?= base_url('images/logo.png'); ?>" alt="Logo" />
							<img style="width: 20%;padding-bottom: 10px;padding-left: 20px;" src="<?= base_url('images/logokjg.png'); ?>" alt="Logo KJG" />
							<p>&copy; Alumni SMA 12 '94. Programmed by: Gema Aji Wardian. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
						</div>
					</footer>

			</div>

			<div class="modal" tabindex="-1" role="dialog" id="modalsuccess">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Input Formulir</h5>
						</button>
					</div>
					<div class="modal-body">
						Input Formulir berhasil!
					</div>
					<div class="modal-footer">
						<button type="button" class="button small" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>

			<div class="modal" tabindex="-1" role="dialog" id="modalfailed">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Input Formulir</h5>
						</button>
					</div>
					<div class="modal-body">
						Input Formulir gagal!
					</div>
					<div class="modal-footer">
						<button type="button" class="button small" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>

			<div class="modal" tabindex="-1" role="dialog" id="modaluploadsuccess">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Input Photo Lama</h5>
						</button>
					</div>
					<div class="modal-body">
						Input Photo Lama berhasil, foto akan muncul dihalaman setelah diapprove!
					</div>
					<div class="modal-footer">
						<button type="button" class="button small" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>

			<div class="modal" tabindex="-1" role="dialog" id="modaluploadfailed">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Input Photo Lama</h5>
						</button>
					</div>
					<div class="modal-body">
						Input Photo Lama gagal!
					</div>
					<div class="modal-footer">
						<button type="button" class="button small" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>

			<div class="modal" tabindex="-1" role="dialog" id="uploadFoto">
				<?= form_open_multipart('mainController/uploadfoto'); ?>
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Upload Foto (satu atau jamak)</h5>
							</button>
						</div>
						<div class="modal-body">
							<div class="field">
								<input type="file" class="form-control" name="photo_file[]" accept="image/*" multiple />
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="button small" value="Upload Photo">
							<button type="button" class="button small" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
				<?= form_close(); ?>
			</div>

		<!-- Scripts -->
			<script src="<?= base_url("assets/js/jquery.min.js"); ?>"></script>
			<script src="<?= base_url("assets/js/jquery.scrollex.min.js"); ?>"></script>
			<script src="<?= base_url("assets/js/jquery.scrolly.min.js"); ?>"></script>
			<script src="<?= base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>
			<script src="<?= base_url("assets/js/skel.min.js"); ?>"></script>
			<script src="<?= base_url("assets/js/util.js"); ?>"></script>
			<script src="<?= base_url("assets/js/main.js"); ?>"></script>

			<script>
				$(document).ready(function () {
					if(window.location.href.indexOf("#inputsuccess") > -1) {
						$("#modalsuccess").modal('show');
					}
					if(window.location.href.indexOf("#inputfailed") > -1) {
						$("#modalfailed").modal('show');
					}
					if(window.location.href.indexOf("#uploadsuccess") > -1) {
						$("#modaluploadsuccess").modal('show');
					}
					if(window.location.href.indexOf("#uploadfailed") > -1) {
						$("#modaluploadfailed").modal('show');
					}
					$("#galleryclass-1").removeClass('hidden');

					$(".galleryclass-1").on('click', function() {
						$("#galleryclass-1").removeClass('hidden');
						$("#galleryclass-2").addClass('hidden');
						$("#galleryclass-3").addClass('hidden');
						$("#galleryclass-4").addClass('hidden');
						$("#galleryclass-9").addClass('hidden');
						$("#galleryclass-10").addClass('hidden');
						$("#galleryclass-11").addClass('hidden');
						$("#galleryclass-12").addClass('hidden');
					});

					$(".galleryclass-2").on('click', function() {
						$("#galleryclass-1").addClass('hidden');
						$("#galleryclass-2").removeClass('hidden');
						$("#galleryclass-3").addClass('hidden');
						$("#galleryclass-4").addClass('hidden');
						$("#galleryclass-9").addClass('hidden');
						$("#galleryclass-10").addClass('hidden');
						$("#galleryclass-11").addClass('hidden');
						$("#galleryclass-12").addClass('hidden');
					});

					$(".galleryclass-3").on('click', function() {
						$("#galleryclass-1").addClass('hidden');
						$("#galleryclass-2").addClass('hidden');
						$("#galleryclass-3").removeClass('hidden');
						$("#galleryclass-4").addClass('hidden');
						$("#galleryclass-9").addClass('hidden');
						$("#galleryclass-10").addClass('hidden');
						$("#galleryclass-11").addClass('hidden');
						$("#galleryclass-12").addClass('hidden');
					});

					$(".galleryclass-4").on('click', function() {
						$("#galleryclass-1").addClass('hidden');
						$("#galleryclass-2").addClass('hidden');
						$("#galleryclass-3").addClass('hidden');
						$("#galleryclass-4").removeClass('hidden');
						$("#galleryclass-9").addClass('hidden');
						$("#galleryclass-10").addClass('hidden');
						$("#galleryclass-11").addClass('hidden');
						$("#galleryclass-12").addClass('hidden');
					});

					$(".galleryclass-9").on('click', function() {
						$("#galleryclass-1").addClass('hidden');
						$("#galleryclass-2").addClass('hidden');
						$("#galleryclass-3").addClass('hidden');
						$("#galleryclass-4").addClass('hidden');
						$("#galleryclass-9").removeClass('hidden');
						$("#galleryclass-10").addClass('hidden');
						$("#galleryclass-11").addClass('hidden');
						$("#galleryclass-12").addClass('hidden');
					});

					$(".galleryclass-10").on('click', function() {
						$("#galleryclass-1").addClass('hidden');
						$("#galleryclass-2").addClass('hidden');
						$("#galleryclass-3").addClass('hidden');
						$("#galleryclass-4").addClass('hidden');
						$("#galleryclass-9").addClass('hidden');
						$("#galleryclass-10").removeClass('hidden');
						$("#galleryclass-11").addClass('hidden');
						$("#galleryclass-12").addClass('hidden');
					});

					$(".galleryclass-11").on('click', function() {
						$("#galleryclass-1").addClass('hidden');
						$("#galleryclass-2").addClass('hidden');
						$("#galleryclass-3").addClass('hidden');
						$("#galleryclass-4").addClass('hidden');
						$("#galleryclass-9").addClass('hidden');
						$("#galleryclass-10").addClass('hidden');
						$("#galleryclass-11").removeClass('hidden');
						$("#galleryclass-12").addClass('hidden');
					});

					$(".galleryclass-12").on('click', function() {
						$("#galleryclass-1").addClass('hidden');
						$("#galleryclass-2").addClass('hidden');
						$("#galleryclass-3").addClass('hidden');
						$("#galleryclass-4").addClass('hidden');
						$("#galleryclass-9").addClass('hidden');
						$("#galleryclass-10").addClass('hidden');
						$("#galleryclass-11").addClass('hidden');
						$("#galleryclass-12").removeClass('hidden');
					});
				});
				
				
			</script>

	</body>
</html>