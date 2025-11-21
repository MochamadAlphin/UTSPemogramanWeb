<?php
include 'connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Cek password (TANPA HASH)
        if ($password === $user['password']) {

            $_SESSION['user_logged_in'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];

            header("Location: kirim_paket.php");
            exit();

        } else {
            $_SESSION['login_error'] = "Password salah.";
            header("Location: login.php");
            exit();
        }

    } else {
        $_SESSION['login_error'] = "Username tidak ditemukan.";
        header("Location: login.php");
        exit();
    }
}
?>
