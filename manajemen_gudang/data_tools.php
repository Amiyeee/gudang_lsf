<?php
require_once 'db_connect.php';

try {
    $pdo = Database::connect();

    // Query untuk mengambil data dari tabel data_tools
    $query1 = "SELECT * FROM data_tools";
    $stmt1 = $pdo->query($query1);
    $data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tools</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>LPB</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="data_stock.php">Data Stock</a></li>
                <li><a href="data_tools.php">Data Tools</a></li>
                <li><a href="good_issue.php">Good Issue</a></li>
                <li><a href="form.php">Form</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="content">
            <h2 class="title-main">Data Tools</h2>

            <div class="title-container">
                <h3 class="title-left">Data 1</h3>
            </div>

            <div class=".container">
                <!-- Tabel Data 1 -->
                <div class="table-container">
                    <table id="data_tools">
                        <thead class="thead-fixed">
                            <tr>
                                <th>No</th>
                                <th>TGL MASUK LSF</th>
                                <th>Durasi di LSF</th>
                                <th>NAMA ALAT</th>
                                <th>MERK / TYPE/SIZE</th>
                                <th>CAPASITAS</th>
                                <th>CODE (ID NUMBER)</th>
                                <th>SERIAL NO.</th>
                                <th>PO.NO</th>
                                <th>PENERIMA</th>
                                <th>JABATAN</th>
                                <th>LOKASI/GROUP</th>
                                <th>TGL PINJAM</th>
                                <th>TGL SERVICE</th>
                                <th>KONDISI</th>
                                <th>QTY</th>
                                <th>SATUAN</th>
                                <th>KEBUTUHAN SPAREPART</th>
                                <th>KETERANGAN</th>
                                <th>CATEGORIES</th>
                                <th>KELENGKAPAN</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data1 as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['no'] ?? ''); ?></td>
                                <td><?php echo !empty($row['tgl_masuk_lsf']) ? date("Y-m-d", strtotime($row['tgl_masuk_lsf'])) : 'N/A'; ?></td>
                                <td><?php echo htmlspecialchars($row['durasi_di_lsf'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['nama_alat'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['merk_type_size'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['kapasitas'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['code_id'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['serial_no'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['po_no'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['penerima'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['jabatan'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['lokasi_group'] ?? ''); ?></td>
                                <td><?php echo !empty($row['tgl_pinjam']) ? date("Y-m-d", strtotime($row['tgl_pinjam'])) : 'N/A'; ?></td>
                                <td><?php echo !empty($row['tgl_service']) ? date("Y-m-d", strtotime($row['tgl_service'])) : 'N/A'; ?></td>
                                <td><?php echo htmlspecialchars($row['kondisi'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['qty'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['satuan'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['kebutuhan_sparepart'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['keterangan'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['categories'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['kelengkapan'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['status'] ?? ''); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
<footer>
        <p>&copy; 2025 Manajemen Gudang</p>
    </footer>
</html>
