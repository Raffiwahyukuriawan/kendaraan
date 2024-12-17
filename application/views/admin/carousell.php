<?php defined('BASEPATH') or exit('gak oleh mlebu') ?>

<div class="content-wrapper">

    <?php foreach ($carousel as $aaa): ?>
        <div class="row m-1 mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><strong style="font-size: larger;"><?= $aaa->judul ?></strong></h5>
                        
                        <!-- aksi -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                            <div class="btn-group">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop12345<?= $aaa->id_carousel ?>">
                                    <i class="fas fa-wrench"></i>
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop12345<?= $aaa->id_carousel ?>"" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/carousel/update') ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id_carousel" value="<?= $aaa->id_carousel ?>">
                                                <input type="hidden" name="foto_lama" value="<?= $aaa->foto ?>">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Judul</label>
                                                        <input class="form-control" type="text"
                                                            name="judul" value="<?= $aaa->judul ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                        <input class="form-control"
                                                            type="file" name="foto" accept="image/png, image/jpeg">
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
                            <!-- aksi -->

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <tr>
                                <img src="<?php echo base_url('AdminLTE-3.1.0/assets/carousel/' . $aaa->foto); ?>" alt="ra metu gambar e">
                                <div class="d-flex" style="font-size: 14px; margin-top:10px; margin-left: 20px;">
                                </div>
                            </tr>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    <?php endforeach; ?>
</div>