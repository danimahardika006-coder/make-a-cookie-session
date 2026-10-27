<?php
session_start();

// Periksa apakah session login bernilai true
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}

$is_cookie_set = isset($_COOKIE['username']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Praktikum Pertemuan 6</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f0f2f5;
            margin: 0;
            padding: 30px 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: #ffffff;
            width: 100%;
            max-width: 520px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            color: #1a73e8;
            text-align: center;
        }
        .desc {
            color: #555;
            font-size: 14px;
            text-align: center;
            margin-bottom: 25px;
        }
        .status-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 18px;
            margin-bottom: 20px;
            background-color: #fafbfc;
        }
        .status-item {
            margin-bottom: 14px;
            padding-bottom: 12px;
            border-bottom: 1px dashed #e1e4e8;
        }
        .status-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-success {
            background-color: #d4edda;
            color: #155724;
        }
        .badge-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        .info-box {
            background-color: #e8f0fe;
            border-left: 4px solid #1a73e8;
            padding: 12px 15px;
            border-radius: 0 6px 6px 0;
            font-size: 13px;
            color: #1a4f9c;
            margin-top: 15px;
            line-height: 1.5;
        }
        .btn {
            display: inline-block;
            text-decoration: none;
            text-align: center;
            width: 100%;
            padding: 11px;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 10px;
        }
        .btn-refresh {
            background-color: #28a745;
        }
        .btn-refresh:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #1a73e8;
        }
        .btn-secondary:hover {
            background-color: #1557b0;
        }
        .btn-logout {
            background-color: #dc3545;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Halaman Dashboard</h2>
    <p class="desc">Selamat datang <b><?= htmlspecialchars($_SESSION['username'] ?? 'admin') ?></b> di Dashboard!</p>

    <div class="status-card">
        <h3 style="margin-top: 0; color: #333; font-size: 16px;">Hasil Pengamatan (Dashboard):</h3>

        <!-- STATUS SESSION LOGIN -->
        <div class="status-item">
            <div><b>1. Session ['login']</b></div>
            <div style="margin: 6px 0;">
                Nilai: <code><?= var_export($_SESSION['login'], true) ?></code>
                <span class="badge badge-success">AKTIF</span>
            </div>
            <small style="color: #555;">
                Session login tetap bernilai <code>true</code> dan tidak kedaluwarsa setelah 5 detik.
            </small>
        </div>

        <!-- STATUS COOKIE USERNAME -->
        <div class="status-item">
            <div><b>2. Cookie ['username'] (5 Detik)</b></div>
            <div style="margin: 6px 0;">
                <?php if ($is_cookie_set): ?>
                    Nilai: <code>"<?= htmlspecialchars($_COOKIE['username']) ?>"</code>
                    <span class="badge badge-success">ADA (Belum 5 Detik)</span>
                <?php else: ?>
                    Nilai: <code>null</code>
                    <span class="badge badge-danger">KEDALUWARSA / HILANG</span>
                <?php endif; ?>
            </div>
            <small style="color: #555;">
                <?php if ($is_cookie_set): ?>
                    Cookie masih ada. Tunggu hingga 5 detik lalu klik <b>Muat Ulang Halaman</b>.
                <?php else: ?>
                    Cookie telah terhapus otomatis oleh browser setelah 5 detik berlalu.
                <?php endif; ?>
            </small>
        </div>
    </div>

    <div class="info-box">
        <b>Hasil Observasi:</b><br>
        Setelah lebih dari 5 detik, reload halaman ini. Cookie akan otomatis hilang, namun Anda tetap berada di Dashboard karena <code>$_SESSION['login']</code> masih <code>true</code>!
    </div>

    <div style="margin-top: 20px;">
        <a href="dashboard.php" class="btn btn-refresh">🔄 Muat Ulang Halaman (Refresh)</a>
        <a href="login.php" class="btn btn-secondary">⬅️ Kembali ke Halaman Login</a>
        <a href="logout.php" class="btn btn-logout">🚪 Logout</a>
    </div>
</div>

</body>
</html>

</html>