<?php
include 'header.php';
include 'menu.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-custom-primary mb-4">Masuk Akun</h2>

            <?php if (isset($_SESSION['register_success'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['register_success']; unset($_SESSION['register_success']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['login_error'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
                </div>
            <?php endif; ?>

            <form action="login_process.php" method="POST">
                
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="mb-4">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-custom-primary w-100">Masuk</button>
            </form>

            <p class="text-center mt-3">
                Belum punya akun? <a href="register.php">Daftar di sini</a>
            </p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
