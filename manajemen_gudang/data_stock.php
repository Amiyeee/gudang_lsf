<?php
require_once 'db_connect.php'; // Pastikan file koneksi di-load

// Ambil koneksi database dengan memanggil class Database
$conn = Database::connect();

$query = "SELECT * FROM data_stock"; // Query untuk mengambil data dari tabel data_stock
$stmt = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Stock</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header>
        <h1>Data Stock</h1>
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="data_stock.php">Data Stock</a></li>
                <li><a href="data_tools.php">Data Tools</a></li>
                <li><a href="good_issue.php">Good Issue</a></li>
                <li><a href="form.php">Form</a></li>
            </ul>
            <a href="logout.php" class="logout-btn">
                <i class="fas fa-power-off"></i> <!-- Ikon Power -->
            </a>
        </nav>
    </header>
    <main> 
        <section id="content">
            <h2>Data Stock</h2>
            <div class="table-container">
                <table>
                    <thead class="thead-fixed">
                        <tr>
                            <th>NO</th>
                            <th>RCVD DATE</th>
                            <th>Item Code</th>
                            <th>ITEM NAME</th>
                            <th>FREE TEXT</th>
                            <th>QTY RCVD</th>
                            <th>UNIT</th>
                            <th>PO NO</th>
                            <th>APPLY TO</th>
                            <th>PC Number</th>
                            <th>Project Name</th>
                            <th>DOC. NO</th>
                            <th>Source</th>
                            <th>WBS CODE</th>
                            <th>LOCATION</th>
                            <th>REMARK</th>
                            <th>STATUS</th>
                            <th>QTY ISSUED</th>
                            <th>BALANCE</th>
                            <th>PIC</th>
                            <th>WHS</th>
                            <th>KET</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($row['rcvd_date'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['item_code'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['item_name'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['free_text'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['qty_rcvd'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['unit'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['po_no'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['apply_to'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['pc_number'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['project_name'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['doc_no'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['from'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['wbs_code'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['location'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['remark'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['status'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['qty_issued'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['balance'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['pic'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['whs'] ?? ''); ?></td>
                                <td><?= htmlspecialchars($row['ket'] ?? ''); ?></td>
                                <td>
                                    <a href="edit_stock.php?id=<?= $row['id']; ?>" class="edit-button">Edit</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Manajemen Gudang</p>
    </footer>
</body>
</html>

<?php
// Tutup koneksi setelah selesai digunakan
Database::disconnect();
?>
