<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<body class="hold-transition sidebar-mini">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Message</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashmin') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Komentar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Timelime example  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- The time line -->
                        <div class="timeline">
                            <?php foreach ($komentar as $komen): ?>
                                <div>
                                    <i class="fas fa-user bg-green"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> <?= $komen->waktu ?></span>
                                        <h3 class="timeline-header no-border"> Pesan dari <a href="#"><?= $komen->nama ?></a></h3>
                                    </div>
                                </div>
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red"><?= $komen->tanggal ?></span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> <?= $komen->waktu ?></span>
                                        <h3 class="timeline-header"><a href="#"><?= $komen->nama ?></a> </h3>

                                        <div class="timeline-body">
                                            <span style="color: blue;"><?= $komen->message ?>
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-sm">Read more</a>
                                            <a class="btn btn-danger btn-sm" onclick="confirmDeletePesan(<?= $komen->id_kontak ?>)">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
    </div>
    <!-- /.timeline -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->