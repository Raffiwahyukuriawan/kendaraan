<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- /.content-wrapper -->
<footer class="main-footer">
	<strong>Copyright &copy; 2023-2026 <a href="">Carbook</a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
	</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>

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
	function confirmDeletePesan(id) {
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
				window.location.href = "<?= site_url('admin/message/hapus_pesan/'); ?>" + id;
			}
		});
	}
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
				window.location.href = "<?= site_url('admin/komentar/hapus/'); ?>" + id;
			}
		});
	}
</script>

<script>
	function confirmDelete(foto_user) {
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
				window.location.href = "<?= site_url('admin/pengelola/hapus/'); ?>" + foto_user;
			}
		});

	}
</script>

<script>
	function confirmDeleteInden(id) {
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
				window.location.href = "<?= site_url('admin/mobil_inden/hapus/'); ?>" + id;
			}
		});

	}
</script>

<script>
	function confirmDeleteKategori(foto_kategori) {
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
				window.location.href = "<?= site_url('admin/kategori/hapus/'); ?>" + foto_kategori;
			}
		});

	}
</script>

<script>
	function confirmDeleteClient(foto) {
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
				window.location.href = "<?= site_url('admin/client/hapus/'); ?>" + foto;
			}
		});

	}
</script>

<script>
	function confirmDeleteBlog(foto) {
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
				window.location.href = "<?= site_url('admin/blog/hapus/'); ?>" + foto;
			}
		});

	}
</script>

<script>
	function confirmDeleteArtikel(foto) {
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
				window.location.href = "<?= site_url('admin/artikel/hapus/'); ?>" + foto;
			}
		});

	}
</script>

<script>
	function confirmDeleteCarousel(foto) {
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
				window.location.href = "<?= site_url('admin/carousel/hapus/'); ?>" + foto;
			}
		});

	}
</script>

<script>
	<?php if ($this->session->flashdata('message')): ?>
		Swal.fire({
			text: "<?= $this->session->flashdata('message'); ?>",
			icon: "warning"
		});
	<?php endif ?>
</script>

<script>
	function logout() {
		Swal.fire({
			title: "Anda Yakin?",
			text: "Anda tidak akan dapat membatalkan tindakan ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Logout!"
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?= site_url('admin/auth/logout'); ?>";
			}
		});

	}
</script>

<script>
	function confirmDeleteMerk(logo) {
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
				window.location.href = "<?= site_url('admin/merk/hapus/'); ?>" + logo;
			}
		});

	}
</script>

<script>
	const hargaInput = document.getElementById('harga');

	// Fungsi untuk memformat nilai dengan titik sebagai pemisah ribuan
	function formatRibuan(nilai) {
		return nilai.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}

	// Menghapus semua titik untuk mendapatkan angka asli
	function hapusFormat(nilai) {
		return nilai.replace(/\./g, '');
	}

	// Event untuk membersihkan angka 0 saat fokus
	hargaInput.addEventListener('focus', function() {
		if (this.value == '0') this.value = '';
	});

	// Event untuk menambahkan format ribuan saat input di-blur
	hargaInput.addEventListener('blur', function() {
		if (this.value == '') {
			this.value = '0';
		} else {
			this.value = formatRibuan(hapusFormat(this.value));
		}
	});

	// Format input saat pengguna mengetik
	hargaInput.addEventListener('input', function() {
		let nilai = hapusFormat(this.value); // Hapus titik sementara
		if (!isNaN(nilai)) { // Cek apakah nilai adalah angka
			this.value = formatRibuan(nilai); // Tambahkan titik sebagai pemisah ribuan
		}
	});
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
	$(document).ready(function() {
		// Ambil URL saat ini
		var currentUrl = window.location.href;

		// Loop semua nav-link
		$(".nav-link").each(function() {
			// Cek apakah href pada nav-link cocok dengan URL saat ini
			if (this.href === currentUrl) {
				$(".nav-link").removeClass("active"); // Hapus active dari semua nav-link
				$(this).addClass("active"); // Tambahkan active pada nav-link yang cocok
			}
		});
	});
</script>

<!-- ./wrapper -->
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