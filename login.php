<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // === CEK DI TABEL ANGGOTA ===
    $stmt = $koneksi->prepare("SELECT * FROM anggota WHERE email = ? AND password = ?");
    $stmt->execute([$email, $password]);
    $data_anggota = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data_anggota) {
        $_SESSION['id_user'] = $data_anggota['id_anggota'];
        $_SESSION['nama'] = $data_anggota['nama_anggota'];
        $_SESSION['level'] = 'user';

        header("Location: user.php");
        exit;
    }

    // === CEK DI TABEL ADMIN ===
    $stmt = $koneksi->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
    $stmt->execute([$email, $password]);
    $data_admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data_admin) {
        $_SESSION['id_user'] = $data_admin['id_admin'];
        $_SESSION['nama'] = $data_admin['nama_admin'];
        $_SESSION['level'] = 'superadmin';

        header("Location: superadmin.php");
        exit;
    }

    echo "<script>alert('❌ Email atau password salah!');</script>";
}
?>
