
<body>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('carbook-master/assets/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('') ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Mobil yang anda cari</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <?php foreach ($mobil as $a): ?>
                    <div class="col-md-4">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end" style="background-image: url('<?php echo base_url('AdminLTE-3.1.0/assets/upload/' . $a->foto); ?>');">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="car-single.html"><?= $a->judul ?></a></h2>
                                <div class="d-flex mb-3">
                                    <span class="cat"><?= $a->merk ?></span>
                                    <p class="price ml-auto"><?= $a->harga_murah ?> - <?= $a->harga_mahal ?> <span>/day</span></p>
                                </div>
                                <p class="d-flex mb-0 d-block">
                                    <a href="<?= base_url('pesan/inden/' . $a->id_konten) ?>"
                                        class="btn btn-primary py-2 mr-1 <?= $a->status == 'diinden' || $a->status == 'terjual' ? 'disabled' : '' ?>"
                                        <?= $a->status == 'diinden' || $a->status == 'terjual' ? 'aria-disabled="true"' : '' ?>>
                                        <?= $a->status == 'tersedia' ? 'Book Now' : $a->status ?>
                                    </a>
                                    <a href="<?= base_url('welcome/detail/' . $a->id_konten) ?>" class="btn btn-secondary py-2 ml-1">Details</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

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
    <script src="<?= base_url('carbook-master/assets/') ?>https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="<?= base_url('carbook-master/assets/') ?>js/google-map.js"></script>
    <script src="<?= base_url('carbook-master/assets/') ?>js/main.js"></script>

</body>

</html>