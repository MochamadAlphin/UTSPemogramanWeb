<?php
session_start();
include 'connection.php';

// CEK LOGIN
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

include 'menu.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM pengiriman WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pengiriman</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .card { border-radius: 15px; }
        .bg-custom-primary { background:#a70000; color:white; }
        .text-custom-primary { color:#a70000; }
    </style>
</head>

<body style="background:#f7f7f7">

<main class="container mt-4">
    <div class="card shadow-lg p-4">

        <h3 class="text-center fw-bold text-custom-primary mb-4">
            Bukti Pengiriman Paket
        </h3>

        <table class="table table-bordered">
            <tr><th>No Resi</th><td><?= $row['no_resi']; ?></td></tr>
            <tr><th>Pengirim</th><td><?= $row['nama_pengirim']; ?></td></tr>
            <tr><th>Penerima</th><td><?= $row['nama_penerima']; ?></td></tr>
            <tr><th>Alamat</th><td><?= $row['alamat']; ?></td></tr>
            <tr><th>Berat</th><td><?= $row['berat']; ?> Kg</td></tr>
            <tr><th>Tanggal</th><td><?= $row['tanggal']; ?></td></tr>
            <tr><th>Status</th><td><b><?= $row['status']; ?></b></td></tr>
        </table>

        <button class="btn bg-custom-primary w-100 mt-3" onclick="window.print()">
            Cetak Bukti Pengiriman
        </button>

    </div>
</main>

<?php include 'footer.php'; ?>  
</body>
</html>
