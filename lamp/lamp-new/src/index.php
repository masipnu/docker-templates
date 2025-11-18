<?php
// Pengaturan koneksi database
$host = 'db'; // Nama host sesuai nama service di docker-compose
$user = 'my_app_user'; // Ganti dengan user yang Anda definisikan di docker-compose
$password = 'ganti_password_user'; // Ganti dengan password yang Anda definisikan
$database = 'my_app_db'; // Ganti dengan nama database yang Anda definisikan

// Membuat koneksi ke MariaDB
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("❌ Koneksi ke database GAGAL: " . $conn->connect_error);
}

// Cek versi PHP
$php_version = phpversion();

// Cek versi MariaDB
$db_version = $conn->server_info;

?>
<!DOCTYPE html>
<html>
<head>
    <title>LAMP Stack Berhasil Dideploy</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        h2 { color: #007bff; }
        p { margin: 5px 0; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>✅ Deployment LAMP Stack Berhasil!</h1>
        <p class="success">Docker Compose berhasil menjalankan Apache, PHP, dan MariaDB.</p>
        
        <h2>Informasi Lingkungan</h2>
        <p><strong>Versi PHP:</strong> <?php echo $php_version; ?></p>
        <p><strong>Web Server:</strong> Apache</p>
        <p><strong>Versi MariaDB:</strong> <?php echo $db_version; ?></p>

        <h2>Status Koneksi Database</h2>
        <p class="success">Status: Terhubung ke database <strong><?php echo $database; ?></strong>.</p>
        
        <h2>Akses phpMyAdmin</h2>
        <p>phpMyAdmin tersedia di <a href="http://localhost:8080" target="_blank">http://localhost:8080</a></p>
    </div>
</body>
</html>
<?php
// Tutup koneksi
$conn->close();
?>
