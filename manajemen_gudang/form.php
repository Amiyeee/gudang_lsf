<?php
require_once 'UIDContainer.php'; 
require_once 'db_connect.php'; 

$pdo = Database::connect(); // Gunakan koneksi PDO dari class Database

$UIDresult = $_POST['UID'] ?? $UIDresult ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
    <link rel="stylesheet" href="css/form.css">
    <script src="script.js" defer></script>
</head>
<script>
    function updateRFIDDetails() {
        fetch('rfid_details.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('rfid-table').innerHTML = data;
            });
    }
    setInterval(updateRFIDDetails, 2000); // Update every 2 seconds
</script>

<body>
    <header>
        <h1>Form Input</h1>
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

    <div id="forms-container">
        <div class="dropdown-container">
            <label for="formSelector" class="form-label">Pilih Form Input</label>
            <select id="formSelector" class="form-control" onchange="showForm(this.value)">
            <option value="">-- Pilih Form --</option>
                <option value="dataToolsForm">Data Tools</option>
                <option value="goodIssueForm">Good Issue</option>
                <option value="biodataForm">Biodata</option>
            </select>
        </div>
        <div class="button-container">
            <a href="#" class="button" id="showDetailsButton">Lihat Pemilik RFID</a>
        </div>

        <section id="rfid-details">
            <table id="rfid-table" width="652" border="0" align="center" cellpadding="5" cellspacing="0">
                <?php include 'rfid_details.php'; ?>
            </table>
        </section>

            <!--Form Data Tools-->
            <form action="process.php" method="post" id="dataToolsForm" class="hidden">
                <input type="hidden" name="category" value="data_tools">
                <h2>Data Tools</h2>

                <div class="mb-3">
                    <label for="no" class="form-label">No</label>
                    <input type="text" name="no" class="form-control" placeholder="No" required>
                </div>

                <div class="mb-3">
                    <label for="tgl_masuk_lsf" class="form-label">TGL MASUK LSF</label>
                    <input type="date" name="tgl_masuk_lsf" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="durasi_di_lsf" class="form-label">Durasi di LSF</label>
                    <input type="text" name="durasi_di_lsf" class="form-control" placeholder="Durasi di LSF" required>
                </div>

                <div class="mb-3">
                    <label for="nama_alat" class="form-label">NAMA ALAT</label>
                    <input type="text" name="nama_alat" class="form-control" placeholder="Nama Alat" required>
                </div>

                <div class="mb-3">
                    <label for="merk_type_size" class="form-label">MERK / TYPE / SIZE</label>
                    <input type="text" name="merk_type_size" class="form-control" placeholder="Merk / Type / Size" required>
                </div>

                <div class="mb-3">
                    <label for="kapasitas" class="form-label">CAPASITAS</label>
                    <input type="text" name="kapasitas" class="form-control" placeholder="Kapasitas" required>
                </div>

                <div class="mb-3">
                    <label for="code_id" class="form-label">CODE (ID NUMBER)</label>
                    <input type="text" name="code_id" class="form-control" placeholder="Code (ID Number)" required>
                </div>

                <div class="mb-3">
                    <label for="serial_no" class="form-label">SERIAL NO.</label>
                    <input type="text" name="serial_no" class="form-control" placeholder="Serial No." required>
                </div>

                <div class="mb-3">
                    <label for="po_no" class="form-label">PO.NO</label>
                    <input type="text" name="po_no" class="form-control" placeholder="PO.No" required>
                </div>

                <div class="mb-3">
                    <label for="penerima" class="form-label">PENERIMA</label>
                    <input type="text" name="penerima" class="form-control" placeholder="Penerima" required>
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">JABATAN</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required>
                </div>

                <div class="mb-3">
                    <label for="lokasi_group" class="form-label">LOKASI/GROUP</label>
                    <input type="text" name="lokasi_group" class="form-control" placeholder="Lokasi/Group" required>
                </div>

                <div class="mb-3">
                    <label for="tgl_pinjam" class="form-label">TGL PINJAM</label>
                    <input type="date" name="tgl_pinjam" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tgl_service" class="form-label">TGL SERVICE</label>
                    <input type="date" name="tgl_service" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="kondisi" class="form-label">KONDISI</label>
                    <input type="text" name="kondisi" class="form-control" placeholder="Kondisi" required>
                </div>

                <div class="mb-3">
                    <label for="qty" class="form-label">QTY</label>
                    <input type="number" name="qty" class="form-control" placeholder="Qty" required>
                </div>

                <div class="mb-3">
                    <label for="satuan" class="form-label">SATUAN</label>
                    <input type="text" name="satuan" class="form-control" placeholder="Satuan" required>
                </div>

                <div class="mb-3">
                    <label for="kebutuhan_sparepart" class="form-label">KEBUTUHAN SPREPART</label>
                    <input type="text" name="kebutuhan_sparepart" class="form-control" placeholder="Kebutuhan Sparepart" required>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">KETERANGAN</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                </div>

                <div class="mb-3">
                    <label for="categories" class="form-label">CATEGORIES</label>
                    <input type="text" name="categories" class="form-control" placeholder="Categories" required>
                </div>

                <div class="mb-3">
                    <label for="kelengkapan" class="form-label">KELENGKAPAN</label>
                    <input type="text" name="kelengkapan" class="form-control" placeholder="Kelengkapan" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">STATUS</label>
                    <input type="text" name="status" class="form-control" placeholder="Status" required>
                </div>

                <button onclick="addData()" class="btn btn-primary">Submit</button>
            </form>

            <!--Form GOOD ISSUE-->
            <form action="process.php" method="post" id="goodIssueForm" class="hidden">
                <input type="hidden" name="category" value="good_issue">
                <h2>Good Issue</h2>

                <div class="mb-3">
                    <label for="card_uid" class="form-label">RFID Card</label>
                    <input type="text" name="card_uid" class="form-control" placeholder="Scan your card here..." autofocus required>
                </div>

                <div class="mb-3">
                    <label for="item_code" class="form-label">Item Code</label>
                    <input type="text" name="item_code" placeholder="Item Code" required>
                </div>

                <div class="mb-3">
                    <label for="item_name" class="form-label">Item Name</label>
                    <input type="text" name="item_name" placeholder="Item Name" required>
                </div>

                <div class="mb-3">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="number" name="qty" placeholder="Qty" required>
                </div>

                <div class="mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" name="unit" placeholder="Unit" required>
                </div>

                <div class="mb-3">
                    <label for="pc_no" class="form-label">PC No</label>
                    <input type="text" name="pc_no" placeholder="PC No" required>
                </div>

                <div class="mb-3">
                    <label for="bpm" class="form-label">BPM</label>
                    <input type="text" name="bpm" placeholder="BPM" required>
                </div>

                <div class="mb-3">
                    <label for="rcvd_by" class="form-label">Received By</label>
                    <input type="text" name="rcvd_by" placeholder="Received By" required>
                </div>

                <div class="mb-3">
                    <label for="foreman_group" class="form-label">Foreman / Group</label>
                    <input type="text" name="foreman_group" placeholder="Foreman / Group" required>
                </div>

                <div class="mb-3">
                    <label for="freetext" class="form-label">Free Text</label>
                    <input type="text" name="freetext" placeholder="Free Text">
                </div>

                <div class="mb-3">
                    <label for="remarks" class="form-label">Remarks</label>
                    <input type="text" name="remarks" placeholder="Remarks" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" name="status" placeholder="Status" required>
                </div>

                <div class="mb-3">
                    <label for="wbs_code" class="form-label">WBS Code</label>
                    <input type="text" name="wbs_code" placeholder="WBS Code" required>
                </div>

                <div class="mb-3">
                    <label for="no_gi_itr" class="form-label">No.GI / ITR</label>
                    <input type="text" name="no_gi_itr" placeholder="No.GI / ITR" required>
                </div>

                <div class="mb-3">
                    <label for="posting_date" class="form-label">Posting Date</label>
                    <input type="date" name="posting_date" placeholder="Posting Date" required>
                </div>

                <div class="mb-3">
                    <label for="whse" class="form-label">Whse</label>
                    <input type="text" name="whse" placeholder="Whse" required>
                </div>

                <div class="mb-3">
                    <label for="account_code" class="form-label">Account Code</label>
                    <input type="text" name="account_code" placeholder="Account Code" required>
                </div>

                <div class="mb-3">
                    <label for="project" class="form-label">Project</label>
                    <input type="text" name="project" placeholder="Project" required>
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Lokasi" required>
                </div>

                <div class="mb-3">
                    <label for="dep" class="form-label">Dep</label>
                    <input type="text" name="dep" placeholder="Dep" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_pengerjaan" class="form-label">Jenis Pengerjaan</label>
                    <input type="text" name="jenis_pengerjaan" placeholder="Jenis Pengerjaan" required>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" placeholder="Keterangan" required>
                </div>

                <button onclick="addData()" class="btn btn-primary">Submit</button>
            </form>

            <!-- Form Biodata -->
            <form action="process.php" method="post" id="biodataForm" class="hidden">
                <input type="hidden" name="category" value="biodata">
                <h2>Biodata</h2>

                <div class="mb-3">
                    <label for="rfid_tag" class="form-label">RFID</label>
                    <input type="text" name="rfid_tag" placeholder="....." required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama Anda" required>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" placeholder="Masukkan Jabatan Anda" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" placeholder="Masukkan Alamat Anda" required></input>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No. Telepon</label>
                    <input type="number" name="no_hp" placeholder="Masukkan No. Telepon Anda" required>
                </div>
                <button onclick="addData()" class="btn btn-primary">Submit</button>
            </form>
        </div>


        <script>
            function showForm(formId) {
                document.querySelectorAll("form").forEach(form => form.classList.add("hidden"));
                if (formId) {
                    document.getElementById(formId).classList.remove("hidden");
                }
            }
            //fungsi yang harus ditambahkan
            document.getElementById("showDetailsButton").addEventListener("click", function(event) {
                event.preventDefault(); // Mencegah tombol membuka URL
                const detailsSection = document.getElementById("rfid-details");

                // Toggle class 'hidden' untuk menampilkan atau menyembunyikan data
                if (detailsSection.classList.contains("hidden")) {
                    detailsSection.classList.remove("hidden");
                } else {
                    detailsSection.classList.add("hidden");
                }
            });
        </script>
<!-- Tempat notifikasi -->
<div id="notification" class=".notification"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function showNotification(message, color) {
        console.log("showNotification() dipanggil dengan pesan:", message);

        let notification = document.getElementById('notification');
        notification.textContent = message;
        notification.style.backgroundColor = color;
        notification.style.display = "block";

        setTimeout(() => {
            notification.style.display = "none";
            // Redirect setelah notifikasi menghilang
            window.location.href = "form.php.php";
        }, 3000);
    }

    // Mengecek apakah ada notifikasi di URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('message')) {
        let message = urlParams.get('message');
        let color = urlParams.get('color') || 'green';
        showNotification(message, color);
    }
});
</script>

</body>

</html>