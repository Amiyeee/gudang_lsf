<?php
require_once 'db_connect.php';

try {
    $pdo = Database::connect();
    $query = "SELECT * FROM good_issue"; // Query untuk mengambil data dari tabel good_issue
    $stmt = $pdo->query($query);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Issue</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Good Issue</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="lpb.php">LPB</a></li>
                <li><a href="data_stock.php">Data Stock</a></li>
                <li><a href="good_issue.php">Good Issue</a></li>
                <li><a href="form.php">Form</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="content">
            <h2>Good Issue</h2>
            <div class="table-container">
                <table>
                    <thead class="thead-fixed">
                        <tr>
                            <th>DATE</th>
                            <th>RFID</th>
                            <th>ITEM CODE</th>
                            <th>ITEM NAME</th>
                            <th>QTY</th>
                            <th>UNIT</th>
                            <th>PC.NO</th>
                            <th>BPM</th>
                            <th>RCVD BY</th>
                            <th>FOREMAN / GROUP</th>
                            <th>FREETEXT</th>
                            <th>REMARKS</th>
                            <th>Status</th>
                            <th>WBS Code</th>
                            <th>No GI ITR</th>
                            <th>Posting Date</th>
                            <th>Whse</th>
                            <th>Account Code</th>
                            <th>Project</th>
                            <th>Location</th>
                            <th>Dep</th>
                            <th>Jenis Pengerjaan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class=".tbody-scroll">
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo !empty($row['date']) ? date("Y-m-d H:i:s", strtotime($row['date'])) : 'N/A'; ?></td>
                                <td><?php echo htmlspecialchars($row['card_uid'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['item_code'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['item_name'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['qty'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['unit'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['pc_no'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['bpm'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['rcvd_by'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['foreman_group'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['freetext'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['remarks'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['status'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['wbs_code'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['no_gi_itr'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['posting_date'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['whse'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['account_code'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['project'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['lokasi'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['dep'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['jenis_pengerjaan'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($row['keterangan'] ?? ''); ?></td>
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
