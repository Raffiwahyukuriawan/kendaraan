<?php defined('BASEPATH') or exit('gak oleh mlebu') ?>

<div class="card content-wrapper" style="padding: 2%;">
    <div class="card-header border-0">
        <h3 class="card-title">Data Blog</h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_blog = 1;
                foreach ($blog as $aaa): ?>
                    <tr>
                        <td><?= $id_blog++ ?></td>
                        <td><?= $aaa->tanggal ?></td>
                        <td><?= $aaa->judul ?></td>
                        <td>
                            <div>
                                <a class="fas fa-search-plus" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $aaa->id_blog ?>"></a>
                                <!-- detail -->
                                <div class="modal fade" id="staticBackdrop<?= $aaa->id_blog ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Blog</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="font-size:30px;"><strong><?= $aaa->judul ?></strong></p>
                                                <div class="mb-3">
                                                    <img style="width:100%; height:100%;" src="<?php echo base_url('AdminLTE-3.1.0/assets/blog/' . $aaa->foto); ?>" alt="Foto tidak ada">
                                                </div>
                                                <p><?= $aaa->deskripsi ?></p>
                                                <div class="d-flex" style="font-size: 14px; margin-left:30px;">
                                                    <p><span class="fas fa-calendar mr-2"></span><?= $aaa->tanggal ?></p>
                                                    <p style="margin-left: 30px;"><span class="fas fa-user mr-2"></span><?= $aaa->username ?></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end detail -->

                                <a class="fas fa-edit ml-2" style="color: #13d844;" id="back-to-top" href="<?= base_url('admin/client/edit/' . $aaa->id_blog); ?>" class="btn btn-primary back-to-top mb-5" role="button" data-bs-toggle="modal"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop1<?= $aaa->id_blog ?>"
                                    aria-label="Scroll to top">
                                </a>

                                <a class=" fas fa-trash ml-2" style="color: #f4301a;" onclick="confirmDeleteBlog('<?= $aaa->foto ?>');"></a>
                            </div>
                        </td>


                        <!-- update kategori -->
                        <div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop1<?= $aaa->id_blog ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Blog</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/blog/update') ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id_blog" value="<?= $aaa->id_blog ?>">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Judul</label>
                                                        <input class="form-control" type="text"
                                                            name="judul" value="<?= $aaa->judul ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Deskripsi</label>
                                                        <input class="form-control" type="text"
                                                            name="deskripsi" value="<?= $aaa->deskripsi ?>" required>
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Blog</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/blog/tambah') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input class="form-control"
                                        placeholder="Judul" name="judul" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control"
                                        placeholder="Deskripsi" name="deskripsi" style="text-align:left;" dir="ltr" required>
                                     </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Foto</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1"
                                        name="foto" accept="image/png, image/jpeg">
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