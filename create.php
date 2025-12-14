<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    addContact($_POST['name'], $_POST['phone']);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Tambah Kontak</title></head>
<body>
    <h3>Tambah Kontak</h3>
    <form method="POST">
        Nama: <input type="text" name="name" required><br><br>
        No HP: <input type="text" name="phone" required><br><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>