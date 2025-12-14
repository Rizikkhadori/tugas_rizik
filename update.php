<?php
require_once 'functions.php';

$id = $_GET['id'] ?? null;
$contact = getContactById($id);

if (!$contact) {
    echo "Data tidak ditemukan!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateContact($id, $_POST['name'], $_POST['phone']);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Kontak</title></head>
<body>
    <h3>Edit Kontak</h3>
    <form method="POST">
        Nama: <input type="text" name="name" value="<?= $contact['name'] ?>" required><br><br>
        No HP: <input type="text" name="phone" value="<?= $contact['phone'] ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Batal</a>
</body>
</html>