<?php defined('BASEPATH') or exit('gak oleh mlebu') ?>

<div class="content-wrapper" style="padding: 2%;">

	<div class="card ">
		<div class="card-header">
			<h3 class="card-title">Data Pengelola</h3>
		</div>
		<div class="card-body p-0">
			<table class="table table-striped">
				<thead>
					<tr>
						<th style="width: 10px">No</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Password </th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($admin as $admin1): ?>
						<tr>
							<td><?php echo $admin1->id_user; ?></td>
							<td><?php echo $admin1->nama; ?></td>
							<td><?php echo $admin1->username; ?></td>
							<td><?php echo $admin1->password; ?></td>
							<td><?php echo $admin1->level; ?></td>
							<td>
								<div class="f-flex">
									<a class="fas fa-search-plus" data-bs-toggle="modal" data-bs-target="#staticBackdropDetail<?= $admin1->id_user ?>"></a>
									<!-- detail -->
									<div class="modal fade" id="staticBackdropDetail<?= $admin1->id_user ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Blog</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<p style="font-size:30px;"><strong><?= $admin1->nama ?></strong></p>
													<div class="mb-3">
														<img style="width:100%; height:100%;" src="<?php echo base_url('AdminLTE-3.1.0/assets/foto_user/' . $admin1->foto_user); ?>" alt="Foto tidak ada">
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!-- end detail -->
									<a class="fas fa-edit" style="color: #13d844;" id="back-to-top" href="<?= base_url('admin/pengelola/ambil_edit/' . $admin1->id_user); ?>" class="btn btn-primary back-to-top mb-5" role="button" data-bs-toggle="modal"
										data-bs-toggle="modal" data-bs-target="#staticBackdrop1<?= $admin1->id_user ?>"
										aria-label="Scroll to top">
									</a>

									<a class=" fas fa-trash mt-1" style="color: #f4301a;" onclick="confirmDelete('<?= $admin1->foto_user ?>');"></a>

									<!-- update admin -->
									<div>
										<!-- Modal -->
										<div class="modal fade" id="staticBackdrop1<?= $admin1->id_user ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
											aria-labelledby="staticBackdropLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="staticBackdropLabel">Update Nama</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url('admin/pengelola/update_admin') ?>" method="post" enctype="multipart/form-data">
															<input type="hidden" name="id_user" value="<?= $admin1->id_user ?>">
															<div class="card-body">
																<div class="form-group">
																	<label>Nama</label>
																	<input class="form-control" type="text"
																		name="nama" value="<?= $admin1->nama ?>" required>
																</div>
																<div class="form-group">
																	<label>Foto</label>
																	<input type="file" class="form-control"
																		placeholder="Foto" name="foto_user" required>
																</div>
																<div class="form-check">
																	<input type="checkbox" class="form-check-input" id="exampleCheck1">
																	<label class="form-check-label" for="exampleCheck1">Check me out</label>
																</div>
															</div>
															<!-- /.card-body -->
															<div class="modal-footer">
																<button type="button" class="btn btn-danger"
																	data-bs-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary">Update</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- end modal -->
									</div>
									<!-- end update admin -->

								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<!-- modal bootstrap -->
		<!-- tambah admin -->
		<div>
			<a id="back-to-top" href="#" class="btn btn-primary back-to-top mb-5" role="button" data-bs-toggle="modal"
				data-bs-target="#staticBackdrop" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
				aria-label="Scroll to top">
				<i class="fas  fa-solid fa-plus fa-2xl"></i>
			</a>
			<!-- Modal -->
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
				aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Admin</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="<?= base_url('admin/pengelola/tambah') ?>" method="post" enctype="multipart/form-data">
								<div class="card-body">
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control"
											placeholder="nama" name="nama" required>
									</div>
									<div class="form-group">
										<label>Username</label>
										<input class="form-control"
											placeholder="username" name="username" required>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<input type="password" class="form-control" id="exampleInputPassword1"
											placeholder="Password" name="password" required>
									</div>
									<div class="form-group">
										<label for="exampleInputFile">Level</label>
										<div class="input-group">
											<select class="custom-select rounded-0" id="exampleSelectRounded0" name="level" required>
												<option>Admin</option>
												<option>Editor</option>
												<option>Pengguna</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label>Foto</label>
										<input type="file" class="form-control"
											placeholder="Foto" name="foto_user" required>
									</div>
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="exampleCheck1" required>
										<label class="form-check-label" for="exampleCheck1">Check me out</label>
									</div>
								</div>
								<!-- /.card-body -->
								<div class="modal-footer">
									<button type="button" class="btn btn-danger"
										data-bs-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- end Modal -->
		</div>
		<!-- end tambah admin -->
		<!-- end modal bootstrap -->
	</div>
</div>