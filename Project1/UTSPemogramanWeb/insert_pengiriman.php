<?php
header("Content-Type: application/json");
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode([
        "status" => "error",
        "message" => "Metode harus POST"
    ]);
    exit();
}
$nama_pengirim  = $_POST['nama_pengirim'] ?? '';
$nama_penerima  = $_POST['nama_penerima'] ?? '';
$alamat         = $_POST['alamat'] ?? '';
$berat          = (float)($_POST['berat'] ?? 0);
$tanggal        = $_POST['tanggal'] ?? '';

$status = $_POST['status'] ?? '';
if (empty($status)) {
    $status = "Dalam Proses";
}

$no_resi = 'LARI-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(4)));

if (strpos($tanggal, "/") !== false) {
    $tgl = DateTime::createFromFormat("d/m/Y", $tanggal);
    if ($tgl) {
        $tanggal = $tgl->format("Y-m-d");
    }
}

if ($berat <= 0 || empty($nama_pengirim) || empty($nama_penerima) || empty($alamat)) {
    echo json_encode([
        "status" => "error",
        "message" => "Input tidak valid"
    ]);
    exit();
}

$stmt = $conn->prepare("
    INSERT INTO pengiriman (nama_pengirim, nama_penerima, alamat, berat, tanggal, status, no_resi)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "sssdsss",
    $nama_pengirim,
    $nama_penerima,
    $alamat,
    $berat,
    $tanggal,
    $status,
    $no_resi
);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Berhasil menambahkan pengiriman",
        "no_resi" => $no_resi,
        "status_tersimpan" => $status,
        "tanggal_tearsimpan" => $tanggal
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Database error: " . $stmt->error
    ]);
}
