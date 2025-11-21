<?php 
include 'header.php';
include 'menu.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-custom-primary mb-4">Daftar Akun Baru</h2>
            <form action="register_process.php" method="POST">
                
                <?php if (isset($_SESSION['register_error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['register_error']; unset($_SESSION['register_error']); ?>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password (min 6 karakter)</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-4">
                    <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>

                <button type="submit" class="btn btn-custom-primary w-100">Daftar Sekarang</button>
            </form>

            <p class="text-center mt-3">
                Sudah punya akun? <a href="login.php" class="text-custom-primary fw-bold">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
