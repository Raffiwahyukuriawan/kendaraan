<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('carbook-master/assets/images/bg_3.jpg'); ?>');" data-stellar-background-ratio="0.5">
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
		<div class="row">
			<?php foreach ($mobil as $car): ?>
				<div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
						<div>
							<img class="img rounded d-flex align-items-end" src="<?= base_url('AdminLTE-3.1.0/assets/upload/' . $car->foto) ?>" alt="<?= $car->judul ?>">
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
								</a>
								<a href="<?= base_url('welcome/detail/' . $car->id_konten) ?>" class="btn btn-secondary py-2 ml-1">Details</a>
							</p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul id="pagination-links">
						<li><a href="#" onclick="changePage(<?php echo max(1, $halamanAktif - 1); ?>)">&lt;</a></li>
						<?php for ($i = 1; $i <= $totalHalaman; $i++): ?>
							<li class="<?= ($i == $halamanAktif) ? 'active' : '' ?>"><a href="?page=<?= $i ?>"><?= $i ?></a></li>
						<?php endfor; ?>
						<li><a href="#" onclick="changePage(<?php echo min($totalHalaman, $halamanAktif + 1); ?>)">&gt;</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	function changePage(pageNumber) {
		window.location.href = "?page=" + pageNumber;

		// Update kelas 'active' pada halaman yang aktif
		var links = document.querySelectorAll('#pagination-links li');
		links.forEach(function(link) {
			link.classList.remove('active');
		});
		document.querySelector('#pagination-links li:nth-child(' + (pageNumber + 1) + ')').classList.add('active');
	}
</script>