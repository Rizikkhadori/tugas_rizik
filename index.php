<?php
require_once 'functions.php';
$contacts = getContacts();
?>

<!DOCTYPE html>
<html>
<head><title>Daftar Kontak</title></head>
<body>
    <h2>Daftar Kontak Mahasiswa (CRUD)</h2>
    <a href="create.php">+ Tambah Kontak Baru</a>
    <br><br>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= htmlspecialchars($contact['name']) ?></td>
                <td><?= htmlspecialchars($contact['phone']) ?></td>
                <td>
                    <a href="update.php?id=<?= $contact['id'] ?>">Edit</a> | 
                    <a href="delete.php?id=<?= $contact['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>