<?php
require_once 'db_connect.php';

$pdo = Database::connect();

$query = "SELECT * FROM lpb";
$stmt = $pdo->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPB</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>LPB</h1>
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
            <h2>LPB</h2>
            <div class="table-container">
                <table border="1">
                    <thead class="thead-fixed">
                        <tr>
                            <th>No Pengiriman</th>
                            <th>Item Code</th>
                            <th>Item Nama</th>
                            <th>Ket</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>PO Number</th>
                            <th>Project Code</th>
                            <th>Project Name</th>
                            <th>DO No</th>
                            <th>Shipment No</th>
                            <th>WBS Code</th>
                            <th>PRPO IT</th>
                            <th>IT</th>
                            <th>WHS</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody class=".tbody-scroll">
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['no_pengiriman']); ?></td>
                                <td><?php echo htmlspecialchars($row['item_code']); ?></td>
                                <td><?php echo htmlspecialchars($row['item_nama']); ?></td>
                                <td><?php echo htmlspecialchars($row['ket']); ?></td>
                                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                <td><?php echo htmlspecialchars($row['unit']); ?></td>
                                <td><?php echo htmlspecialchars($row['po_number']); ?></td>
                                <td><?php echo htmlspecialchars($row['project_code']); ?></td>
                                <td><?php echo htmlspecialchars($row['project_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['do_no']); ?></td>
                                <td><?php echo htmlspecialchars($row['shipment_no']); ?></td>
                                <td><?php echo htmlspecialchars($row['wbs_code']); ?></td>
                                <td><?php echo htmlspecialchars($row['prpo_it']); ?></td>
                                <td><?php echo htmlspecialchars($row['it']); ?></td>
                                <td><?php echo htmlspecialchars($row['whs']); ?></td>
                                <td><?php echo htmlspecialchars($row['remarks']); ?></td>
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
