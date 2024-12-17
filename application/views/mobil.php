<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $halaman ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/style.css">


    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/animate.css">

    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/aos.css">

    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url('carbook-master/assets/') ?>css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('') ?>">Car<span>Book</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?= base_url('') ?>" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li>
                    <li class="nav-item active"><a href="car.html" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('carbook-master/assets/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('') ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Car Search</h1>
                </div>
            </div>
        </div>
    </section>


    <?php foreach ($mobil as $aaa): ?>
        <section class="ftco-section ftco-car-details">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="car-details">
                            <img class="img rounded " src="<?php echo base_url('AdminLTE-3.1.0/assets/upload/' . trim($aaa->foto)); ?>" style="height:80%;" alt="">
                            <div class="text text-center">
                                <span class="subheading" value="<?= $aaa->id_merk ?>"><?= $aaa->merk ?></span>
                                <h2><?= $aaa->judul ?></h2>
                                <h5 style="color:blue;"><?= $aaa->harga_murah ?> - <?= $aaa->harga_mahal ?> Juta</h5>
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
                                            <span><?= $aaa->cc ?> CC</span>
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
                                            <span><?= $aaa->transmisi ?></span>
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
                                            <span><?= $aaa->seat ?> Adults</span>
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
                                            Luggage
                                            <span><?= $aaa->air_bag ?> Bags</span>
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
                                            <span><?= $aaa->bbm ?></span>
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
                                    <p><?= $aaa->deskripsi ?></p>
                                </div>

                                <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h3 class="head"><?php echo $komen ?> Reviews</h3>
                                            <?php foreach ($komentar as $komen): ?>
                                                <div class="review d-flex">
                                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                                    <div class="desc">
                                                        <h4>
                                                            <span class="text-left"><?= $komen->nama ?></span>
                                                            <span class="text-right"><?= $komen->tanggal ?></span>
                                                        </h4>
                                                        <p class="star">
                                                            <span>
                                                                <i class="ion-ios-star"></i>
                                                                <i class="ion-ios-star"></i>
                                                                <i class="ion-ios-star"></i>
                                                                <i class="ion-ios-star"></i>
                                                                <i class="ion-ios-star"></i>
                                                            </span>
                                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                        </p>
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
                                                        <form action="<?= base_url('cari/komentar') ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="message">Nama Mobil</label>
                                                                <input type="text" name="judul" class="form-control">
                                                            </div>
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
    <?php endforeach; ?>

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