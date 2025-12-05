<?php
// Mengambil variabel lingkungan dari Docker Compose
$db_host = getenv('DB_HOST');       // Harus 'mysql'
$db_name = getenv('DB_NAME');       // Harus 'gym_app'
$db_user = getenv('DB_USER');       // Harus 'root'
$db_password = getenv('DB_PASSWORD'); // Harus 'aufa1234'

// Konfigurasi DSN (Data Source Name)
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

try {
    // Membuat koneksi PDO
    $koneksi = new PDO($dsn, $db_user, $db_password);
    // Atur mode error
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Echo ini hanya untuk tes jika koneksi berhasil
    // echo "Koneksi database berhasil!";

} catch (PDOException $e) {
    // Tangani error koneksi (ini akan tampil di browser karena php.ini sudah diatur)
    die("Koneksi gagal: " . $e->getMessage());
}
?>