<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inden Mobil</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE-3.1.0/assets/') ?>https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE-3.1.0/assets/') ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/summernote/summernote-bs4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .container {
        max-width: 900px;
        margin: 20px auto;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-section {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin: 10px 0 5px;
    }

    input,
    button {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #28a745;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

    .summary-section {
        border-top: 1px solid #ccc;
        padding-top: 20px;
    }

    .terms {
        margin-bottom: 20px;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .row {
        align-items: center;
        /* Menyelaraskan checkbox dengan teks secara vertikal */
        /* Jarak kecil antara checkbox dan teks */
    }

    .row label {
        display: inline-block;
        /* Supaya checkbox dan teks berada dalam satu baris */
        align-items: center;
    }
</style>

<body>
    <div class="container">
        <h1>Ringkasan Pesanan</h1>
        <div class="form-container">
            <form action="<?= base_url('pesan/sekarang') ?>" method="post">
                <input type="hidden" name="id_konten" value="<?= $data_inden->id_konten ?>">
                <!-- Detail Tagihan -->

                <!-- Registration -->
                <div class="form-section">
                    <h2>Registration</h2>
                    <label for="full-name">Nama Lengkap *</label>
                    <input type="text" id="full-name" name="nama_pemesan" required>

                    <label for="reg-email">Alamat Email *</label>
                    <input type="email" id="reg-email" name="email" required>

                    <label for="reg-email">Nomor Telephon *</label>
                    <input type="text" id="reg-email" name="kontak_pemesan" required>

                    <label for="reg-email">Tanggal Kunjungan *</label>
                    <input type="date" id="reg-email" name="tanggal_kunjungan" required>
                </div>

                <!-- Summary Section -->
                <div class="summary-section">
                    <h2>Mobil yang Anda Inden</h2>
                    <p>Nama Mobil: <?= $data_inden->judul ?></p>
                    <p>Merk: <?= $data_inden->merk ?></p>
                    <p>Kategori: <?= $data_inden->kategori ?></p>
                    <div class="terms row" style="display:flex; justify-content:center; align-items:center;">
                        <div class="" style="display: flex; align-items: center; justify-content: flex-start;">
                            <label for="">I have read and agree to the website <a href="<?= base_url('pesan/sdank') ?>">syarat dan ketentuan</a> *</label>
                            <input type="checkbox" required>
                        </div>

                    </div>
                    <input type="hidden" name="nama_mobil" value="<?= $data_inden->judul ?>">
                    <input type="hidden" name="merk" value="<?= $data_inden->merk ?>">
                    <input type="hidden" name="kategori" value="<?= $data_inden->kategori ?>">
                    <input type="hidden" name="kategori" value="<?= $data_inden->kategori ?>">
                    <button type="submit">Inden Sekarang</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        <?php if ($this->session->flashdata('success')): ?>
            Swal.fire({
                title: 'Berhasil',
                text: "<?= $this->session->flashdata('success'); ?>",
                icon: "success"
            });
        <?php elseif ($this->session->flashdata('error')): ?>
            Swal.fire({
                title: "Gagal",
                text: "<?= $this->session->flashdata('error'); ?>",
                icon: "error"
            });
        <?php endif; ?>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('AdminLTE-3.1.0/assets/') ?>dist/js/pages/dashboard.js"></script>
</body>

</html>