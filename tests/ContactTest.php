<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../functions.php';

class ContactTest extends TestCase
{
    protected function setUp(): void
    {
        // Reset database sebelum setiap tes
        file_put_contents('data.json', '[]');
    }

    public function testAddContact()
    {
        // Tes Tambah Data
        $result = addContact('Budi', '08123456');
        $this->assertTrue($result);

        $data = getContacts();
        $this->assertCount(1, $data);
        $this->assertEquals('Budi', $data[0]['name']);
    }

    public function testUpdateContact()
    {
        // Tambah dulu
        addContact('Budi', '08123456');
        $data = getContacts();
        $id = $data[0]['id'];

        // Tes Edit
        $result = updateContact($id, 'Budi Santoso', '0899999');
        $this->assertTrue($result);

        // Cek apakah berubah
        $updatedData = getContacts();
        $this->assertEquals('Budi Santoso', $updatedData[0]['name']);
    }

    public function testDeleteContact()
    {
        // Tambah dulu
        addContact('Siti', '081111');
        $data = getContacts();
        $id = $data[0]['id'];

        // Tes Hapus
        $result = deleteContact($id);
        $this->assertTrue($result);

        // Cek apakah kosong
        $finalData = getContacts();
        $this->assertCount(0, $finalData);
    }
}
?>
