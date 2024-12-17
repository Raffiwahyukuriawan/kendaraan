<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- END nav -->

<div class="hero-wrap ftco-degree-bg" style="background-image: url('<?php echo base_url('AdminLTE-3.1.0/assets/carousel/' . $carousel->foto); ?>');"
	data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
			<div class="col-lg-8 ftco-animate">
				<div class="text w-100 text-center mb-md-5 pb-md-5">
					<h1 class="mb-4"><?= $konfigurasi->deskripsi_1 ?></h1>
					<p style="font-size: 18px;"><?= $konfigurasi->deskripsi_2 ?></p>
					<a href="<?= $konfigurasi->video ?>"
						class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="ion-ios-play"></span>
						</div>
						<div class="heading-title ml-5">
							<span>Info mobil yang baru saja diluncurkan </span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-12	featured-top">
				<div class="row no-gutters">
					<!-- search -->
					<div class="col-md-4 align-items-center" style="width: 100%;">
						<form action="<?= base_url('cari/cari') ?>" method="post" class="request-form ftco-animate bg-primary">
							<h2>Look for a car</h2>
							<div class="form-group">
								<label for="" class="label">Nama Mobil</label>
								<input type="text" name="judul" class="form-control" placeholder="Nama Mobil" required>
							</div>
							<div class="d-flex">

							</div>

							<div class="form-group">
								<input type="submit" value="Search" class="btn btn-secondary py-3 px-4">
							</div>
						</form>
					</div>
					<!-- end cari -->
					<div class="col-md-8 d-flex align-items-center">
						<div class="services-wrap rounded-right w-100">
							<h3 class="heading-section mb-4">Cara Lebih Baik untuk Mencari Tahu Tentang Mobil</h3>
							<div class="row d-flex mb-4">
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><span
												class="flaticon-route"></span></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Pilih Mobil</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><span
												class="flaticon-handshake"></span></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Detail Mobil</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><span
												class="flaticon-rent"></span></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Daftar Fitur</h3>
										</div>
									</div>
								</div>
							</div>
							<p><a href="#" class="btn btn-primary py-3 px-4">Cari Sekarang</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>


<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">What we offer</span>
				<h3 class="mb-2">Kendaraan Rekomendasi</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="carousel-car owl-carousel">
					<?php foreach (array_slice($data, 0, 5) as $aaa): ?>
						<div class="item">
							<div class="car-wrap rounded ftco-animate">
								<div class="img rounded d-flex align-items-end ">
									<img src="<?php echo base_url('AdminLTE-3.1.0/assets/upload/' . trim($aaa->foto)); ?>" alt="ra metu gambar e" width="auto" height="100%">
								</div>
								<div class="text">
									<p class="d-flex row">
									<p></p>

									<h2 class=""><?= $aaa->judul ?></h2>
									</p>
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
		</div>
	</div>
</section>

<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Search</span>
				<h2 class="mb-3">Based on Brand</h2>
			</div>
		</div>
		<div class="row ftco-animate" width="50%" height="50%">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel ftco-owl">
					<?php foreach ($merk as $bbb): ?>
						<div class="item" style="display: flex; align-items:center; justify-content:center">
							<a href="<?= base_url('detail_merk/merk/' . $bbb->id_merk) ?>">
								<div class="testimony-wrap rounded text-center py-4 pb-5" style="width: 80%; height: 10%">
									<div class="user-img mb-2" style="background-image: url('<?php echo base_url('AdminLTE-3.1.0/assets/merk/' . $bbb->logo); ?>')" width="10%" height="10%">
									</div>
									<div class="text pt-4">
										<a href="<?= base_url('detail_merk/merk/' . $bbb->id_merk) ?>">
											<p class="name"><?= $bbb->merk ?></p>
										</a>
									</div>
							</a>
						</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
	</div>
</section>

<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Or</span>
				<h2 class="mb-3">Based on Kategori</h2>
			</div>
		</div>
		<div class="row ftco-animate" width="50%" height="50%">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel ftco-owl">
					<?php foreach ($kategori as $bbb): ?>
						<div class="item" style="display: flex; align-items:center; justify-content:center">
							<a href="<?= base_url('detail_kategori/kategori/' . $bbb->id_kategori) ?>">
								<div class="testimony-wrap rounded text-center py-4 pb-5" style="width: 80%; height: 10%">
									<div class="user-img mb-1">
										<img src="<?php echo base_url('AdminLTE-3.1.0/assets/kategori/' . $bbb->foto_kategori); ?>" alt="" style="margin-top: 5%">
									</div>
									<div class="text pt-4 mt-1">
										<a href="<?= base_url('detail_kategori/kategori/' . $bbb->id_kategori) ?>">
											<h4 class=""><?= $bbb->kategori ?></h4>
										</a>
									</div>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-about">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
				style="background-image: url('<?php echo base_url('AdminLTE-3.1.0/assets/carousel/' . $about->foto); ?>');">
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

<section class="ftco-section ftco-intro" style="background-image: url('<?php echo base_url('AdminLTE-3.1.0/assets/carousel/' . $service->foto); ?>');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 heading-section heading-section-white ftco-animate">
				<h2 class="mb-3">Ingin Mendapatkan Informasi Tentang Mobil Yang Impikan.</h2>
				<a href="#" class="btn btn-primary btn-lg">Cari Sekarang</a>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Testimonial</span>
				<h2 class="mb-3">Happy Clients</h2>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel ftco-owl">
					<?php foreach ($client as $klien): ?>
						<div class="item">
							<div class="testimony-wrap rounded text-center py-4 pb-5">
								<div>
									<img style="border-radius:50%; height:50%; width:50%; margin-left:auto; margin-right:auto" src="<?= 'AdminLTE-3.1.0/assets/client/' . $klien->foto ?>" alt="">
								</div>
								<div class="text pt-4">
									<p class="mb-4"><?= $klien->deskripsi ?></p>
									<p class="name"><?= $klien->nama ?></p>
									<span class="position"><?= $klien->pekerjaan ?></span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Blog</span>
				<h2>Blog Terbaru</h2>
			</div>
		</div>
		<div class="row d-flex">
			<?php foreach ($blog as $aaa): ?>
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry justify-content-end">
						<img src="<?= 'AdminLTE-3.1.0/assets/blog/' . $aaa->foto ?>" alt="" class="block-20" style="width:100%;">
						<div class="text pt-4">
							<div class="meta mb-3">
								<div><a href="#"><?= $aaa->tanggal ?></a></div>
							</div>
							<h3 class="heading mt-2"><a href="#"><?= $aaa->judul ?></a></h3>
							<p><a href="<?= base_url('blog/blog/') . $aaa->id_blog ?>" class="btn btn-primary">Read more</a></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
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