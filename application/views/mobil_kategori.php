<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('carbook-master/assets/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('') ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Choose Your Car</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Search</span>
                <h2 class="mb-3">Based on Kategori <?= $nama_merk->kategori ?></h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($mobil as $car): ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div>
                            <img class="img rounded d-flex align-items-end" src="<?= base_url('AdminLTE-3.1.0/assets/upload/' . $car->foto) ?>" alt="">
                        </div>
                        <div class="text">
                            <h2 class="mb-0"><a href="car-single.html"><?= $car->judul ?></a></h2>
                            <div class="d-flex mb-3">
                                <span class="cat"><?= $car->merk ?></span>
                                <p class="price ml-auto"><?= $car->harga_murah ?> - <?= $car->harga_mahal ?> Juta<span>/day</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block">
                                <a href="<?= base_url('pesan/inden/' . $car->id_konten) ?>"
                                    class="btn btn-primary py-2 mr-1 <?= $car->status == 'diinden' || $car->status == 'terjual' ? 'disabled' : '' ?>"
                                    <?= $car->status == 'diinden' || $car->status == 'terjual' ? 'aria-disabled="true"' : '' ?>>
                                    <?= $car->status == 'tersedia' ? 'Book Now' : $car->status ?>
                                </a> <a href="<?= base_url('welcome/detail/' . $car->id_konten) ?>" class="btn btn-secondary py-2 ml-1">Details</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>