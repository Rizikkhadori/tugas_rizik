<?php
define('DB_FILE', 'data.json');

function getContacts() {
    if (!file_exists(DB_FILE)) return [];
    $content = file_get_contents(DB_FILE);
    return json_decode($content, true) ?? [];
}

function saveContacts($data) {
    file_put_contents(DB_FILE, json_encode($data, JSON_PRETTY_PRINT));
}

// CREATE: Tambah Data
function addContact($name, $phone) {
    $contacts = getContacts();
    
    // Validasi sederhana
    if (empty($name) || empty($phone)) {
        return false;
    }

    $newContact = [
        'id' => uniqid(), // ID unik otomatis
        'name' => $name,
        'phone' => $phone
    ];

    $contacts[] = $newContact;
    saveContacts($contacts);
    return true;
}

// UPDATE: Edit Data
function updateContact($id, $name, $phone) {
    $contacts = getContacts();
    $found = false;

    foreach ($contacts as &$contact) {
        if ($contact['id'] === $id) {
            $contact['name'] = $name;
            $contact['phone'] = $phone;
            $found = true;
            break;
        }
    }

    if ($found) {
        saveContacts($contacts);
        return true;
    }
    return false;
}

// DELETE: Hapus Data
function deleteContact($id) {
    $contacts = getContacts();
    $newContacts = [];
    $found = false;

    foreach ($contacts as $contact) {
        if ($contact['id'] === $id) {
            $found = true; // Ketemu, jangan dimasukkan ke list baru (dihapus)
        } else {
            $newContacts[] = $contact;
        }
    }

    if ($found) {
        saveContacts($newContacts);
        return true;
    }
    return false;
}

// READ (Get Single): Ambil satu data untuk diedit
function getContactById($id) {
    $contacts = getContacts();
    foreach ($contacts as $contact) {
        if ($contact['id'] === $id) {
            return $contact;
        }
    }
    return null;
}
?>