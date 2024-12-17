<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


        <!-- /.navbar -->
        <div class="content-wrapper" style="padding: 2%;">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><?= $judul->judul ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="<?= base_url('admin/artikel/tambah_fitur') ?>" method="post">
                        <input type="hidden" name="id_konten" value="<?= $judul->id_konten ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nama Mobil</label>
                                    <input type="text" name="judul" class="form-control" placeholder="Enter ..." value="<?= $judul->judul ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Transmisi</label>
                                    <input type="text" name="transmisi" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Air bag</label>
                                    <input type="number" name="air_bag" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Bahan Bakar</label>
                                    <input type="text" name="bbm" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Seat</label>
                                    <input type="number" name="seat" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Kapasitas Mesin</label>
                                    <input type="text" name="cc" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>