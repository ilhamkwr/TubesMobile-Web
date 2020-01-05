<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('partials/head.php') ?>
</head>
<body>
	<script src="<?php echo base_url('assets/js/core/moment.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/core/timepicker.js') ?>"></script>
	<div class="wrapper">
		<div class="main-header">
			<?php $this->load->view('partials/main-header.php') ?>
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<?php $this->load->view('partials/sidebar.php') ?>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Tambah Matakuliah</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row row-card-no-pd">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<h4 class="card-title">Informasi Mata kuliah</h4>
									</div>
									<p class="card-category">
									Anda dapat menambah daftar Mata kuliah.</p>
								</div>
								<div class="card-body">
									<form method="POST" action="<?php echo base_url('aktivitas/matkulplus') ?>">
									<div class="row">
										<div class="col-12 col-md-12">
											<div class="form-group">
												<label>Nama Mata Kuliah</label>
												<input type="text" name="nama" class="form-control">
											</div>
										</div>
									</div>
									<!-- <?php 
											
											 ?> -->
									<div class="form-group float-left">
										<button type="submit"  class="btn btn-primary">Tambah</button>
										<span style="padding: 5px"></span>
										<input type="button" class="btn btn-primary btn-border" onclick="location.href='<?php echo base_url('aktivitas') ?>';" value="Batal">
									</div>		
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<?php $this->load->view('partials/footer.php'); ?>
			</footer>
		</div>
		
	</div>
	<?php $this->load->view('partials/footer-js.php'); ?>
	
</body>
</html>