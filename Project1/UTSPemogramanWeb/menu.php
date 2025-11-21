<?php 

$is_logged_in = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-custom-primary sticky-top shadow-lg">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="halaman-utama.php">
            <img src="img/logo.png" style="width:50px; height:50px;" class="me-2">
            <span>LariIn, Layanan Kirim Indonesia</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'halaman-utama.php') ? 'active' : '' ?>" href="halaman-utama.php">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'detail.php') ? 'active' : '' ?>" href="detail.php?id=1">Tentang Perusahaan</a>
                </li>

                <?php if ($is_logged_in): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'kirim_paket.php') ? 'active' : '' ?>" href="kirim_paket.php">Kirim Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'resi.php') ? 'active' : '' ?>" href="resi.php">Cek Resi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-light ms-2" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'login.php') ? 'active' : '' ?>" href="login.php">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light text-custom-primary ms-2" href="register.php">Daftar</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>

    </div>
</nav>

<main class="container my-5">
