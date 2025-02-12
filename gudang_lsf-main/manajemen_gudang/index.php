<?php
include 'db_connect.php'; // Menyertakan koneksi database
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Gudang</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Manajemen Gudang</h1>
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
        <h2 style="text-align: center;">Selamat Datang di Sistem Manajemen Gudang</h2>

        <!-- Upload File -->
        <section class="upload-container">
            <h2>Upload File</h2>
            <div class="upload-box" id="drop-area">
                <input type="file" id="fileInput" accept=".pdf, .xls, .xlsx" class="hidden">
                <p><strong>Drag and drop</strong> atau
                    <a href="#" onclick="document.getElementById('fileInput').click(); return false;">browse to upload</a>
                </p>
                <p style="font-size: 12px; color: #888;">Unggah File Maksimal 100MB</p>
            </div>

            <div id="actions" class="hidden">
                <button id="submitBtn" class="btn btn-success">Kirim</button>
                <button id="cancelBtn" class="btn btn-danger">Batal</button>
            </div>


            <div class="loading" id="loading">
                <span></span><span></span><span></span>
            </div>

            <p id="status"></p>
        </section>

        <div class="success-box" id="successBox">
            <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" alt="Success">
            <p>🎉 File berhasil diunggah!</p>
            <p style="font-size: 14px; color: #666;">File Anda telah tersimpan di Google Drive.</p>
            <button id="uploadAgain">Upload Lagi</button>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Manajemen Gudang</p>
    </footer>

    <script src="js/upload.js"></script>

</body>

</html>
