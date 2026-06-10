<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan | SIPROS</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-dark navbar-glass fixed-top" style="background: rgba(13, 13, 13, 0.8) !important;">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="<?= base_url('index.php/dashboard') ?>"
           class="btn btn-outline-warning btn-sm">
           ← 🏠 Dashboard
        </a>

        <span class="navbar-text text-warning font-weight-bold" style="font-size: 1.1rem;">
            📝 Catatan Skripsi
        </span>

        <div style="width: 100px;"></div>
    </div>
</nav>

<!-- ===== CONTENT ===== -->
<div class="container mt-5 pt-3">

    <!-- ===== ALERTS ===== -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" data-autoDismiss="true">
            ✅ <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- ===== FORM CATATAN ===== -->
    <div class="mb-5">
        <h4 class="mb-4 text-light" style="font-weight: 700;">➕ Tambah Catatan Baru</h4>

        <div class="card glass-card text-light">
            <div class="card-body p-5">
                <form method="post" id="noteForm">

                    <div class="form-group mb-4">
                        <label class="text-warning font-weight-600 mb-2">Pilih Fase</label>
                        <select name="fase" class="form-control" required>
                            <option value="">-- Pilih Fase --</option>
                            <option value="Judul">📌 Judul</option>
                            <option value="Proposal">📋 Proposal</option>
                            <option value="Sempro">🎤 Sempro</option>
                            <option value="Penelitian">🔬 Penelitian</option>
                            <option value="Skripsi">📖 Skripsi</option>
                            <option value="Semhas">🏆 Semhas</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="text-warning font-weight-600 mb-2">Isi Catatan</label>
                        <textarea name="isi_catatan"
                                  rows="5"
                                  class="form-control"
                                  placeholder="Tulis catatan, revisi, atau feedback..."
                                  required
                                  data-max-length="1000"></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning glow btn-lg btn-block font-weight-600">
                        💾 Simpan Catatan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- ===== LIST CATATAN ===== -->
    <div class="mb-5">
        <h4 class="mb-4 text-light" style="font-weight: 700;">📚 Daftar Catatan (<?= count($notes) ?> catatan)</h4>

        <?php if(empty($notes)): ?>
            <div class="card glass-card text-center p-5 text-muted">
                <div style="font-size: 3rem; margin-bottom: 15px;">📭</div>
                <p>Belum ada catatan. Mulai catat revisi dan progress skripsimu sekarang!</p>
            </div>
        <?php else: ?>

            <div class="row">
                <?php foreach($notes as $n): ?>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card glass-card text-light h-100" style="animation: slideInUp 0.6s ease;">
                        <div class="card-body">

                            <!-- Header -->
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h6 class="text-warning mb-1 font-weight-700">
                                        📋 <?= $n->fase ?>
                                    </h6>
                                    <small class="text-muted">
                                        🕐 <?= date('d M Y H:i', strtotime($n->created_at)) ?>
                                    </small>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="mb-4">
                                <p class="text-light" style="line-height: 1.6; word-break: break-word;">
                                    <?= nl2br(htmlspecialchars($n->isi_catatan)) ?>
                                </p>
                            </div>

                            <!-- Actions -->
                            <div class="d-flex gap-2">
                                <a href="<?= base_url('index.php/notes/edit/'.$n->id) ?>"
                                   class="btn btn-sm btn-outline-warning flex-grow-1">
                                    ✏️ Edit
                                </a>

                                <a href="<?= base_url('index.php/notes/delete/'.$n->id) ?>"
                                   class="btn btn-sm btn-outline-danger flex-grow-1"
                                   onclick="return confirm('Yakin hapus catatan ini?')">
                                    🗑️ Hapus
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </div>

    <!-- Spacing -->
    <div style="height: 50px;"></div>

</div>

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Custom JS - Animations & Interactions -->
<script src="<?= base_url('assets/js/animations.js') ?>"></script>
<script src="<?= base_url('assets/js/interactions.js') ?>"></script>

</body>
</html>