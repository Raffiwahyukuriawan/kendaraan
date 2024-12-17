<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v1</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?php echo $jumlah_konten ?></h3>

							<p>Konten Yang Tersedia</p>
						</div>
						<div class="icon">
							<i class="fas fa-database"></i>
						</div>
						<a href="<?= base_url('admin/artikel') ?>" class="small-box-footer">More info <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo $pengunjung ?></h3>

							<p>Pengunjung</p>
						</div>
						<div class="icon">
							<i class="fas fa-chart-bar"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?php echo $registrasi ?></h3>

							<p>User Registrations</p>
						</div>
						<div class="icon">
							<i class="fas fa-user-plus"></i>
						</div>
						<a href="<?= base_url('admin/pengelola') ?>" class="small-box-footer">More info <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?php echo $komentar ?></h3>

							<p>Komentar</p>
						</div>
						<div class="icon">
							<i class="fas fa-comments"></i>
						</div>
						<a href="<?= base_url('admin/komentar') ?>" class="small-box-footer">More info <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
			<!-- Main row -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<h5 class="">Table Daftar Mobil</h5>
								</div>
								<!-- /.card-header -->
								<div class="card-body" style="height: 200px; overflow-y:auto; border: 1px #ccc;">
									<table class="table table-bordered" style="width:100%; border-collapse:collapse;">
										<thead>
											<tr>
												<th style="width: 10px">#</th>
												<th>Mobil</th>
												<th>Status</th>
												<th style="width: 40px">Harga</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($artikel as $aaa):
											?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $aaa->judul ?></td>
													<td><?php
														if ($aaa->status == 'diinden') {
															$warna = 'bg-warning';
														} elseif ($aaa->status == 'terjual') {
															$warna = 'bg-success';
														} elseif ($aaa->status == 'tersedia') {
															$warna = 'bg-primary';
														} else {
															$warna = 'bg-secondary';
														}
														?>
														<span class="badge <?= $warna; ?>">
															<?php echo $aaa->status; ?>
														</span>
													</td>
													<td><span class="badge bg-danger">Rp. <?= $aaa->harga_murah ?> - <?= $aaa->harga_mahal ?> Juta</span></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
								<div class="card-footer clearfix">
									<a href="<?= base_url('admin/artikel') ?>" class="small-box-footer">More info <i
											class="fas fa-arrow-circle-right"></i>
									</a>
								</div>
							</div>
							<!-- /.card -->

							<!-- komentar -->
							<div class="card direct-chat direct-chat-primary">
								<div class="card-header ui-sortable-handle" style="cursor: move;">
									<h3 class="card-title">Direct Chat</h3>

									<div class="card-tools">
										<span title="3 New Messages" class="badge badge-primary"><?= $komentar ?></span>
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
											<i class="fas fa-comments"></i>
										</button>
										<button type="button" class="btn btn-tool" data-card-widget="remove">
											<i class="fas fa-times"></i>
										</button>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<!-- Conversations are loaded here -->
									<div class="direct-chat-messages" style="height: 200px; overflow-y:auto; border: 1px #ccc;">
										<?php foreach ($messages as $msg): ?>
											<div class="direct-chat-msg" style="width:100%; border-collapse:collapse;">
												<div class="direct-chat-infos clearfix">
													<span class="direct-chat-timestamp float-right"><?= date('d M', strtotime($msg->tanggal)) ?></span>
												</div>
												<span class="direct-chat-name float-left"><?= $msg->nama ?></span>
												<div class="direct-chat-text">
													<a href="#" style="text-decoration: none;"><?= $msg->judul ?></a> <?= $msg->keterangan ?>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
									<!--/.direct-chat-messages-->

								</div>
								<!-- /.card-body -->
								<div class="card-footer">
									<form action="<?= base_url('admin/dashmin/komentar') ?>" method="post">
										<div class="input-group">
											<input type="text" name="judul" placeholder="Nama Mobil ..." class="form-control">
											<input type="text" name="keterangan" placeholder="Type Message ..." class="form-control">
											<span class="input-group-append">
												<button type="submit" class="btn btn-primary">
													Send
												</button>
											</span>
										</div>
									</form>
								</div>
								<!-- /.card-footer-->
								 
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Tabel Inden Mobil</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body" style="height: 200px; overflow-y:auto; border: 1px #ccc;">
									<table class="table table-bordered" style="width:100%; border-collapse:collapse;">
										<thead>
											<tr>
												<th style="width: 10px">#</th>
												<th>Tanggal</th>
												<th>Mobil</th>
												<th>Status</th>
												<th>Nama Pemesan</th>
												<th style="width: 40px">Tanggal kunjungan</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($inden as $aaa):
											?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $aaa->tanggal ?></td>
													<td><?= $aaa->nama_mobil ?></td>
													<td><?php
														if ($aaa->status_inden == 'diinden') {
															$warna = 'bg-warning';
														} elseif ($aaa->status_inden == 'terjual') {
															$warna = 'bg-success';
														} elseif ($aaa->status_inden == 'tersedia') {
															$warna = 'bg-primary';
														} else {
															$warna = 'bg-secondary';
														}
														?>
														<span class="badge <?= $warna; ?>">
															<?php echo $aaa->status_inden; ?>
														</span>
													</td>
													<td><?= $aaa->nama_pemesan ?></td>
													<td><span class="badge bg-danger"><?= $aaa->tanggal_kunjungan ?></span></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<div class="card-footer clearfix">
									<a href="<?= base_url('admin/mobil_inden') ?>" class="small-box-footer">More info <i
											class="fas fa-arrow-circle-right"></i>
									</a>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->

							<div class="card">
								<div class="card-header">
									<h5>Background Utama</h5>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-3">
									<img src="<?php echo base_url('AdminLTE-3.1.0/assets/carousel/' . $bg_utama->foto); ?>" alt="ra metu gambar e" width="100%" height="100%">
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
				</div>
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>

	<!-- /.content -->
</div>