<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemilik RFID</title>
    <link rel="stylesheet" href="css/user.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 15px 0;
            font-size: 24px;
        }
        main {
            padding: 20px;
        }
        #rfid-details {
            background: white;
            padding: 20px;
            margin: 20px auto;
            width: 50%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            text-align: left;
            line-height: 1.6;
            font-size: 18px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Detail Pemilik RFID</h1>
    </header>
    <main>
        <section id="rfid-details">
            <a href="good_issue.php">
                <button>Data User</button>
            </a>
            <h2>Data Pemilik</h2>
            <p><strong>ID:</strong> 12345</p>
            <p><strong>Nama:</strong> Ali</p>
            <p><strong>Jabatan:</strong> Staff Gudang</p>
            <p><strong>No HP:</strong> 08123456789</p>
            <p><strong>Alamat:</strong> Jl. Merdeka No. 1</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Manajemen Gudang</p>
    </footer>
</body>
</html>
