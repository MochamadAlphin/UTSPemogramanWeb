<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARI - Layanan Pengiriman Profesional</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        :root {
            --primary-color: #a70000;
            --primary-dark: #7a0000;
        }
        .bg-custom-primary {
            background-color: var(--primary-color) !important;
        }
        .btn-custom-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-custom-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: white;
        }
        .nav-link.active, .navbar-brand {
            font-weight: 600;
        }
        .card-info:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            transform: translateY(-5px);
            cursor: pointer;
            border-color: var(--primary-color) !important;
        }
        .text-custom-primary {
            color: var(--primary-color) !important;
        }
        .border-custom-primary {
            border-color: var(--primary-color) !important;
        }
    </style>
</head>
<body>
