<?php defined('BASEPATH') or exit('gak oleh mlebu') ?>

<div class="content-wrapper" style="padding: 2%;">
    <div class="card ">
        <!-- tambah admin -->
        <div>
            <form action="<?= base_url('admin/konfigurasi/update') ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label>Video Mobil Baru</label>
                        <input class="form-control" value="<?= $konfig->video; ?>"
                            placeholder="url" name="video">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi_1" class="form-control" style="text-align: left;"><?= trim($konfig->deskripsi_1)  ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pengantar</label>
                        <textarea name="deskripsi_2" class="form-control" style="text-align: left;"><?= trim($konfig->deskripsi_2)  ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input class="form-control"
                            name="instagram" value="<?= $konfig->instagram; ?>">
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input class="form-control" value="<?= $konfig->facebook; ?>"
                            name="facebook">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email"
                            name="email" value="<?= $konfig->email; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" value="<?= $konfig->alamat; ?>"
                            name="alamat">
                    </div>
                    <div class="form-group">
                        <label>Whatsapp</label>
                        <input class="form-control" value="<?= $konfig->no_telp; ?>"
                            name="no_telp">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            <!-- end tambah admin -->
        </div>
    </div>
</div>