<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

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

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Services</span>
				<h2 class="mb-3">Layanan Terbaru Kami
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<a href="<?= base_url('about/car') ?>">
					<div class="services services-2 w-100 text-center">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-wedding-car"></span></div>
						<div class="text w-100">
							<h3 class="heading mb-2">Layanan Informasi Mobil</h3>
							<p>Pengguna dapat melihat informasi detail tentang mobil, seperti merek, model, harga, dan fitur..</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="<?= base_url('welcome') ?>">
					<div class="services services-2 w-100 text-center">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-transportation"></span></div>
						<div class="text w-100">
							<h3 class="heading mb-2">Layanan Pencarian Mobil</h3>
							<p>Pengguna dapat mencari mobil berdasarkan merek, model, atau kategori (misalnya sedan, SUV, atau hatchback)..</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="<?= base_url('admin/auth') ?>">
					<div class="services services-2 w-100 text-center">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-car"></span></div>
						<div class="text w-100">
							<h3 class="heading mb-2">Layanan Pengelolaan Mobil untuk Admin</h3>
							<p>Admin dapat menambahkan, mengedit, atau menghapus informasi mobil dalam sistem.</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="<?= base_url('about/car') ?>">
					<div class="services services-2 w-100 text-center">
						<div class="icon d-flex align-items-center justify-content-center"><span
								class="flaticon-transportation"></span></div>
						<div class="text w-100">
							<h3 class="heading mb-2">Layanan Memberi Ulasan</h3>
							<p>Menyediakan bagian di mana pengguna atau pelanggan dapat memberikan ulasan tentang mobil tersebut.</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-intro" style="background-image: url('<?= base_url('AdminLTE-3.1.0/assets/carousel/' . $service->foto); ?>');">
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