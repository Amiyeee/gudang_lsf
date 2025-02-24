<?php
require 'db_connect.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["excel"])) {
    $pdo = Database::connect();
    
    $fileName = $_FILES["excel"]["name"];
    $fileTmp = $_FILES["excel"]["tmp_name"];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Validasi ekstensi file
    if (!in_array($fileExt, ['xls', 'xlsx'])) {
        die("Format file tidak valid! Harap unggah file .xls atau .xlsx.");
    }

    // Simpan file ke folder uploads/
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filePath = $uploadDir . time() . "_" . $fileName; // Hindari nama file duplikat
    move_uploaded_file($fileTmp, $filePath);

    // Load file Excel
    try {
        $spreadsheet = IOFactory::load($filePath);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Persiapan query untuk insert data ke database
        $query = "INSERT INTO data_stock 
                  (rcvd_date, item_code, item_name, free_text, qty_rcvd, unit, po_no, apply_to, pc_number, project_name, 
                   doc_no, \"from\", wbs_code) 
                  VALUES 
                  (:rcvd_date, :item_code, :item_name, :free_text, :qty_rcvd, :unit, :po_no, :apply_to, :pc_number, 
                   :project_name, :doc_no, :from, :wbs_code)";
        
        $stmt = $pdo->prepare($query);

        foreach ($sheetData as $index => $row) {
            if ($index == 0) continue; // Lewati baris header

            // Konversi tanggal ke format PostgreSQL (YYYY-MM-DD)
            $rcvd_date = !empty($row[1]) ? DateTime::createFromFormat('j. M. Y', $row[1]) : null;
            $rcvd_date = $rcvd_date ? $rcvd_date->format('Y-m-d') : null;

            // Bind values dan eksekusi query
            $stmt->execute([
                ':rcvd_date'    => $rcvd_date,
                ':item_code'    => $row[2] ?? null,
                ':item_name'    => $row[3] ?? null,
                ':free_text'    => $row[4] ?? null,
                ':qty_rcvd'     => isset($row[5]) && is_numeric($row[5]) ? (int)$row[5] : 0,
                ':unit'         => $row[6] ?? null,
                ':po_no'        => $row[7] ?? null,
                ':apply_to'     => $row[8] ?? null,
                ':pc_number'    => $row[9] ?? null,
                ':project_name' => $row[10] ?? null,
                ':doc_no'       => $row[11] ?? null,
                ':from'         => $row[12] ?? null,
                ':wbs_code'     => $row[13] ?? null
            ]);
        }

        Database::disconnect();

        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Data has been successfully imported!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            });
        </script>";

    } catch (Exception $e) {
        die("Terjadi kesalahan saat memproses file: " . $e->getMessage());
    }
} else {
    die("Tidak ada file yang diunggah.");
}
?>
