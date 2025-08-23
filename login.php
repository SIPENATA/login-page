<?php
// konfigurasi database
$host = "localhost";
$user = "root";   // default XAMPP/MAMP
$pass = "";       // password MySQL (biasanya kosong di XAMPP)
$db   = "login_db";

// koneksi
$conn = new mysqli($host, $user, $pass, $db);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// ambil input dari form
$username = $_POST['username'];
$password = $_POST['password'];

// query cek user
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // login berhasil
    echo "<h2>Login berhasil! Selamat datang, $username</h2>";
    echo "<a href='index.html'>Logout</a>";
} else {
    // login gagal
    echo "<script>alert('Username atau password salah!'); window.location='index.html';</script>";
}

$conn->close();
?>
