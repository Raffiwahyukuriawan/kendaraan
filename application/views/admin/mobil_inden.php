<?php defined('BASEPATH') or exit('gak oleh mlebu') ?>

<div class="content-wrapper" style="padding: 2%">

    <div class="card table-responsive" style="width: 100%;">
        <div class="card-header card-responsive" style="width: 100%;">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dt-buttons btn-group flex-wrap">
                        <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button>
                        <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button>
                        <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button>
                        <a class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button" href="<?= base_url('admin/mobil_inden/generate_pdf') ?>"><span>PDF</span></a>
                        <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header card-responsive" style="width: 100%;">
            <h3 class="card-title">Data Inden Mobil</h3>
        </div>
        <div class="card-body p-0" style="width: 100%;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Nama Mobil </th>
                        <th>Nama Pemesan</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_inden = 1;
                    foreach ($status as $aaa):
                    ?>
                        <tr>
                            <td><?php echo $id_inden++; ?></td>
                            <td><?php echo $aaa->tanggal; ?></td>
                            <td>
                                <?php
                                // Menentukan kelas berdasarkan status_inden
                                if ($aaa->status_inden == 'diinden') {
                                    $status_class = 'bg-warning';  // Warna kuning (misalnya)
                                } elseif ($aaa->status_inden == 'terjual') {
                                    $status_class = 'bg-success';  // Warna hijau
                                } elseif ($aaa->status_inden == 'tersedia') {
                                    $status_class = 'bg-info';  // Warna biru (misalnya)
                                } else {
                                    $status_class = 'bg-secondary';  // Warna default jika tidak sesuai
                                }
                                ?>

                                <!-- Menampilkan status dengan kelas warna yang sesuai -->
                                <span class="badge <?= $status_class; ?>">
                                    <?php echo $aaa->status_inden; ?>
                                </span>
                            </td>
                            <td><?php echo $aaa->nama_mobil; ?></td>
                            <td><?php echo $aaa->nama_pemesan; ?></td>
                            <td><?php echo $aaa->tanggal_kunjungan; ?></td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <!-- Icon Search -->
                                    <a class="fas fa-search-plus me-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $aaa->id_inden ?>"></a>

                                    <!-- Icon Trash -->
                                    <a class="fas fa-trash text-danger" onclick="confirmDeleteInden(<?= $aaa->id_inden ?>);"></a>
                                </div>

                                <!-- Modal Detail -->
                                <div class="modal fade" id="staticBackdrop<?= $aaa->id_inden ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Inden Tanggal: <?= $aaa->tanggal ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-grup">
                                                    <label for="">Tanggal</label>
                                                    <input type="text" value="<?= $aaa->tanggal ?>" class="form-control">
                                                </div>

                                                <div class="form-grup">
                                                    <label for="">Waktu</label>
                                                    <input type="text" value="<?= $aaa->waktu ?>" class="form-control">
                                                </div>

                                                <div class="form-grup">
                                                    <label for="">Mobil</label>
                                                    <input type="text" value="<?= $aaa->nama_mobil ?>" class="form-control">
                                                </div>

                                                <div class="form-grup">
                                                    <label for="">Status</label>
                                                    <input type="text" value="<?= $aaa->status_inden ?>" class="form-control">
                                                </div>

                                                <div class="form-grup">
                                                    <label for="">Nama Pemesan</label>
                                                    <input type="text" value="<?= $aaa->nama_pemesan ?>" class="form-control">
                                                </div>

                                                <div class="form-grup">
                                                    <label for="">Tanggal</label>
                                                    <input type="text" value="<?= $aaa->tanggal ?>" class="form-control">
                                                </div>

                                                <div class="form-grup">
                                                    <label for="">No Telephon</label>
                                                    <input type="text" value="<?= $aaa->kontak_pemesan ?>" class="form-control">
                                                </div>

                                                <div class="form-grup">
                                                    <label for="">Email</label>
                                                    <input type="text" value="<?= $aaa->email ?>" class="form-control">
                                                </div>

                                                <div class="form-grup">
                                                    <label for="">Tanggal Kunjungan</label>
                                                    <input type="text" value="<?= $aaa->tanggal_kunjungan ?>" class="form-control">
                                                </div>

                                                <div class="form-grup">
                                                    <label for="">Merk</label>
                                                    <input type="text" value="<?= $aaa->merk ?>" class="form-control">
                                                </div>

                                                <div class="form-grup">
                                                    <label for="">Kategori</label>
                                                    <input type="text" value="<?= $aaa->kategori ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>