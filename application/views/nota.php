<?php defined('BASEPATH') or exit('gal oleh mlebu'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Inden</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            font-family: 'Arial', sans-serif;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            width: 350px;
            height: 450px;
            background-color: #ffffff;
            color: #333;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            animation: fadeIn 1.5s ease-in-out;
            padding: 20px;
        }

        .card h1 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .card p {
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
        }

        .btn {
            transition: all 0.3s ease-in-out;
            flex: 1;
            margin: 0 5px;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 576px) {
            .card {
                width: 90%;
                height: auto;
            }

            .button-group {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                flex: none;
                width: 90%;
                margin: 5px 0;
            }

            .ii {
                color: #333;

            }

            @media (max-width: 576px) {
                .button-group {
                    flex-direction: column;
                    /* Menumpuk tombol secara vertikal */
                    align-items: center;
                    /* Menempatkan tombol di tengah */
                }

                .button-group form {
                    width: 100%;
                    /* Tombol memenuhi lebar kontainer */
                    text-align: center;
                }
            }

        }
    </style>
</head>

<body>
    <div class="card" style="border: 1px solid #ddd; border-radius: 10px; padding: 20px;">
        <nav class="navbar" id="ftco-navbar" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd; padding-bottom: 10px;width:100%;">
            <div class="container d-flex justify-content-start">
                <a class="navbar-brand" href="<?= base_url('') ?>" style="text-align: left; color: black;">
                    <span class="ii" style="color: black;">Car</span>
                    <span style="color: green;">Book</span>
                </a>
            </div>
        </nav>
        <div class="card-body">
            <h1 class="text-center">Nota Inden Mobil</h1>
            <div>
                <p style="text-align: left;"><strong>Nama Pemesan:</strong> <?= $inden->nama_pemesan; ?></p>
                <p style="text-align: left;"><strong>Nama Mobil:</strong> <?= $inden->nama_mobil; ?></p>
                <p style="text-align: left;"><strong>Tanggal Inden:</strong> <?= $inden->tanggal_kunjungan; ?></p>
                <p style="text-align: left;"><strong>Status:</strong> <?= $inden->status_inden; ?></p>
            </div>

            <div class="mb-3" style="font-size: 13px;">
                <label>
                    <input type="checkbox" id="confirmCheckbox" required>
                    <span>Pastikan sudah di screenshot kalau mau dikonfirmasi</span>
                </label>
            </div>

            <div class="button-group d-flex justify-content-center gap-3 flex-wrap">
                <form method="post" action="<?= base_url('pesan/konfirmasi/' . $inden->id_inden); ?>" id="confirmationForm">
                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                </form>
                <form method="post" action="<?= base_url('pesan/batal/' . $inden->id_inden); ?>">
                    <button type="submit" class="btn btn-danger">Batal</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('confirmationForm').onsubmit = function(event) {
            var checkbox = document.getElementById('confirmCheckbox');
            if (!checkbox.checked) {
                alert("Pastikan Anda sudah melakukan screenshot sebelum mengonfirmasi.");
                event.preventDefault(); // Membatalkan pengiriman form
            }
        };
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
    <script
        src="<?= base_url('carbook-master/assets/') ?>https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="<?= base_url('carbook-master/assets/') ?>js/google-map.js"></script>
    <script src="<?= base_url('carbook-master/assets/') ?>js/main.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>