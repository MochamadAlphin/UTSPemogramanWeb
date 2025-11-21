<?php
session_start();
include 'connection.php';
include 'menu.php'; // Header menu

if (isset($_POST['kirim'])) {
    $nama_pengirim = $_POST['nama_pengirim'];
    $nama_penerima = $_POST['nama_penerima'];
    $alamat = $_POST['alamat'];
    $berat = $_POST['berat'];
    $tanggal = $_POST['tanggal'];

    // Nomor resi otomatis
    $no_resi = "LRN" . rand(100000, 999999);

    // Status default
    $status = "Belum Terkirim";

    // Query insert
    $query = "INSERT INTO pengiriman (no_resi, nama_pengirim, nama_penerima, alamat, berat, tanggal, status)
              VALUES ('$no_resi','$nama_pengirim','$nama_penerima','$alamat','$berat','$tanggal','$status')";
    mysqli_query($conn, $query);

    // Ambil ID untuk redirect
    $last_id = mysqli_insert_id($conn);

    // Masuk ke bukti pengiriman
    header("Location: bukti-pengiriman.php?id=" . $last_id);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kirim Paket - Lariin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .card {
            border-radius: 15px;
        }
        .bg-custom-primary {
            background: #a70000;
        }
        .text-custom-primary {
            color: #a70000;
        }
    </style>
</head>

<body style="background:#f8f9fa;">

<main class="container mt-4">
    <div class="card shadow-lg p-4">
        <h3 class="mb-4 text-center fw-bold text-custom-primary">Form Pengiriman Paket</h3>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Pengirim</label>
                <input type="text" class="form-control" name="nama_pengirim" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Penerima</label>
                <input type="text" class="form-control" name="nama_penerima" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat Tujuan</label>
                <textarea class="form-control" name="alamat" required></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Berat (Kg)</label>
                    <input type="number" class="form-control" name="berat" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>
            </div>
                 
            <input type="hidden" name="status" value="Belum Terkirim">

            <button class="btn text-white w-100 mt-3 bg-custom-primary" name="kirim">
                Kirim Paket
            </button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>  

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
