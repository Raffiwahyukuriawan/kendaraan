<?php defined('BASEPATH') or exit('gak oleh mlebu') ?>

<div class="card content-wrapper" style="padding: 2%;">
    <div class="card-header border-0">
        <h3 class="card-title">Data Merk Mobil</h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                foreach ($merk as $aaa): ?>
                    <tr>
                        <td><?= $id++ ?></td>
                        <td><?= $aaa->merk ?></td>
                        <td>
                            <img style="width:10%; height:10%;" src="<?php echo base_url('AdminLTE-3.1.0/assets/merk/' . $aaa->logo); ?>" alt="Logo tidak ada">
                        </td>
                        <td>
                            <div>
                                <a class="fas fa-edit ml-2" style="color: #13d844;" id="back-to-top" class="btn btn-primary back-to-top mb-5" role="button" data-bs-toggle="modal"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop1<?= $aaa->id_merk ?>"
                                    aria-label="Scroll to top">
                                </a>

                                <a class=" fas fa-trash ml-2" style="color: #f4301a;" onclick="confirmDeleteMerk('<?= $aaa->logo ?>');"></a>
                            </div>

                        </td>


                        <!-- update kategori -->
                        <div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop1<?= $aaa->id_merk ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Blog</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/merk/update') ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id_merk" value="<?= $aaa->id_merk ?>">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Merk</label>
                                                        <input class="form-control" type="text"
                                                            name="merk" value="<?= $aaa->merk ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                        <input class="form-control" type="file"
                                                            name="logo" accept="image/png, image/jpeg" required>
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Merk Mobil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/merk/tambah') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input class="form-control"
                                        placeholder="Merk" name="merk" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Foto</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1"
                                        name="logo" accept="image/png, image/jpeg">
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