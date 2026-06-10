<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catatan | SIPROS</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<nav class="navbar navbar-dark bg-black">
    <div class="container">
        <a href="<?= base_url('index.php/dashboard') ?>"
           class="btn btn-outline-warning btn-sm">
           ← Dashboard
        </a>

        <span class="navbar-text text-warning font-weight-bold">
            Catatan Skripsi
        </span>
    </div>
</nav>

<div class="container mt-5">

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- FORM CATATAN -->
    <div class="card bg-dark text-light mb-4">
        <div class="card-body">
            <h5 class="text-warning mb-3">Tambah Catatan</h5>

            <form method="post">
                <div class="form-group">
                    <label>Fase Skripsi</label>
                    <select name="fase" class="form-control" required>
                        <option>Judul</option>
                        <option>Proposal</option>
                        <option>Sempro</option>
                        <option>Penelitian</option>
                        <option>Skripsi</option>
                        <option>Semhas</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Isi Catatan</label>
                    <textarea name="isi_catatan"
                              rows="4"
                              class="form-control"
                              placeholder="Tulis catatan atau revisi..."
                              required></textarea>
                </div>

                <button class="btn btn-warning glow">
                    Simpan Catatan
                </button>
            </form>
        </div>
    </div>

    <!-- LIST CATATAN -->
 <h5 class="mb-3">Daftar Catatan</h5>

<?php foreach($notes as $n): ?>
    <div class="card bg-dark text-light mb-3">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <h6 class="text-warning mb-1">
                    <?= $n->fase ?>
                </h6>

                <div>
                    <a href="<?= base_url('index.php/notes/edit/'.$n->id) ?>"
                       class="btn btn-sm btn-outline-warning">
                        Edit
                    </a>

                    <a href="<?= base_url('index.php/notes/delete/'.$n->id) ?>"
                       class="btn btn-sm btn-outline-danger"
                       onclick="return confirm('Hapus catatan ini?')">
                        Hapus
                    </a>
                </div>
            </div>

            <p class="mt-2 mb-1">
                <?= nl2br($n->isi_catatan) ?>
            </p>

            <small class="text-muted">
                <?= date('d M Y H:i', strtotime($n->created_at)) ?>
            </small>

        </div>
    </div>
<?php endforeach; ?>
</div>

<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>