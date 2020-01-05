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
								<h2 class="text-white pb-2 fw-bold">Tambah Jadwal</h2>
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
										<h4 class="card-title">Informasi Jadwal</h4>
									</div>
									<p class="card-category">
									Anda dapat menambah jadwal mengajar.</p>
								</div>
								<div class="card-body">
									<form method="POST" action="<?php echo base_url('aktivitas/aktivitas_tambah_do') ?>">
									<div class="row">
										<div class="col-12 col-md-12">
											<div class="form-group">
												<label>Mata Kuliah</label>
												<select class="form-control" id="matkul" required name="matkul">
												    <option selected>Choose...</option>
												    <?php foreach ($matkul as $key => $mt): ?>
												    	<option value="<?php echo $mt->id_matkul ?>"><?php echo $mt->nama_matkul ?></option>
												    <?php endforeach ?>
												</select>
											</div>
											<div class="form-group">
												<label>Kelas</label>
												<select class="form-control" id="kelas" required name="kelas">
												    <option selected>Choose...</option>
												    <?php foreach ($kelas as $key => $value): ?>
												    	<option value="<?php echo $value->id_kelas ?>"><?php echo $value->nama_kelas ?></option>
												    <?php endforeach ?>
												</select>
											</div>
											<div class="form-group">
												<label>Jadwal Matakuliah</label>
											    <input type="datetime-local" class="form-control" id="jadwal" required name="waktu">
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
		<script type="text/javascript">
			$('#jadwal').change(function(event) {
				console.log($(this).val());
			});
		</script>
	</div>
	<?php $this->load->view('partials/footer-js.php'); ?>
	
</body>
</html>