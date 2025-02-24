<?php
require_once 'db_connect.php';
$conn = Database::connect();

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID tidak ditemukan.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'] ?? '';
    $remark = $_POST['remark'] ?? '';
    $status = $_POST['status'] ?? '';
    $qty_issued = $_POST['qty_issued'] ?? '';
    $balance = $_POST['balance'] ?? '';
    $pic = $_POST['pic'] ?? '';
    $whs = $_POST['whs'] ?? '';
    $ket = $_POST['ket'] ?? '';

    $query = "UPDATE data_stock SET location=?, remark=?, status=?, qty_issued=?, balance=?, pic=?, whs=?, ket=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$location, $remark, $status, $qty_issued, $balance, $pic, $whs, $ket, $id]);

    header("Location: data_stock.php");
    exit;
}

$query = "SELECT location, remark, status, qty_issued, balance, pic, whs, ket FROM data_stock WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC) ?? [];

Database::disconnect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Stock</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(-10px);
            animation: fadeIn 0.5s forwards ease-out;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-400 to-indigo-600 flex justify-center items-center min-h-screen p-6">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg fade-in transform transition duration-500 hover:scale-105">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Edit Data Stock</h1>
        <form action="" method="POST" class="space-y-5">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold">Location</label>
                    <input type="text" name="location" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold">Remark</label>
                    <input type="text" name="remark" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold">Status</label>
                    <input type="text" name="status" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold">Qty Issued</label>
                    <input type="number" name="qty_issued" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold">Balance</label>
                    <input type="number" name="balance" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold">PIC</label>
                    <input type="text" name="pic" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold">WHS</label>
                    <input type="text" name="whs" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold">KET</label>
                    <input type="text" name="ket" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-green-400 to-teal-500 text-white py-3 rounded-lg font-semibold hover:shadow-lg transition duration-300">Update</button>
        </form>
        <div class="text-center mt-5">
            <a href="data_stock.php" class="text-blue-600 font-semibold hover:underline">Kembali</a>
        </div>
    </div>
</body>
</html>