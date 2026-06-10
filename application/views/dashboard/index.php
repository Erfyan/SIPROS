<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | SIPROS</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-dark navbar-glass fixed-top" style="background: rgba(13, 13, 13, 0.8) !important;">
    <div class="container d-flex justify-content-between align-items-center">
        <span class="navbar-text text-warning font-weight-bold" style="font-size: 1.2rem;">
            ✨ SIPROS Dashboard
        </span>

        <div class="d-flex align-items-center">
            <span class="mr-3 text-light" style="font-weight: 500;">
                👤 Halo, <strong><?= $nama ?></strong>
            </span>
            <a href="<?= base_url('index.php/auth/logout') ?>"
               class="btn btn-outline-danger btn-sm">
                🚪 Logout
            </a>
        </div>
    </div>
</nav>

<!-- ===== CONTENT ===== -->
<div class="container mt-5 pt-3">

    <!-- ===== ALERTS ===== -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" data-autoDismiss="true" data-dismiss-duration="3000">
            ✅ <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" data-autoDismiss="true" data-dismiss-duration="5000">
            ❌ <?= $this->session->flashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- ===== SUMMARY CARDS ===== -->
    <div class="row mb-5">

        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card glass-card text-light h-100" style="animation: slideInUp 0.6s ease 0.1s both;">
                <div class="card-body text-center">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;">📁</div>
                    <h6 class="text-muted mb-2">Total File</h6>
                    <h2 class="text-warning" style="font-weight: 800;"><?= $files ?></h2>
                    <small class="text-muted">file trupload</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card glass-card text-light h-100" style="animation: slideInUp 0.6s ease 0.2s both;">
                <div class="card-body text-center">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;">📝</div>
                    <h6 class="text-muted mb-2">Catatan</h6>
                    <h2 class="text-warning" style="font-weight: 800;"><?= $notes ?></h2>
                    <small class="text-muted">catatan tersimpan</small>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card glass-card text-light h-100" style="animation: slideInUp 0.6s ease 0.3s both;">
                <div class="card-body text-center">
                    <div style="font-size: 2.5rem; margin-bottom: 10px;">🎯</div>
                    <h6 class="text-muted mb-2">Fase Aktif</h6>
                    <h2 class="text-warning" style="font-weight: 800;"><?= count($progress) ?></h2>
                    <small class="text-muted">fase terpantau</small>
                </div>
            </div>
        </div>

    </div>

    <!-- ===== PROGRESS SECTION ===== -->
    <div class="mb-5">
        <h4 class="mb-4 text-light" style="font-weight: 700;">📊 Progres Skripsi</h4>

        <div class="row">
            <?php foreach ($progress as $p): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card glass-card text-light h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title text-warning mb-0" style="font-weight: 700;">
                                <?= $p->fase ?>
                            </h5>
                            <span class="badge badge-info" style="animation: pulse 2s infinite;">
                                <?= ucfirst($p->status) ?>
                            </span>
                        </div>

                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar bg-warning"
                                 style="width: 0%; animation: slideInLeft 1.5s ease forwards;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted">
                                Progres: <strong class="text-warning"><?= $p->persentase ?>%</strong>
                            </small>
                        </div>

                        <a href="#" class="btn btn-sm btn-outline-warning" data-tooltip="Lihat detail fase">
                            📋 Detail
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ===== UPLOAD FILE SECTION ===== -->
    <div class="mb-5">
        <h4 class="mb-4 text-light" style="font-weight: 700;">📤 Upload File Skripsi</h4>

        <div class="card glass-card text-light">
            <div class="card-body">
                <form method="post"
                      action="<?= base_url('index.php/files/upload') ?>"
                      enctype="multipart/form-data"
                      id="uploadForm">

                    <div class="form-group">
                        <label class="text-warning font-weight-600">Pilih Fase</label>
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

                    <div class="form-group">
                        <label class="text-warning font-weight-600">Pilih File</label>
                        <div class="custom-file">
                            <input type="file"
                                   id="file_input"
                                   name="file_skripsi"
                                   class="form-control-file"
                                   required>
                            <small class="text-muted d-block mt-2">
                                ✓ Format file: Bebas | ✓ Ukuran: Bebas
                            </small>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning glow btn-block">
                        🚀 Upload File
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- ===== QUICK ACTIONS ===== -->
    <div class="mb-5 text-center">
        <a href="<?= base_url('index.php/notes') ?>"
           class="btn btn-outline-warning mr-3 mb-2">
            📝 Kelola Catatan
        </a>
        <a href="<?= base_url('index.php/dashboard') ?>"
           class="btn btn-outline-warning mb-2">
            🔄 Refresh Dashboard
        </a>
    </div>

    <!-- ===== FILE LIST SECTION ===== -->
    <div class="mb-5">
        <h4 class="mb-4 text-light" style="font-weight: 700;">📂 File Skripsi Anda</h4>

        <?php if(empty($files_grouped)): ?>
            <div class="card glass-card text-center p-5 text-muted">
                <div style="font-size: 3rem; margin-bottom: 15px;">📭</div>
                <p>Belum ada file yang diupload. Mulai upload file skripsimu sekarang!</p>
            </div>
        <?php else: ?>

            <?php foreach($files_grouped as $fase => $files): ?>
                <div class="mb-4">
                    <h6 class="text-warning font-weight-700 mb-3" style="font-size: 1rem; text-transform: uppercase; letter-spacing: 1px;">
                        📁 <?= strtolower($fase) ?> (<?= count($files) ?> file)
                    </h6>

                    <div class="list-group">
                        <?php foreach($files as $f): ?>
                            <div class="list-group-item glass-card d-flex justify-content-between align-items-center">
                                <div style="flex: 1;">
                                    <small class="text-muted">
                                        📄 <?= $f->nama_file ?>
                                    </small>
                                    <br>
                                    <small class="text-subtle">
                                        🕐 <?= date('d M Y H:i', strtotime($f->uploaded_at)) ?>
                                    </small>
                                </div>

                                <div class="ml-3 d-flex gap-2">
                                    <a href="<?= base_url($f->file_path) ?>"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-warning"
                                       data-tooltip="Unduh file">
                                        ⬇️ Download
                                    </a>

                                    <a href="<?= base_url('index.php/files/delete/'.$f->id) ?>"
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('⚠️ Yakin hapus file ini? Aksi tidak bisa dibatalkan.');"
                                       data-tooltip="Hapus file">
                                        🗑️ Hapus
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>

    <!-- Spacing -->
    <div style="height: 50px;"></div>

</div>

<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Custom JS - Animations & Interactions -->
<script src="<?= base_url('assets/js/animations.js') ?>"></script>
<script src="<?= base_url('assets/js/interactions.js') ?>"></script>

<script>
    // Update progress bar width on page load
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.progress-bar').forEach(function(bar) {
            const parentProgress = bar.parentElement;
            const width = parentProgress.dataset.width || '50';
            bar.style.width = width + '%';
        });
    });
</script>

</body>
</html>