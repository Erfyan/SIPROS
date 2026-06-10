<!DOCTYPE html>
<html>
<head>
    <title>Login | SIPROS</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="d-flex align-items-center" style="height:100vh">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card bg-dark text-light p-4">
                <h4 class="text-center text-warning mb-4">Login</h4>

                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form method="post">
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password">

                    <button class="btn btn-warning btn-block glow">Login</button>
                </form>

                <p class="text-center mt-3 small">
                    Belum punya akun?
                    <a href="<?= base_url('index.php/auth/register') ?>" class="btn btn-outline-warning btn-sm mr-2">Daftar</a>
                </p>
            </div>

        </div>
    </div>
</div>

</body>
</html>