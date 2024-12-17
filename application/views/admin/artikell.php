<?php defined('BASEPATH') or exit('gak oleh mlebu') ?>

<div class="content-wrapper" style="padding: 2%;">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Data Artikel</h3>
		</div>
		<div class="card-body p-0 table-responsive">
			<table class="table table-striped ">
				<thead>
					<tr>
						<th style="width: 50px">No</th>
						<th>Nama</th>
						<th>Status</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th>Merk</th>
						<th>Fitur</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $id_konten = 1;
					foreach ($artikel as $artikel1): ?>
						<tr>
							<td><?= $id_konten++ ?></td>
							<td><?= $artikel1->judul ?></td>
							<td><?php
								if ($artikel1->status == 'diinden') {
									$warna = 'bg-warning';
								} elseif ($artikel1->status == 'terjual') {
									$warna = 'bg-success';
								} elseif ($artikel1->status == 'tersedia') {
									$warna = 'bg-primary';
								} else {
									$warna = 'bg-secondary';
								}
								?>
								<span class="badge <?= $warna; ?>">
									<?php echo $artikel1->status; ?>
								</span>

								<!-- edit -->
								<a class="fas fa-edit ml-2" style="color: #13d844;" id="back-to-top" class="btn btn-primary back-to-top mb-5" role="button" data-bs-toggle="modal"
									data-bs-toggle="modal" data-bs-target="#staticBackdrop123456<?= $artikel1->id_konten ?>"
									aria-label="Scroll to top">
								</a>

								<!-- Modal update -->
								<div class="modal fade" id="staticBackdrop123456<?= $artikel1->id_konten ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
									aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h1 class="modal-title fs-5" id="staticBackdropLabel"><?= $artikel1->judul ?></h1>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<form action="<?= base_url('admin/artikel/update_status') ?>" method="post">
													<input type="hidden" name="id_konten" value="<?= $artikel1->id_konten ?>">
													<div class="card-body">
														<div class="form-group">
															<label>Status</label>
															<select name="status" id="" class="form-control">
																<option value="terjual">Terjual</option>
																<option value="tersedia">Tersedia</option>
																<option value="diinden">Diinden</option>
															</select>
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
								<!-- end modal update -->
								<!-- end edit -->
							</td>
							<td><?= $artikel1->kategori ?></td>
							<td class="d-flex"><?= $artikel1->harga_murah ?> - <?= $artikel1->harga_mahal ?><span style="color:blue; margin-left:5px;"> Juta</span> </td>
							<td><?= $artikel1->merk ?></td>
							<td>
								<a href="<?= base_url('admin/artikel/fitur/' . $artikel1->id_konten) ?>" class=" fas fa-search-plus mr-2"></a>
								<a href="<?= base_url('admin/artikel/fitur_tambah/' . $artikel1->id_konten) ?>" class="fas fa-plus"></a>
							</td>
							<td>
								<div>
									<a class="fas fa-search-plus" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $artikel1->id_konten ?>"></a>
									<!-- detail -->
									<div class="modal fade" id="staticBackdrop<?= $artikel1->id_konten ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Konten</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<p style="font-size:30px;"><strong><?= $artikel1->judul ?></strong></p>
													<div class="mb-3">
														<img style="width:100%; height:100%;" src="<?php echo base_url('AdminLTE-3.1.0/assets/upload/' . $artikel1->foto); ?>" alt="Foto tidak ada">
													</div>
													<p><?= $artikel1->deskripsi ?></p>
													<div class="d-flex" style="font-size: 14px; margin-left:30px;">
														<p><span class="fas fa-calendar mr-2"></span><?= $artikel1->tanggal ?></p>
														<p style="margin-left: 30px;"><span class="fas fa-user mr-2"></span><?= $artikel1->username ?></p>
														<p style="margin-left: 30px;"><span class="fas fa-car mr-2"></span><?= $artikel1->kategori ?></p>
														<p style="margin-left: 30px;"><span class="fas fa-coins mr-2"></span><?= $artikel1->harga_murah ?> - <?= $artikel1->harga_mahal ?></p>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!-- end detail -->

									<!-- edit -->
									<a class="fas fa-edit ml-2" style="color: #13d844;" id="back-to-top" href="<?= base_url('admin/pengelola/ambil_edit/' . $artikel1->id_konten); ?>" class="btn btn-primary back-to-top mb-5" role="button" data-bs-toggle="modal"
										data-bs-toggle="modal" data-bs-target="#staticBackdrop12345<?= $artikel1->id_konten ?>"
										aria-label="Scroll to top">
									</a>
									<!-- end edit -->

									<!-- hapus -->
									<a class=" fas fa-trash ml-2" style="color: #f4301a;" onclick="confirmDeleteArtikel('<?= $artikel1->foto ?>');"></a>

									<!-- Modal update -->
									<div class="modal fade" id="staticBackdrop12345<?= $artikel1->id_konten ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
										aria-labelledby="staticBackdropLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="staticBackdropLabel"><?= $artikel1->judul ?></h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form action="<?= base_url('admin/artikel/update') ?>" method="post" enctype="multipart/form-data">
														<input type="hidden" name="id_konten" value="<?= $artikel1->id_konten ?>">
														<input type="hidden" name="foto_lama" value="<?= $artikel1->foto ?>">
														<div class="card-body">
															<div class="form-group">
																<label>Judul</label>
																<input class="form-control" type="text"
																	name="judul" value="<?= $artikel1->judul ?>" required>
															</div>
															<div class="form-grup">
																<label for="">Kategori</label>
																<select name="id_kategori" id="" class="form-control">
																	<?php foreach ($kategori as $bbb): ?>
																		<option value="<?= $bbb->id_kategori ?>" <?= ($bbb->id_kategori == $artikel1->id_kategori) ? 'selected' : '' ?>>
																			<?= $bbb->kategori ?>
																		</option>
																	<?php endforeach; ?>
																</select>
															</div>
															<div class="form-grup">
																<label>Merk</label>
																<select name="id_merk" class="form-control">
																	<?php foreach ($merk as $aa): ?>
																		<option value="<?= $aa->id_merk ?>"><?= $aa->merk ?></option>
																	<?php endforeach; ?>
																</select>
															</div>
															<div class="form-group">
																<label>Harga Termurah</label>
																<input class="form-control" type="text"
																	name="harga_murah" id="harga" value="<?= $artikel1->harga_murah ?>" required>
															</div>
															<div class="form-group">
																<label>Harga Termahal</label>
																<input class="form-control" type="text"
																	name="harga_mahal" id="harga" value="<?= $artikel1->harga_mahal ?>" required>
															</div>
															<div class="form-grup">
																<label>Deskripsi</label>
																<textarea type="text" class="form-control" name="deskripsi"><?= trim($artikel1->deskripsi) ?></textarea>
															</div>
															<div class="form-group">
																<label>Foto</label>
																<input class="form-control"
																	type="file" name="foto" accept="image/png, image/jpeg" required>
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
															<button type="submit" class="btn btn-primary">Update</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- end modal update -->
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<!-- tambah kategori -->
		<div>
			<a id="back-to-top" href="#" class="btn btn-primary back-to-top mb-5" role="button" data-bs-toggle="modal"
				data-bs-target="#staticBackdrop123" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
				aria-label="Scroll to top">
				<i class="fas  fa-solid fa-plus fa-2xl"></i>
			</a>
			<!-- Modal -->
			<div class="modal fade" id="staticBackdrop123" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
				aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Konten</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="<?= base_url('admin/artikel/tambah') ?>" method="post" enctype="multipart/form-data">
								<div class="card-body">
									<div class="form-group">
										<label>Judul</label>
										<input class="form-control"
											placeholder="judul" name="judul" required>
									</div>
									<div class="form-group">
										<label>Kategori</label>
										<select name="id_kategori" class="form-control">
											<?php foreach ($kategori as $aaa): ?>
												<option value="<?= $aaa->id_kategori ?>"><?= $aaa->kategori ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-grup">
										<label>Merk</label>
										<select name="id_merk" class="form-control">
											<?php foreach ($merk as $bbb): ?>
												<option value="<?= $bbb->id_merk ?>"><?= $bbb->merk ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<label>Harga Termurah</label>
										<input class="form-control" type="text"
											name="harga_murah" id="harga" required>
									</div>
									<div class="form-group">
										<label>Harga Termahal</label>
										<input class="form-control" type="text"
											name="harga_mahal" id="harga" required>
									</div>
									<div class="form-group">
										<label>Deskripsi</label>
										<textarea name="deskripsi" class="form-control" required></textarea>
									</div>
									<div class="form-group">
										<label>Foto</label>
										<input class="form-control"
											placeholder="" type="file" name="foto" accept="image/png, image/jpeg" required>
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
	</div>
</div>