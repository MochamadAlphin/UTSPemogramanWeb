<?php


if (!isset($conn)) {
    include 'connection.php';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && basename($_SERVER['PHP_SELF']) == 'kirim_paket.php') {
    $nama_pengirim = $conn->real_escape_string($_POST['nama_pengirim']);
    $nama_penerima = $conn->real_escape_string($_POST['nama_penerima']);
    $alamat_penerima = $conn->real_escape_string($_POST['alamat_penerima']);
    $berat = (float)$_POST['berat'];
    $tanggal_kirim = $conn->real_escape_string($_POST['tanggal_kirim']);
    $status = "Dalam Proses"; 

    $resi_code = 'LARI-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(4)));

    if ($berat <= 0 || empty($nama_penerima) || empty($alamat_penerima)) {
        $_SESSION['kirim_error'] = "Input data tidak valid. Pastikan semua kolom terisi dengan benar.";
        header("Location: kirim_paket.php");
        exit();
    }


    $stmt = $conn->prepare("INSERT INTO pengiriman (nama_pengirim, nama_penerima, alamat_penerima, berat, tanggal_kirim, status, resi_code) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdsss", $nama_pengirim, $nama_penerima, $alamat_penerima, $berat, $tanggal_kirim, $status, $resi_code);

    if ($stmt->execute()) {
        $_SESSION['kirim_success'] = "Pengiriman berhasil dibuat! Kode Resi Anda: <strong>" . $resi_code . "</strong>";
        $stmt->close();
        header("Location: kirim_paket.php");
        exit();
    } else {
        $_SESSION['kirim_error'] = "Gagal menyimpan pengiriman ke database: " . $stmt->error;
        $stmt->close();
        header("Location: kirim_paket.php");
        exit();
    }
}

?>