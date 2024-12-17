<?php defined('BASEPATH') or exit('gak oleh mlebu') ?>

<div class="card content-wrapper" style="padding: 2%;">
    <div class="card-header border-0">
        <h3 class="card-title">Data Client</h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Pekerjaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_client = 1;
                foreach ($client as $klien): ?>
                    <tr>
                        <td><?= $id_client++ ?></td>
                        <td><?= $klien->nama ?></td>
                        <td>
                            <?= $klien->pekerjaan ?>
                        </td>
                        <td>
                            <div>
                                <a class="fas fa-search-plus" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $klien->id_client ?>"></a>
                                <!-- detail -->
                                <div class="modal fade" id="staticBackdrop<?= $klien->id_client ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Konten</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="font-size:30px;"><strong><?= $klien->nama ?></strong></p>
                                                <div class="mb-3">
                                                    <img style="width:100%; height:100%;" src="<?php echo base_url('AdminLTE-3.1.0/assets/client/' . $klien->foto); ?>" alt="Foto tidak ada">
                                                </div>
                                                <p><?= $klien->deskripsi ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end detail -->
                                <a class="fas fa-edit ml-2" style="color: #13d844;" id="back-to-top" href="<?= base_url('admin/client/edit/' . $klien->id_client); ?>" class="btn btn-primary back-to-top mb-5" role="button" data-bs-toggle="modal"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop1<?= $klien->id_client ?>"
                                    aria-label="Scroll to top">
                                </a>

                                <a class=" fas fa-trash ml-2" style="color: #f4301a;" onclick="confirmDeleteClient('<?= $klien->foto ?>');"></a>
                            </div>

                        </td>


                        <!-- update kategori -->
                        <div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop1<?= $klien->id_client ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Client</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/client/update') ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id_client" value="<?= $klien->id_client ?>">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input class="form-control" type="text"
                                                            name="nama" value="<?= $klien->nama ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Deskripsi</label>
                                                        <input class="form-control" type="text"
                                                            name="deskripsi" value="<?= $klien->deskripsi ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pekerjaan</label>
                                                        <input class="form-control" type="text"
                                                            name="pekerjaan" value="<?= $klien->pekerjaan ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                        <input class="form-control" type="file"
                                                            name="foto" accept="image/png, image/jpeg" required>
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
                            <!-- end modal -->
                        </div>
                        <!-- end update kategori -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Client</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/client/tambah') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control"
                                        placeholder="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control"
                                        placeholder="Deskripsi" name="deskripsi" style="text-align:left;" dir="ltr">
                                     </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="Pekrjaan" name="pekerjaan" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1"
                                        name="foto" accept="image/png, image/jpeg" required>
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