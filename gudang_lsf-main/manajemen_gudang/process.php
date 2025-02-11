<?php
require_once 'db_connect.php';

try {
    $conn = Database::connect(); // Membuka koneksi database
} catch (PDOException $e) {
    exit("<script>alert('Koneksi database gagal: " . $e->getMessage() . "');</script>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['category'])) {
        echo "<script>showNotification('Kategori tidak ditemukan!', 'red');</script>";
        exit;
    }

    $category = $_POST['category'];

    function validateInput($data) {
        return isset($data) ? htmlspecialchars(trim($data)) : null;
    }

    try {
        $conn->beginTransaction(); // Mulai transaksi

        if ($category == "data_stock") {
            $query = "INSERT INTO data_stock (rcvd_date, item_code, item_name, free_text, qty_rcvd, unit, po_no, apply_to, pc_number, project_name, doc_no, source, wbs_code, location, remark, status, qty_issued, balance, pic, whs, ket) 
                      VALUES (:rcvd_date, :item_code, :item_name, :free_text, :qty_rcvd, :unit, :po_no, :apply_to, :pc_number, :project_name, :doc_no, :source, :wbs_code, :location, :remark, :status, :qty_issued, :balance, :pic, :whs, :ket)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':rcvd_date' => validateInput($_POST['rcvd_date'] ?? ''), 
                ':item_code' => validateInput($_POST['item_code'] ?? ''), 
                ':item_name' => validateInput($_POST['item_name'] ?? ''), 
                ':free_text' => validateInput($_POST['free_text'] ?? ''), 
                ':qty_rcvd' => is_numeric($_POST['qty_rcvd'] ?? null) ? $_POST['qty_rcvd'] : 0, 
                ':unit' => validateInput($_POST['unit'] ?? ''), 
                ':po_no' => validateInput($_POST['po_no'] ?? ''), 
                ':apply_to' => validateInput($_POST['apply_to'] ?? ''), 
                ':pc_number' => validateInput($_POST['pc_number'] ?? ''), 
                ':project_name' => validateInput($_POST['project_name'] ?? ''), 
                ':doc_no' => validateInput($_POST['doc_no'] ?? ''), 
                ':source' => validateInput($_POST['source'] ?? ''), 
                ':wbs_code' => validateInput($_POST['wbs_code'] ?? ''), 
                ':location' => validateInput($_POST['location'] ?? ''), 
                ':remark' => validateInput($_POST['remark'] ?? ''), 
                ':status' => validateInput($_POST['status'] ?? ''), 
                ':qty_issued' => is_numeric($_POST['qty_issued'] ?? null) ? $_POST['qty_issued'] : 0, 
                ':balance' => is_numeric($_POST['balance'] ?? null) ? $_POST['balance'] : 0, 
                ':pic' => validateInput($_POST['pic'] ?? ''), 
                ':whs' => validateInput($_POST['whs'] ?? ''), 
                ':ket' => validateInput($_POST['ket'] ?? '')
            ]);
        } elseif ($category == "good_issue") {
            $query = "INSERT INTO good_issue (date, card_uid, item_code, item_name, qty, unit, pc_no, bpm, rcvd_by, foreman_group, freetext, remarks, status, wbs_code, no_gi_itr, posting_date, whse, account_code, project, lokasi, dep, jenis_pengerjaan, keterangan) 
                      VALUES (NOW(), :card_uid, :item_code, :item_name, :qty, :unit, :pc_no, :bpm, :rcvd_by, :foreman_group, :freetext, :remarks, :status, :wbs_code, :no_gi_itr, :posting_date, :whse, :account_code, :project, :lokasi, :dep, :jenis_pengerjaan, :keterangan)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':card_uid' => validateInput($_POST['card_uid'] ?? ''), 
                ':item_code' => validateInput($_POST['item_code'] ?? ''), 
                ':item_name' => validateInput($_POST['item_name'] ?? ''), 
                ':qty' => is_numeric($_POST['qty'] ?? null) ? $_POST['qty'] : 0, 
                ':unit' => validateInput($_POST['unit'] ?? ''), 
                ':pc_no' => validateInput($_POST['pc_no'] ?? ''), 
                ':bpm' => validateInput($_POST['bpm'] ?? ''), 
                ':rcvd_by' => validateInput($_POST['rcvd_by'] ?? ''), 
                ':foreman_group' => validateInput($_POST['foreman_group'] ?? ''), 
                ':freetext' => validateInput($_POST['freetext'] ?? ''), 
                ':remarks' => validateInput($_POST['remarks'] ?? ''), 
                ':status' => validateInput($_POST['status'] ?? ''), 
                ':wbs_code' => validateInput($_POST['wbs_code'] ?? ''), 
                ':no_gi_itr' => validateInput($_POST['no_gi_itr'] ?? ''), 
                ':posting_date' => validateInput($_POST['posting_date'] ?? ''), 
                ':whse' => validateInput($_POST['whse'] ?? ''), 
                ':account_code' => validateInput($_POST['account_code'] ?? ''), 
                ':project' => validateInput($_POST['project'] ?? ''), 
                ':lokasi' => validateInput($_POST['lokasi'] ?? ''), 
                ':dep' => validateInput($_POST['dep'] ?? ''), 
                ':jenis_pengerjaan' => validateInput($_POST['jenis_pengerjaan'] ?? ''), 
                ':keterangan' => validateInput($_POST['keterangan'] ?? '')
            ]);
        } elseif ($category == "biodata") {
            $query = "INSERT INTO biodata (rfid_tag, nama, jabatan, alamat, no_hp) 
                    VALUES (:rfid_tag, :nama, :jabatan, :alamat, :no_hp)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':rfid_tag' => validateInput($_POST['rfid_tag'] ?? ''),
                ':nama' => validateInput($_POST['nama'] ?? ''),
                ':jabatan' => validateInput($_POST['jabatan'] ?? ''),
                ':alamat' => validateInput($_POST['alamat'] ?? ''),
                ':no_hp' => validateInput($_POST['no_hp'] ?? '')
            ]);
        }

        $conn->commit(); // Commit transaksi jika sukses
        echo "<script>showNotification('Data berhasil disimpan!', 'green');</script>";
    } catch (PDOException $e) {
        $conn->rollBack(); // Rollback jika ada kesalahan
        echo "<script>showNotification('Gagal menyimpan data: " . $e->getMessage() . "', 'red');</script>";
    }
}
?>

<!-- Tambahkan fungsi JavaScript untuk menampilkan notifikasi -->
<script>
function showNotification(message, color) {
    let notification = document.createElement('div');
    notification.textContent = message;
    notification.style.backgroundColor = color;
    notification.style.color = 'white';
    notification.style.padding = '10px';
    notification.style.position = 'fixed';
    notification.style.top = '10px';
    notification.style.right = '10px';
    notification.style.borderRadius = '5px';
    notification.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
</script>
