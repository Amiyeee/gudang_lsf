<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id"

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Excel ke PostgreSQL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <h1>Manajemen Gudang</h1>
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
    <div class="container">
        <h2>Upload Excel ke PostgreSQL</h2>
        <form action="upload.php" class="dropzone" id="uploadExcel"></form>
        <div id="preview">
            <h3>File siap dikirim:</h3>
            <p id="fileInfo"></p>
        </div>
        <div id="buttons">
            <button class="btn-send" id="sendData">Kirim</button>
            <button class="btn-cancel" id="cancelUpload">Batal</button>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Manajemen Gudang</p>
    </footer>
    <script>
        let myDropzone = new Dropzone("#uploadExcel", {
            url: "upload.php",
            paramName: "excel",
            autoProcessQueue: false,
            maxFiles: 1,
            acceptedFiles: ".xls,.xlsx",
            init: function() {
                let dropzoneInstance = this;

                this.on("addedfile", function(file) {
                    document.getElementById("preview").style.display = "block";
                    document.getElementById("fileInfo").innerText = `File: ${file.name}`;
                    document.getElementById("buttons").style.display = "block";
                });

                document.getElementById("sendData").addEventListener("click", function() {
                    dropzoneInstance.processQueue();
                });

                document.getElementById("cancelUpload").addEventListener("click", function() {
                    dropzoneInstance.removeAllFiles();
                    document.getElementById("preview").style.display = "none";
                    document.getElementById("buttons").style.display = "none";
                });

                this.on("success", function(file, response) {
                    Swal.fire({
                        title: "Sukses!",
                        text: "File berhasil diunggah.",
                        icon: "success"
                    });
                    dropzoneInstance.removeAllFiles();
                    document.getElementById("preview").style.display = "none";
                    document.getElementById("buttons").style.display = "none";
                });

                this.on("error", function(file, errorMessage) {
                    Swal.fire({
                        title: "Error!",
                        text: "Terjadi kesalahan saat mengunggah file.",
                        icon: "error"
                    });
                });
            }
        });
    </script>
</body>

</html>