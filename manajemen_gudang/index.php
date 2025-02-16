<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Excel ke PostgreSQL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            text-align: center;
        }
        header {
            background: #007bff;
            color: white;
            padding: 15px 0;
            font-size: 24px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            transition: background 0.3s ease;
        }
        header:hover {
            background: #0056b3;
        }
        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: yellow;
        }
        .container {
            margin: 40px auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            width: 60%;
            animation: fadeIn 1s ease-in-out;
        }
        .dropzone {
            border: 2px dashed #007bff;
            border-radius: 10px;
            padding: 30px;
            background: #e9f5ff;
            transition: background 0.3s;
        }
        .dropzone:hover {
            background: #d0e7ff;
        }
        #preview {
            display: none;
            margin-top: 20px;
            padding: 15px;
            background: #e8ffe8;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            animation: fadeIn 1s ease-in-out;
        }
        #buttons {
            display: none;
            margin-top: 20px;
        }
        button {
            margin: 5px;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn-send {
            background: #28a745;
            color: white;
        }
        .btn-cancel {
            background: #dc3545;
            color: white;
        }
        footer {
            background: #007bff;
            color: white;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 14px;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <header>
        <h1>Manajemen Gudang</h1>
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
    <div class="container">
        <h2>Upload Excel ke PostgreSQL</h2>
        <form action="upload.php" class="dropzone" id="uploadExcel">
            <div class="dz-message">
                <h3>Seret dan jatuhkan file Excel di sini</h3>
                <p>atau klik untuk memilih file</p>
            </div>
        </form>
        <div id="preview">
            <h3>Data telah terbaca:</h3>
            <p id="fileInfo"></p>
        </div>
        <div id="buttons">
            <button class="btn-send" id="sendData">Kirim</button>
            <button class="btn-cancel" id="cancelUpload">Batal</button>
        </div>
    </div>
    <script>
        Dropzone.options.uploadExcel = {
            paramName: "excel",
            maxFilesize: 5,
            acceptedFiles: ".xls,.xlsx",
            dictDefaultMessage: "Seret dan jatuhkan file Excel di sini atau klik untuk memilih",
            init: function () {
                this.on("success", function (file, response) {
                    document.getElementById("preview").style.display = "block";
                    document.getElementById("fileInfo").innerText = `File: ${file.name} berhasil diunggah!`;
                    document.getElementById("buttons").style.display = "block";
                });
                this.on("error", function (file, response) {
                    alert("Gagal mengunggah file!");
                });
            }
        };
        document.getElementById("sendData").addEventListener("click", function() {
            alert("Data dikirim ke PostgreSQL!");
        });
        document.getElementById("cancelUpload").addEventListener("click", function() {
            document.getElementById("preview").style.display = "none";
            document.getElementById("buttons").style.display = "none";
            alert("Upload dibatalkan!");
        });
    </script>
</body>
<footer>
    <p>&copy; 2025 Manajemen Gudang</p>
</footer>
</html>
