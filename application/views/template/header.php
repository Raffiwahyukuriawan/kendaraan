<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $judul ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

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
<style>
    .btn.disabled {
        background-color: #d6d6d6;
        /* Warna abu-abu */
        border-color: #d6d6d6;
        /* Border abu-abu */
        color: #7d7d7d;
        /* Warna teks abu-abu */
        pointer-events: none;
        /* Menonaktifkan klik */
    }

    /* Styling untuk bintang yang ditampilkan dalam satu baris */
    .rating {
        display: flex;
        /* Membuat elemen tampil sejajar */
        /* Menyusun bintang di tengah */
        /* Memberikan jarak antar bintang */
    }


</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('') ?>">Car<span>Book</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?= base_url('welcome') ?>" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="<?= base_url('about') ?>" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="<?= base_url('about/service') ?>" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="<?= base_url('about/car') ?>" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="<?= base_url('about/contact') ?>" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="<?= base_url('Editor/auth') ?>" class="nav-link">Editor</a></li>
                </ul>
            </div>
        </div>
    </nav>