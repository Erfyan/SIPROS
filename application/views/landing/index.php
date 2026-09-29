<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPROS | Sistem Progres Skripsi</title>

    <!-- Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

    <!-- Font Awesome 6 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-glass">
    <div class="container">

        <a class="navbar-brand font-weight-bold text-warning" href="#">
            <i class="fas fa-star"></i> SIPROS
        </a>

        <!-- Navigation Menu -->
        <div class="ml-auto d-flex align-items-center">

            <a href="<?= base_url('index.php') ?>"
               class="btn btn-outline-warning btn-sm mr-2">
                <i class="fas fa-home"></i> Home
            </a>

            <a href="<?= base_url('index.php/about/index') ?>"
               class="btn btn-outline-warning btn-sm mr-2">
                <i class="fas fa-circle-info"></i> About
            </a>

            <a href="<?= base_url('index.php/contact/index') ?>"
               class="btn btn-outline-warning btn-sm mr-3">
                <i class="fas fa-envelope"></i> Contact
            </a>

            <a href="<?= base_url('index.php/auth/login') ?>"
               class="btn btn-warning btn-sm glow">
                Login
            </a>

        </div>
    </div>
</nav>

<!-- ===== HERO ===== -->
<section class="hero-section d-flex align-items-center justify-content-center">
    <div class="container text-center">
        <h1 class="hero-title mb-4">
            Kelola Progres Skripsimu<br>
            <span class="text-warning glow-text">
                <i class="fas fa-star"></i> Lebih Mudah & Terstruktur
            </span>
        </h1>

        <p class="hero-subtitle mb-5">
            Pantau setiap fase skripsi, simpan file dari awal hingga semhas,
            dan catat revisi dalam satu sistem yang sederhana dan modern.
        </p>

        <div class="hero-cta">
            <a href="<?= base_url('index.php/auth/register') ?>"
               class="btn btn-warning btn-lg glow mr-3 mb-2">
                <i class="fas fa-rocket"></i> Mulai Sekarang
            </a>
            <a href="<?= base_url('index.php/about/index') ?>"
               class="btn btn-outline-warning btn-lg mb-2">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</section>

<!-- ===== FEATURES ===== -->
<section class="feature-section">
    <div class="container">
        <div class="row justify-content-center text-center">

            <!-- Feature 1: Progress -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="feature-card glass-card">
                    <div style="font-size: 3rem; margin-bottom: 15px;"><i class="fas fa-chart-bar"></i></div>
                    <h5>Pantau Progres</h5>
                    <p class="small text-muted">
                        Visualisasi setiap fase skripsi dengan progress bar yang jelas.
                        Lihat status Judul, Proposal, Sempro, Penelitian, Skripsi & Semhas.
                    </p>
                </div>
            </div>

            <!-- Feature 2: File Management -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="feature-card glass-card">
                    <div style="font-size: 3rem; margin-bottom: 15px;"><i class="fas fa-folder"></i></div>
                    <h5>Atur File</h5>
                    <p class="small text-muted">
                        Kelola semua file skripsimu dalam satu dashboard.
                        Upload, organize, dan akses dokumen kapan saja.
                    </p>
                </div>
            </div>

            <!-- Feature 3: Notes -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="feature-card glass-card">
                    <div style="font-size: 3rem; margin-bottom: 15px;"><i class="fas fa-note-sticky"></i></div>
                    <h5>Catat Catatan</h5>
                    <p class="small text-muted">
                        Dokumentasikan revisi, feedback, dan progress.
                        Simpan semua catatan penting untuk referensi di masa depan.
                    </p>
                </div>
            </div>

        </div>

        <!-- Additional Features Row -->
        <div class="row justify-content-center text-center mt-5">
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div style="padding: 20px;">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;"><i class="fas fa-lock"></i></div>
                    <h6 class="text-warning">Aman & Terpercaya</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div style="padding: 20px;">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;"><i class="fas fa-bolt"></i></div>
                    <h6 class="text-warning">Cepat & Ringan</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div style="padding: 20px;">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;"><i class="fas fa-mobile"></i></div>
                    <h6 class="text-warning">Mobile Friendly</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div style="padding: 20px;">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;"><i class="fas fa-palette"></i></div>
                    <h6 class="text-warning">Modern Design</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta-section text-center">
    <div class="container">
        <h2 class="mb-4 font-weight-bold">
            Skripsi Lebih Terarah, Stres Berkurang 📈
        </h2>
        <p class="text-muted mb-5" style="font-size: 1.1rem;">
            Bergabunglah dengan ratusan mahasiswa yang telah memanfaatkan SIPROS untuk kelancaran skripsi mereka
        </p>
        <a href="<?= base_url('index.php/auth/register') ?>"
           class="btn btn-warning btn-lg glow">
            ✍️ Daftar Gratis Sekarang
        </a>
    </div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer text-center">
    <div class="container">
        <p class="mb-2 small">
            © 2025 <span class="text-warning font-weight-bold">SIPROS</span> – Sistem Progres Skripsi
        </p>
        <p class="mb-0 small text-muted">
            Dibuat dengan ❤️ untuk memudahkan perjalanan skripsimu
        </p>
    </div>
</footer>

<!-- Bootstrap 4.6 JS -->
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Custom JS - Animations & Interactions -->
<script src="<?= base_url('assets/js/animations.js') ?>"></script>
<script src="<?= base_url('assets/js/interactions.js') ?>"></script>

</body>
</html>
