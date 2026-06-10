<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Contact | SIPROS</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-glass">
    <div class="container">

        <a class="navbar-brand font-weight-bold text-warning" href="#">
            SIPROS
        </a>

        <!-- SATU pembungkus -->
        <div class="ml-auto d-flex align-items-center">

            <a href="<?= base_url('index.php') ?>" 
               class="btn btn-outline-warning btn-sm mr-2">
                Home
            </a>

            <a href="<?= base_url('index.php/about/index') ?>" 
               class="btn btn-outline-warning btn-sm mr-2">
                About
            </a>

            <a href="<?= base_url('index.php/contact/index') ?>" 
               class="btn btn-outline-warning btn-sm">
                Contact
            </a>

        </div>
    </div>
</nav>


<!-- ===== CONTENT ===== -->
<section class="container" style="padding-top:120px; padding-bottom:80px;">

    <div class="text-center mb-5">
        <h2 class="text-warning glow-text font-weight-bold">
            Hubungi Kami
        </h2>
        <p class="text-muted mt-3">
            Silakan kirim pesan untuk menghubungi pembuat web SIPROS
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>

            <?= validation_errors('<div class="alert alert-danger">','</div>') ?>

            <div class="card bg-dark text-light p-4">
                <form method="post">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"
                               placeholder="Masukkan username">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="Masukkan email">
                    </div>

                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea name="pesan" rows="4" class="form-control"
                                  placeholder="Tulis pesan Anda"></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning btn-block glow">
                        Kirim Pesan
                    </button>

                </form>
            </div>

        </div>
    </div>

</section>

<!-- ===== FOOTER ===== -->
<footer class="footer text-center">
    <div class="container">
        <p class="mb-0 small">
            © 2025 <span class="text-warning">SIPROS</span> – Sistem Progres Skripsi
        </p>
    </div>
</footer>

<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>