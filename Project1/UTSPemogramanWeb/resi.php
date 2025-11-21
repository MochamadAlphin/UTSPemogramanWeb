<?php 
include 'header.php';
include 'menu.php';
include 'connection.php';

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$pengiriman = null;
$error_message = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_GET['resi'])) {

    $resi_code = $conn->real_escape_string($_POST['resi_code'] ?? $_GET['resi'] ?? '');

    if (!empty($resi_code)) {

        $stmt = $conn->prepare("SELECT * FROM pengiriman WHERE no_resi = ?");
        $stmt->bind_param("s", $resi_code);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $pengiriman = $result->fetch_assoc();

            if (isset($_GET['resi'])) {
                header("Location: print-resi.php?resi=" . $pengiriman['no_resi']);
                exit();
            }

        } else {
            $error_message = "Kode Resi <strong>" . htmlspecialchars($resi_code) . "</strong> tidak ditemukan.";
        }

        $stmt->close();
    } else {
        $error_message = "Masukkan Kode Resi untuk melacak paket Anda.";
    }
}
?>

<h1 class="text-custom-primary mb-4">Lacak Pengiriman Anda</h1>

<div class="row justify-content-center">
    <div class="col-md-8 mb-5">
        <div class="card shadow-lg p-4">
            <h5 class="text-custom-primary mb-3">Masukkan Kode Resi</h5>
            <form method="POST" action="resi.php">
                <div class="input-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Contoh: LRN123456" name="resi_code" required>
                    <button class="btn btn-custom-primary btn-lg" type="submit">Lacak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if ($pengiriman): ?>
    <div class="card shadow-lg p-4 border-custom-primary border-3">
        <h3 class="text-custom-primary mb-4">Bukti Pengiriman (<?= htmlspecialchars($pengiriman['no_resi']) ?>)</h3>

        <ul class="list-group">
            <li class="list-group-item"><strong>Pengirim:</strong> <?= htmlspecialchars($pengiriman['nama_pengirim']) ?></li>
            <li class="list-group-item"><strong>Penerima:</strong> <?= htmlspecialchars($pengiriman['nama_penerima']) ?></li>
            <li class="list-group-item"><strong>Alamat Tujuan:</strong> <?= nl2br(htmlspecialchars($pengiriman['alamat'])) ?></li>
            <li class="list-group-item"><strong>Berat:</strong> <?= htmlspecialchars($pengiriman['berat']) ?> Kg</li>
            <li class="list-group-item"><strong>Tanggal:</strong> <?= date('d M Y', strtotime($pengiriman['tanggal'])) ?></li>
            <li class="list-group-item"><strong>Status:</strong> <?= htmlspecialchars($pengiriman['status']) ?></li>
        </ul>
    </div>
<?php elseif ($error_message): ?>
    <div class="alert alert-danger text-center shadow-sm" role="alert">
        <h4 class="alert-heading">Gagal Melacak!</h4>
        <p><?= $error_message ?></p>
        <hr>
        <p class="mb-0">Pastikan kode yang Anda masukkan sudah benar.</p>
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>
