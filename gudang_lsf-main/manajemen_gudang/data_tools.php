<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tools</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .title-main {
            text-align: center;
            width: 100%;
        }

        .title-container {
            display: flex;
            justify-content: space-between;
            /* Bagi dua ruang antara judul */
            align-items: center;
            /* Pastikan sejajar tengah secara vertikal */
            width: 100%;
            margin-bottom: 10px;
            /* Jarak dari tabel */
        }

        .title-left,
        .title-right {
            flex: 1;
            text-align: center;
            /* Pastikan judul ada di tengah */
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <h1>LPB</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="lpb.php">LPB</a></li>
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
                <h3 class="title-left">Data Tools 1</h3>
                <h3 class="title-right">Data Tools 2</h3>
            </div>


            <div class="container">
                <!-- Tabel Pertama -->
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Data 1</th>
                                <th>Data 2</th>
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
                                <th>STATUS</th>
                                <th>KETERANGAN</th>
                                <th>CATEGORIES</th>
                                <th>KELENGKAPAN</th>
                                <th>STATUS</th>

                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Tabel Kedua -->
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Data 1</th>
                                <th>Data 2</th>
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
                                <th>STATUS</th>
                                <th>KETERANGAN</th>
                                <th>CATEGORIES</th>
                                <th>KELENGKAPAN</th>
                                <th>STATUS</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Manajemen Gudang</p>
    </footer>
</body>

</html>
