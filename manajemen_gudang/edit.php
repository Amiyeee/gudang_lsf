<?php
require_once 'db_connect.php'; // Pastikan file koneksi ada

$conn = Database::connect(); // Koneksi ke database

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: data_stock.php?message=ID tidak ditemukan!&color=red");
    exit();
}

$id = $_GET['id'];

// Ambil data yang akan diedit
$query = "SELECT * FROM data_stock WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    header("Location: data_stock.php?message=Data tidak ditemukan!&color=red");
    exit();
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $location = $_POST['location'] ?? '';
    $remark = $_POST['remark'] ?? '';
    $status = $_POST['status'] ?? '';
    $qty_issued = is_numeric($_POST['qty_issued']) ? $_POST['qty_issued'] : 0;
    $balance = is_numeric($_POST['balance']) ? $_POST['balance'] : 0;
    $pic = $_POST['pic'] ?? '';
    $whs = $_POST['whs'] ?? '';
    $ket = $_POST['ket'] ?? '';

    // Query update
    $query = "UPDATE data_stock SET location=:location, remark=:remark, status=:status, 
              qty_issued=:qty_issued, balance=:balance, pic=:pic, whs=:whs, ket=:ket 
              WHERE id=:id";
    
    $stmt = $conn->prepare($query);
    $stmt->execute([
        
        ':location' => $location,
        ':remark' => $remark,
        ':status' => $status,
        ':qty_issued' => $qty_issued,
        ':balance' => $balance,
        ':pic' => $pic,
        ':whs' => $whs,
        ':ket' => $ket,
        ':id' => $id
    ]);
    
    header("Location: data_stock.php?message=Data berhasil diperbarui!&color=green");
    exit();
}

Database::disconnect();
?>
