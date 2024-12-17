<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php foreach ($footer as $aa): ?>
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
                        <p><?= $konfigurasi->deskripsi_1 ?></p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Information</h2>
                        <ul class="list-unstyled">
                            <li><a href="<?= base_url('about') ?>" class="py-2 d-block">About</a></li>
                            <li><a href="<?= base_url('about/service') ?>" class=" py-2 d-block">Services</a></li>
                            <li><a href="<?= base_url('about/cars') ?>" class="py-2 d-block">Cars</a></li>
                            <li><a href="<?= base_url('about/contact') ?>" class="py-2 d-block">Contact</a></li>
                            <li><a href="<?= base_url('editor/auth') ?>" class="py-2 d-block">Editor</a></li>
                            <li><a href="<?= base_url('sesi') ?>" class="py-2 d-block">Sesi Saya</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">New Car Arrives</h2>
                        <ul class="list-unstyled">
                            <?php foreach (array_slice($data, 0, 5) as $aaa): ?>
                                <li><a href="#" class="py-2 d-block"><?= $aaa->judul ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text"><?= $aa->alamat ?></span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?= $aa->no_telp ?></span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text"><?= $aa->email ?></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart color-danger"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
<?php endforeach; ?>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" />
    </svg></div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if ($this->session->flashdata('message')): ?>
        Swal.fire({
            text: "<?= $this->session->flashdata('message'); ?>",
            icon: "warning"
        });
    <?php endif ?>
</script>

<script>
    function confirmInden(id_konten) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Anda ingin menginden mobil ini?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= site_url('pesan/'); ?>" + id_konten;
            }
        });

    }
</script>

<script>
    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            title: "Berhasil!",
            text: "<?= $this->session->flashdata('success'); ?>",
            icon: "success"
        });
    <?php elseif ($this->session->flashdata('error')): ?>
        Swal.fire({
            title: "Gagal!",
            text: "<?= $this->session->flashdata('error'); ?>",
            icon: "error"
        });
    <?php endif; ?>
</script>

<script>
    function confirmDeleteKomen(id) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Anda tidak akan dapat mengembalikannya!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= site_url('welcome/hapus_komen/'); ?>" + id;
            }
        });
    }
</script>

<script src="<?= base_url('carbook-master/assets/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/popper.min.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/jquery.easing.1.3.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/jquery.waypoints.min.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/jquery.stellar.min.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/aos.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/bootstrap-datepicker.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/jquery.timepicker.min.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/scrollax.min.js"></script>
<script
    src="<?= base_url('carbook-master/assets/') ?>https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
</script>
<script src="<?= base_url('carbook-master/assets/') ?>js/google-map.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Optional JavaScript; choose one of the two! -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Ambil URL saat ini
        var currentUrl = window.location.href;

        // Loop semua nav-link
        $(".nav-item").each(function() {
            // Cek apakah href pada nav-link cocok dengan URL saat ini
            if (this.href === currentUrl) {
                $(".nav-item").removeClass("active"); // Hapus active dari semua nav-link
                $(this).addClass("active"); // Tambahkan active pada nav-link yang cocok
            }
        });
    });
</script>
</body>

</html>