<?php defined('BASEPATH') or exit('gak oleh mlebu') ?>

<div class="content-wrapper" style="padding: 2%;">
	<div class="card ">
		<div class="card-header">
			<h3 class="card-title">Data Kategori Mobil</h3>
		</div>
		<div class="card-body p-0">
			<table class="table table-striped">
				<thead>
					<tr>
						<th style="width: 50px">No</th>
						<th></th>
						<th>Nama Kategori</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($kategori as $kategori1): ?>
						<tr>
							<td><?php echo $kategori1->id_kategori; ?></td>
							<td></td>
							<td><?php echo $kategori1->kategori; ?></td>
							<td>
								<div>
									<a class="fas fa-edit" style="color: #13d844;" id="back-to-top" href="<?= base_url('admin/pengelola/ambil_edit/' . $kategori1->id_kategori); ?>" class="btn btn-primary back-to-top mb-5" role="button" data-bs-toggle="modal"
										data-bs-toggle="modal" data-bs-target="#staticBackdrop1<?= $kategori1->id_kategori ?>"
										aria-label="Scroll to top">
									</a>
									<a class=" fas fa-trash mt-1" style="color: #f4301a;" onclick="confirmDeleteKategori(<?= $kategori1->id_kategori ?>);"></a>
									<!-- update kategori -->
									<div>
										<!-- Modal -->
										<div class="modal fade" id="staticBackdrop1<?= $kategori1->id_kategori ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
											aria-labelledby="staticBackdropLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="staticBackdropLabel">Update Nama Kategori</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url('editor/kategori/update') ?>" method="post">
															<input type="hidden" name="id_kategori" value="<?= $kategori1->id_kategori ?>">
															<div class="card-body">
																<div class="form-group">
																	<label>Nama Kategori</label>
																	<input class="form-control" type="text"
																		name="kategori" value="<?= $kategori1->kategori ?>" required>
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
									<!-- end update kategori -->
								</div>
							</td>	
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<!-- modal bootstrap -->
		<!-- tambah kategori -->
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
							<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori Mobil</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="<?= base_url('editor/kategori/tambah') ?>" method="post">
								<div class="card-body">
									<div class="form-group">
										<label>Kategori</label>
										<input class="form-control"
											placeholder="Kategori" name="kategori" required>
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