<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        border: none;
    }

    .user-photo img {
        border: 4px solid #6c757d;
    }

    .h2 {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <!-- Foto User -->
                        <div class="user-photo mb-3">
                            <img
                                src="<?= base_url('AdminLTE-3.1.0/assets/foto_user/' . $this->session->userdata('foto_user')) ?>"
                                alt="Foto User"
                                class="rounded-circle img-fluid"
                                style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <!-- Nama User -->
                        <h4 class="card-title">
                            <?= $this->session->userdata('user'); ?>
                        </h4>
                        <!-- Email User -->
                        <p class="card-text text-muted">
                            <?= $this->session->userdata('email'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>