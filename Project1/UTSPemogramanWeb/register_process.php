<?php
include 'connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['register_error'] = "Semua field wajib diisi.";
        header("Location: register.php");
        exit();
    }

    if (strlen($password) < 6) {
        $_SESSION['register_error'] = "Password harus minimal 6 karakter.";
        header("Location: register.php");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['register_error'] = "Konfirmasi password tidak cocok.";
        header("Location: register.php");
        exit();
    }

    $stmt_check = $conn->prepare("SELECT id FROM login WHERE username = ?");
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $_SESSION['register_error'] = "Username sudah terdaftar.";
        $stmt_check->close();
        header("Location: register.php");
        exit();
    }
    $stmt_check->close();

    $stmt_insert = $conn->prepare("INSERT INTO login (username, password, email) VALUES (?, ?, ?)");
    $stmt_insert->bind_param("sss", $username, $password, $email);

    if ($stmt_insert->execute()) {
        $_SESSION['register_success'] = "Pendaftaran berhasil!";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['register_error'] = "Gagal menyimpan data.";
        header("Location: register.php");
        exit();
    }
}
?>
