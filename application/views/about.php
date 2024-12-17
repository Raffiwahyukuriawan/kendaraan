<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('carbook-master/assets/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('') ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Services <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Our Services</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                style="background-image: url(<?= base_url('carbook-master/assets/') ?>images/about.jpg);">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <span class="subheading">About us</span>
                    <h2 class="mb-4">Selamat Datang di CarBook!</h2>
                    <p>
                    <ul style="color: white;">
                        Kami dengan senang hati menyambut Anda di CarBook, platform yang dirancang untuk memudahkan pengelolaan dan pencarian informasi tentang mobil. Di CarBook, Anda dapat:
                        <li style="color: white; margin-left:40px;"><strong>Menelusuri Katalog Mobil:</strong> Temukan berbagai jenis mobil dari berbagai merek dan model, lengkap dengan deskripsi, spesifikasi, dan foto.</li>
                        <li style="color: white; margin-left:40px;"><strong>Menambahkan Mobil:</strong> Jika Anda adalah pemilik mobil, Anda dapat menambahkan mobil Anda sendiri ke dalam katalog kami, lengkap dengan informasi dan foto yang menarik.</li>
                        <li style="color: white; margin-left:40px;"><strong>Mendapatkan Pembaruan Terbaru:</strong> Dapatkan informasi terkini mengenai mobil, termasuk berita dan ulasan terbaru.</li>
                        Jelajahi fitur-fitur kami dan nikmati pengalaman menyenangkan dalam mencari dan berbagi informasi tentang mobil. Selamat berpetualang di CarBook!</p>
                    </ul>
                    </p>
                    <p><a href="#" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-intro" style="background-image: url(<?= base_url('carbook-master/assets/') ?>images/bg_3.jpg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 heading-section heading-section-white ftco-animate">
				<h2 class="mb-3">Ingin Mendapatkan Informasi Tentang Mobil Yang Impikan.</h2>
				<a href="<?= base_url('') ?>" class="btn btn-primary btn-lg">Cari Sekarang</a>
			</div>
		</div>
	</div>
</section>

<section class="ftco-counter ftco-section img bg-light" id="section-counter">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="5">0</strong>
                        <span>Year <br>Experienced</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="<?= $jumlah_car ?>">0</strong>
                        <span>Total <br>Cars</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="<?= $jumlah_komen ?>">0</strong>
                        <span>Happy <br>Customers</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text d-flex align-items-center">
                        <strong class="number" data-number="<?= $pengunjung ?>">0</strong>
                        <span>Total <br>Visitors</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- loader -->