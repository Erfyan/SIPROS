<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>About | SIPROS</title>

    <!-- Bootstrap 4.6 -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

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
            Tentang SIPROS
        </h2>
        <p class="text-muted mt-3">
            Sistem Informasi Progres Skripsi untuk Mahasiswa Akhir
        </p>
    </div>

    <div class="card bg-dark text-light p-4 mb-4">
        <h5 class="text-warning">📌 Apa itu SIPROS?</h5>
        <p class="mt-2">
            <strong>SIPROS (Sistem Informasi Progres Skripsi)</strong> adalah
            aplikasi berbasis web yang dirancang untuk membantu mahasiswa
            tingkat akhir dalam mengelola, memantau, dan mendokumentasikan
            progres pengerjaan skripsi secara terstruktur dan efisien.
        </p>
    </div>

    <div class="card bg-dark text-light p-4 mb-4">
        <h5 class="text-warning">🎯 Tujuan SIPROS</h5>
        <ul class="mt-3">
            <li>Membantu mahasiswa memantau progres skripsi per fase</li>
            <li>Menyimpan seluruh dokumen skripsi secara terpusat</li>
            <li>Mencatat revisi dan catatan penting selama bimbingan</li>
            <li>Mengurangi risiko kehilangan file dan keterlambatan</li>
        </ul>
    </div>

    <div class="card bg-dark text-light p-4 mb-4">
        <h5 class="text-warning">⚙️ Fitur Utama</h5>
        <ul class="mt-3">
            <li>Progres skripsi berdasarkan fase (judul hingga semhas)</li>
            <li>Manajemen file skripsi per fase</li>
            <li>Catatan pribadi untuk revisi dan arahan dosen</li>
            <li>Sistem login dan akun personal mahasiswa</li>
            <li>Tampilan dark mode yang nyaman di mata</li>
            <li>Responsif di perangkat mobile dan desktop</li>
        </ul>
    </div>

    <div class="card bg-dark text-light p-4 mb-4">
        <h5 class="text-warning">🛠 Teknologi yang Digunakan</h5>
        <ul class="mt-3">
            <li>Framework: CodeIgniter 3</li>
            <li>Frontend: Bootstrap 4.6</li>
            <li>Database: MySQL</li>
            <li>Bahasa Pemrograman: PHP</li>
        </ul>
    </div>

    <div class="card bg-dark text-light p-4">
        <h5 class="text-warning">📚 Manfaat Bagi Mahasiswa</h5>
        <p class="mt-2">
            Dengan SIPROS, mahasiswa dapat mengatur waktu pengerjaan skripsi
            dengan lebih baik, memiliki dokumentasi progres yang jelas,
            serta meningkatkan kedisiplinan dan motivasi hingga skripsi selesai.
        </p>
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