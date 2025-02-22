<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('admin/editor/logout') ?>" class="brand-link">
		<img src="<?= base_url('AdminLTE-3.1.0/assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
			class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Admin Carbook</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('AdminLTE-3.1.0/assets/') ?>dist/img/user2-160x160.jpg"
					class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $nama_user ?></a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('editor/dashtor') ?>" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('editor/carousel') ?>" class="nav-link">
						<i class="nav-icon fas fa-image"></i>
						<p>
							Background
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('editor/artikel') ?>" class="nav-link">
						<i class="nav-icon fas fa-newspaper"></i>
						<p>
							Artikel
							<span class="right badge badge-danger">New</span>
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('editor/kategori') ?>" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Kategori
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('editor/blog') ?>" class="nav-link">
						<i class="nav-icon fas fa-book"></i>
						<p>
							Blog
						</p>
					</a>
				</li>
				<li class="nav-header">EXAMPLES</li>
				<li class="nav-item">
					<a class="nav-link" onclick="logout()">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>