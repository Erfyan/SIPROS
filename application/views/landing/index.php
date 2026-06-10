<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIPROS | Sistem Progres Skripsi</title>

    <!-- Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

    <!-- Custom CSS -->
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

<!-- ===== HERO ===== -->
<section class="hero-section d-flex align-items-center">
    <div class="container text-center">
        <h1 class="hero-title mb-4">
            Kelola Progres Skripsimu<br>
            <span class="text-warning glow-text">
                Lebih Mudah & Terstruktur
            </span>
        </h1>

        <p class="hero-subtitle mb-5">
            Pantau setiap fase skripsi, simpan file dari awal hingga semhas,
            dan catat revisi dalam satu sistem yang sederhana.
        </p>

        <a href="<?= base_url('index.php/auth/login') ?>"
           class="btn btn-warning btn-lg glow mr-3 mb-2">
            Mulai Sekarang
        </a>
    </div>
</section>

<!-- ===== FEATURES ===== -->
<!-- ===== FEATURES ===== -->
<section class="feature-section">
    <div class="container">
        <div class="row justify-content-center text-center">

            <!-- Feature 1 -->
            <div class="col-md-4 col-12 mb-4">
                <div class="feature-card mx-auto">
                    <h5>📊 Progres Skripsi</h5>
                    <p class="small text-muted">
                        Pantau setiap fase skripsi dari awal hingga semhas.
                    </p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-md-4 col-12 mb-4">
                <div class="feature-card mx-auto">
                    <h5>📁 Manajemen File</h5>
                    <p class="small text-muted">
                        Simpan dan kelola file skripsi dengan aman.
                    </p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-md-4 col-12 mb-4">
                <div class="feature-card mx-auto">
                    <h5>📝 Catatan</h5>
                    <p class="small text-muted">
                        Catat revisi dan perkembangan skripsimu.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta-section text-center">
    <div class="container">
        <h2 class="mb-4 font-weight-bold">
            Skripsi Lebih Terarah, Stres Berkurang
        </h2>
        <a href="<?= base_url('index.php/auth/register') ?>"
           class="btn btn-warning btn-lg glow">
            Daftar Sekarang
        </a>
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

<!-- Bootstrap 4.6 JS -->
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>
