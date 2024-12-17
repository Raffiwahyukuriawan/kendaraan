<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('carbook-master/assets/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5" style="height:200%">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('') ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread"><?= $halaman ?></h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-car-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="car-details">
                    <img class="img rounded img" src="<?php echo base_url('AdminLTE-3.1.0/assets/upload/' . $mobil->foto); ?>" style="height:80%;" alt="gambar e ra metu">
                    <div class="text text-center">
                        <span class="subheading" value="<?= $mobil->id_merk ?>"><?= $mobil->merk ?></span>
                        <h2><?= $mobil->judul ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    engine capacity
                                    <span><?= $fitur->cc ?> CC</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Transmission
                                    <span><?= $fitur->transmisi ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Seats
                                    <span><?= $fitur->seat ?> Adults</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Air Bag
                                    <span><?= $fitur->air_bag ?> Bags</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Fuel
                                    <span><?= $fitur->bbm ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pills">
                <div class="bd-example bd-example-tabs">
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-status-tab" data-toggle="pill" href="#pills-status" role="tab" aria-controls="pills-status" aria-expanded="true">Status Mobil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="check"><span class="ion-ios-checkmark"></span>Airconditions</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Child Seat</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>GPS</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Luggage</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Music</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="check"><span class="ion-ios-checkmark"></span>Seat Belt</li>
                                        <li class="remove"><span class="ion-ios-close"></span>Sleeping Bed</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Water</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Bluetooth</li>
                                        <li class="remove"><span class="ion-ios-close"></span>Onboard computer</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="features">
                                        <li class="check"><span class="ion-ios-checkmark"></span>Audio input</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Long Term Trips</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Car Kit</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Remote central locking</li>
                                        <li class="check"><span class="ion-ios-checkmark"></span>Climate control</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                            <p><?= $mobil->deskripsi ?></p>
                        </div>

                        <div class="tab-pane fade" id="pills-status" role="tabpanel" aria-labelledby="pills-status-tab;">
                            <p style="justify-content:center; align-items:center; display: flex; font-size: 50px;"><?= $mobil->status ?></p>
                            <div style="justify-content:center; align-items:center; display: flex;">
                                <a href="<?= base_url('pesan/inden/' . $mobil->id_konten) ?>"
                                    class="btn btn-primary py-2 mr-1 <?= $mobil->status == 'diinden' || $mobil->status == 'terjual' ? 'disabled' : '' ?>"
                                    <?= $mobil->status == 'diinden' || $mobil->status == 'terjual' ? 'aria-disabled="true"' : '' ?>>
                                    <?= $mobil->status == 'tersedia' ? 'Book Now' : $mobil->status ?>
                                </a>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3 class="head"><?php echo $komen ?> Reviews</h3>
                                    <?php foreach ($komentar as $komen): ?>
                                        <div class="review d-flex">
                                            <img src="" alt="">
                                            <div class="user-img" style="background-image: url('<?= base_url('AdminLTE-3.1.0/assets/foto_user/'. $komen->foto) ?>')"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left"><?= $komen->nama ?></span>
                                                    <span class="text-right"><?= $komen->tanggal ?></span>
                                                </h4>
                                                <span style="color: blue;"><?= $komen->judul ?></span> <?= $komen->keterangan ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col-md-5">
                                    <div class="rating-wrap">
                                        <h3 class="head">Leave a comment</h3>
                                        <div class="wrap">
                                            <div class="comment-form-wrap pt-5">
                                                <h3>Tambahkan Komentar untuk <?php echo $this->session->userdata('nama_mobil'); ?>:</h3>
                                                <form action="<?= base_url('komentar/komentar') ?>" method="post">
                                                    <input type="hidden" name="id_konten" value="<?php echo $id_konten ?>">
                                                    <input type="hidden" name="judul" value="<?php echo $this->session->userdata('nama_mobil'); ?>">
                                                    <div class="form-group">
                                                        <label for="message">Message</label>
                                                        <textarea name="keterangan" id="message" cols="30" rows="10" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5 fadeInUp ftco-animated">
                <span class="subheading">Choose Car</span>
                <h2 class="mb-2">Related Cars</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($merk as $aaa): ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate fadeInUp ftco-animated">
                        <div class="img rounded d-flex align-items-end" style="background-image: url('<?php echo base_url('AdminLTE-3.1.0/assets/upload/' . $aaa->foto); ?>')"></div>
                        <div class="text">
                            <h2 class="mb-0">
                                <a href="car-single.html"><?= $aaa->judul ?></a>
                            </h2>
                            <div class="d-flex mb-3">
                                <span class="cat"><?= $aaa->merk ?></span>
                                <p class="price ml-auto"><?= $aaa->harga_murah ?> - <?= $aaa->harga_mahal ?> Juta<span>/day</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block">
                                <a href="<?= base_url('pesan/inden/' . $aaa->id_konten) ?>"
                                    class="btn btn-primary py-2 mr-1 <?= $aaa->status == 'diinden' || $aaa->status == 'terjual' ? 'disabled' : '' ?>"
                                    <?= $aaa->status == 'diinden' || $aaa->status == 'terjual' ? 'aria-disabled="true"' : '' ?>>
                                    <?= $aaa->status == 'tersedia' ? 'Book Now' : $aaa->status ?>
                                </a>
                                <a href="<?= base_url('welcome/detail/' . $aaa->id_konten) ?>" class="btn btn-secondary py-2 ml-1">Details
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            title: "Berhasil!",
            text: "<?= $this->session->flashdata('success'); ?>",
            icon: "success"
        });
    <?php endif ?>
</script>

<script>
    <?php if ($this->session->flashdata('message')): ?>
        Swal.fire({
            text: "<?= $this->session->flashdata('message'); ?>",
            icon: "warning"
        });
    <?php endif ?>
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
<script src="<?= base_url('carbook-master/assets/') ?>https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/google-map.js"></script>
<script src="<?= base_url('carbook-master/assets/') ?>js/main.js"></script>


</body>

</html>