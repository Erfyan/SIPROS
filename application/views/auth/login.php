<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIPROS</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="d-flex align-items-center" style="height: 100vh; background: linear-gradient(135deg, rgba(255, 193, 7, 0.05) 0%, rgba(0, 217, 255, 0.05) 100%);">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">

            <div class="card glass-card text-light p-5" style="animation: slideInUp 0.6s ease;">

                <!-- Header -->
                <div class="text-center mb-4">
                    <div style="font-size: 3rem; margin-bottom: 15px;">✨</div>
                    <h3 class="text-warning font-weight-800">SIPROS Login</h3>
                    <p class="text-muted small">Kelola progres skripsimu dengan mudah</p>
                </div>

                <!-- Alerts -->
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" data-autoDismiss="true">
                        ❌ <?= $this->session->flashdata('error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <!-- Form -->
                <form method="post" id="loginForm">

                    <div class="form-group mb-4">
                        <label class="text-warning font-weight-600 mb-2">📧 Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="Masukkan email Anda"
                               required
                               data-tooltip="Email yang terdaftar di SIPROS">
                    </div>

                    <div class="form-group mb-4">
                        <label class="text-warning font-weight-600 mb-2">🔐 Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Masukkan password Anda"
                               required
                               data-tooltip="Password minimal 6 karakter">
                    </div>

                    <button type="submit" class="btn btn-warning btn-block glow btn-lg font-weight-600 mb-3">
                        🚀 Login Sekarang
                    </button>

                    <button type="reset" class="btn btn-outline-warning btn-block btn-sm">
                        🔄 Reset Form
                    </button>

                </form>

                <!-- Divider -->
                <div class="text-center my-4">
                    <small class="text-muted">────────────────────</small>
                </div>

                <!-- Register Link -->
                <p class="text-center mb-0">
                    <small class="text-muted">Belum punya akun?</small><br>
                    <a href="<?= base_url('index.php/auth/register') ?>"
                       class="btn btn-outline-warning btn-sm mt-2 w-100">
                        ✍️ Daftar Sekarang
                    </a>
                </p>

                <!-- Back Link -->
                <p class="text-center mt-3">
                    <a href="<?= base_url('index.php') ?>"
                       class="text-muted small" style="text-decoration: none;">
                        ← Kembali ke Beranda
                    </a>
                </p>

            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Custom JS - Animations & Interactions -->
<script src="<?= base_url('assets/js/animations.js') ?>"></script>
<script src="<?= base_url('assets/js/interactions.js') ?>"></script>

</body>
</html>