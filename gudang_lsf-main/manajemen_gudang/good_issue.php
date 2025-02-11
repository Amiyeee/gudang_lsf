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
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

header {
    background-color: #007BFF;
    color: white;
    padding: 15px;
    text-align: center;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
    background-color: #0056b3;
}

nav ul li {
    margin: 0 10px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

nav ul li a:hover {
    text-decoration: underline;
}

main {
    padding: 20px;
}

footer {
    text-align: center;
    padding: 10px;
    background-color: #f1f1f1;
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #007BFF;
    color: white;
}

/* Untuk membuat tabel dengan header tetap */
.table-container {
    overflow-x: auto; /* Mengaktifkan scroll horizontal */
    margin-top: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
    overflow: hidden;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #007BFF;
    color: white;
    position: sticky;
    top: 0; /* Header tetap di atas saat scroll */
    z-index: 1;
}

.table-container::-webkit-scrollbar {
    height: 8px;
}

.table-container::-webkit-scrollbar-thumb {
    background-color: #888;
    border-radius: 4px;
}

.table-container::-webkit-scrollbar-thumb:hover {
    background-color: #555;
}

/* Gaya untuk tombol */
.button-container {
    display: flex;
    justify-content: center; /* Tengahkan tombol secara horizontal */
    margin: 20px 0; /* Jarak atas dan bawah */
}

.button {
    display: inline-block;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    color: white;
    background-color: #007bff; /* Warna biru yang menarik */
    border-radius: 8px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.button:hover {
    background-color: #0056b3; /* Warna lebih gelap saat hover */
    transform: translateY(-2px);
}

    </style>
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
            <div class="button-container">
                <!-- Tombol untuk membuka halaman detail pemilik RFID -->
                <a href="rfid_owner.php" class="button">Lihat Pemilik RFID</a>
            </div>
            <div class="table-container">
                <table>
                    <thead>
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
                    <tbody>
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
