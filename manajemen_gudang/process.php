<?php
require_once 'db_connect.php'; // Pastikan file koneksi database ada

try {
    $conn = Database::connect(); // Membuka koneksi database
} catch (PDOException $e) {
    header("Location: form.php?message=Koneksi database gagal!&color=red");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['category'])) {
        header("Location: form.php?message=Kategori tidak ditemukan!&color=red");
        exit();
    }

    $category = $_POST['category'];

    function validateInput($data) {
        return isset($data) ? htmlspecialchars(trim($data)) : null;
    }

    try {
        $conn->beginTransaction(); // Mulai transaksi

        if ($category == "good_issue") {
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
        }elseif ($category == "data_tools") {
            $query = "INSERT INTO data_tools (
                no, tgl_masuk_lsf, durasi_di_lsf, nama_alat, merk_type_size, kapasitas, 
                code_id, serial_no, po_no, penerima, jabatan, lokasi_group, tgl_pinjam, 
                tgl_service, kondisi, qty, satuan, kebutuhan_sparepart, keterangan, categories, kelengkapan, status
            ) VALUES (
                :no, :tgl_masuk_lsf, :durasi_di_lsf, :nama_alat, :merk_type_size, :kapasitas, 
                :code_id, :serial_no, :po_no, :penerima, :jabatan, :lokasi_group, :tgl_pinjam, 
                :tgl_service, :kondisi, :qty, :satuan, :kebutuhan_sparepart, :keterangan, :categories, :kelengkapan, :status
            )";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                ':no' => validateInput($_POST['no'] ?? ''),
                ':tgl_masuk_lsf' => validateInput($_POST['tgl_masuk_lsf'] ?? ''),
                ':durasi_di_lsf' => validateInput($_POST['durasi_di_lsf'] ?? ''),
                ':nama_alat' => validateInput($_POST['nama_alat'] ?? ''),
                ':merk_type_size' => validateInput($_POST['merk_type_size'] ?? ''),
                ':kapasitas' => validateInput($_POST['kapasitas'] ?? ''),
                ':code_id' => validateInput($_POST['code_id'] ?? ''),
                ':serial_no' => validateInput($_POST['serial_no'] ?? ''),
                ':po_no' => validateInput($_POST['po_no'] ?? ''),
                ':penerima' => validateInput($_POST['penerima'] ?? ''),
                ':jabatan' => validateInput($_POST['jabatan'] ?? ''),
                ':lokasi_group' => validateInput($_POST['lokasi_group'] ?? ''),
                ':tgl_pinjam' => validateInput($_POST['tgl_pinjam'] ?? ''),
                ':tgl_service' => validateInput($_POST['tgl_service'] ?? ''),
                ':kondisi' => validateInput($_POST['kondisi'] ?? ''),
                ':qty' => is_numeric($_POST['qty'] ?? null) ? $_POST['qty'] : 0,
                ':satuan' => validateInput($_POST['satuan'] ?? ''),
                ':kebutuhan_sparepart' => validateInput($_POST['kebutuhan_sparepart'] ?? ''), // Perbaikan key
                ':keterangan' => validateInput($_POST['keterangan'] ?? ''),
                ':categories' => validateInput($_POST['categories'] ?? ''),
                ':kelengkapan' => validateInput($_POST['kelengkapan'] ?? ''),
                ':status' => validateInput($_POST['status'] ?? '') // Perbaikan koma
            ]);
        }

        // Simpan perubahan ke database
        $conn->commit();

        // Redirect dengan pesan sukses
        header("Location: form.php?message=Data berhasil disimpan!&color=green");
        exit();
    } catch (PDOException $e) {
        $conn->rollBack();
        header("Location: form.php?message=Gagal menyimpan data: " . urlencode($e->getMessage()) . "&color=red");
        exit();
    }
}
?>