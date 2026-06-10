<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | SIPROS</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-dark bg-black">
    <div class="container">
        <span class="navbar-text text-warning font-weight-bold">
            SIPROS
        </span>
        

        <div>
            <span class="mr-3">
                Halo, <?= $nama ?>
            </span>
        <a href="<?= base_url('index.php/auth/logout') ?>"
        class="btn btn-outline-danger btn-sm">
        Logout
        </a>
        </div>
    </div>
</nav>

<!-- ===== CONTENT ===== -->
<div class="container mt-5">

    <!-- ===== SUMMARY ===== -->
    <div class="row text-center mb-4">

        <div class="col-md-4 mb-3">
            <div class="card bg-dark text-light p-3">
                <h6 class="text-muted">Total File</h6>
                <h3 class="text-warning"><?= $files ?></h3>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card bg-dark text-light p-3">
                <h6 class="text-muted">Catatan</h6>
                <h3 class="text-warning"><?= $notes ?></h3>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card bg-dark text-light p-3">
                <h6 class="text-muted">Fase Aktif</h6>
                <h3 class="text-warning">
                    <?= count($progress) ?>
                </h3>
            </div>
        </div>

    </div>

    <!-- ===== PROGRESS ===== -->
    <h5 class="mb-3">Progres Skripsi</h5>

    <div class="row">

        <?php foreach ($progress as $p): ?>
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-light h-100">

                <div class="card-body">
                    <h5 class="card-title text-warning">
                        <?= $p->fase ?>
                    </h5>

                    <span class="badge badge-info mb-2">
                        <?= ucfirst($p->status) ?>
                    </span>

                    <div class="progress mb-2" style="height:8px;">
                        <div class="progress-bar bg-warning"
                             style="width: <?= $p->persentase ?>%">
                        </div>
                    </div>

                    <small class="text-muted">
                        <?= $p->persentase ?>% selesai
                    </small>

                    <div class="mt-3">
                        <a href="#" class="btn btn-outline-warning btn-sm">
                            Detail
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
        

    </div>
            <!-- ===== UPLOAD FILE ===== -->
        <div class="card bg-dark text-light mb-4">
            <div class="card-body">
                <h5 class="text-warning mb-3">Upload File Skripsi</h5>

                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form method="post"
                    action="<?= base_url('index.php/files/upload') ?>"
                    enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Fase Skripsi</label>
                        <select name="fase" class="form-control" required>
                            <option value="">-- Pilih Fase --</option>
                            <option>Judul</option>
                            <option>Proposal</option>
                            <option>Sempro</option>
                            <option>Penelitian</option>
                            <option>Skripsi</option>
                            <option>Semhas</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>File Skripsi</label>
                        <input type="file"
                            name="file_skripsi"
                            class="form-control-file"
                            required>
                        <small class="text-muted">
                            PDF / DOC / DOCX (Max 2MB)
                        </small>
                    </div>

                    <button type="submit" class="btn btn-warning glow">
                        Upload File
                    </button>

                </form>
            </div>
        </div>
        <a href="<?= base_url('index.php/notes') ?>"
        class="btn btn-warning btn-sm glow">
        Kelola Catatan
        </a>
<!-- ===== LIST FILE ===== -->
<div class="card bg-dark text-light mb-5">
    <div class="card-body">
        <h5 class="text-warning mb-3">File Skripsi Anda</h5>

        <?php if(empty($files_grouped)): ?>
            <p class="text-muted">Belum ada file yang diupload.</p>
        <?php else: ?>

            <?php foreach($files_grouped as $fase => $files): ?>
                <div class="mb-4">

                    <!-- Nama Fase -->
                    <h6 class="text-warning">
                        <?= strtolower($fase) ?>
                    </h6>

                    <ul class="list-group">
                        <?php foreach($files as $f): ?>
                            <li class="list-group-item bg-dark text-light
                                       d-flex justify-content-between align-items-center">

                                <!-- Nama file -->
                                <span>
                                    <?= $f->nama_file ?>
                                </span>

                                <!-- Tombol download -->
                                <a href="<?= base_url($f->file_path) ?>"
                                   target="_blank"
                                   class="btn btn-sm btn-outline-warning">
                                    Download
                                </a>

                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>
</div>

</div>

<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>