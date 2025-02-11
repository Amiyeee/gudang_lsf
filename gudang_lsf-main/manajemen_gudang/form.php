<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
    <link rel="stylesheet" href="css/form.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Form Input</h1>
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
    
    <div id="forms-container">
        <div class="dropdown-container">
            <label for="formSelector" class="form-label">Pilih Form Input</label>
            <select id="formSelector" class="form-control" onchange="showForm(this.value)">
                <option value="">-- Pilih Form --</option>
                <option value="dataStockForm">Data Stock</option>
                <option value="goodIssueForm">Good Issue</option>
                <option value="lpbForm">LPB</option>
                <option value="biodataForm">Biodata</option>
            </select>
        </div>

        <!--Form DATA STOCK-->
        <div id="forms-container">
        <form action="process.php" method="post" id="dataStockForm" class="hidden">
            <input type="hidden" name="category" value="data_stock">
            <h2>Data Stock</h2>
            <div class="mb-3">
                <label for="rcvd_date" class="form-label">RCVD Date</label>
                <input type="date" name="rcvd_date" required>
            </div>
        
            <div class="mb-3">
                <label for="item_code" class="form-label">Item Code</label>
                <input type="text" name="item_code" placeholder="item_code" required>
            </div>
        
            <div class="mb-3">
                <label for="item_name" class="form-label">Item Name</label>
                <input type="text" name="item_name" placeholder="item_name" required>
            </div>
        
            <div class="mb-3">
                <label for="free_text" class="form-label">Free Text</label>
                <input type="text" name="free_text" placeholder="free_text">
            </div>
        
            <div class="mb-3">
                <label for="qty_rcvd" class="form-label">Qty Received</label>
                <input type="number" name="qty_rcvd" placeholder="qty_rcvd" required>
            </div>
        
            <div class="mb-3">
                <label for="unit" class="form-label">Unit</label>
                <input type="text" name="unit" placeholder="Unit" required>
            </div>
        
            <div class="mb-3">
                <label for="po_no" class="form-label">PO No</label>
                <input type="text" name="po_no" placeholder="po_no" required>
            </div>
        
            <div class="mb-3">
                <label for="apply_to" class="form-label">Apply To</label>
                <input type="text" name="apply_to" placeholder="apply_to" required>
            </div>

            <div class="mb-3">
                <label for="pc_number" class="form-label">Pc Number</label>
                <input type="text" name="pc_number" placeholder="pc_number" required>
            </div>
            
            <div class="mb-3">
                <label for="project_name" class="form-label">Project Name</label>
                <input type="text" name="project_name" placeholder="project_name" required>
            </div>
            
            <div class="mb-3">
                <label for="doc_no" class="form-label">Doc. No</label>
                <input type="text" name="doc_no" placeholder="doc_no" required>
            </div>
        
            <div class="mb-3">
                <label for="source" class="form-label">Source</label>
                <input type="text" name="source" placeholder="source" required>
            </div>
        
            <div class="mb-3">
                <label for="wbs_code" class="form-label">WBS Code</label>
                <input type="text" name="wbs_code" placeholder="wbs_code" required>
            </div>
        
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" placeholder="location" required>
            </div>
        
            <div class="mb-3">
                <label for="remark" class="form-label">Remark</label>
                <input type="text" name="remark" placeholder="remark" required>
            </div>
        
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" placeholder="Status" required>
            </div>
        
            <div class="mb-3">
                <label for="qty_issued" class="form-label">Qty Issued</label>
                <input type="number" name="qty_issued" placeholder="qty_issued" required>
            </div>
        
            <div class="mb-3">
                <label for="balance" class="form-label">Balance</label>
                <input type="number" name="balance" placeholder="balance" required>
            </div>
        
            <div class="mb-3">
                <label for="pic" class="form-label">PIC</label>
                <input type="text" name="pic" placeholder="pic" required>
            </div>
        
            <div class="mb-3">
                <label for="whs" class="form-label">WHS</label>
                <input type="text" name="whs" placeholder="whs" required>
            </div>
        
            <div class="mb-3">
                <label for="ket" class="form-label">Keterangan</label>
                <input type="text" name="ket" placeholder="Ket" required>
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
        

        <!--Form LPB-->
        <form action="process.php" method="post" id="lpbForm" class="hidden">
            <input type="hidden" name="category" value="lpb">
            <h2>LPB</h2>
            
            <div class="mb-3">
                <label for="no_pengiriman" class="form-label">No Pengiriman</label>
                <input type="text" id="no_pengiriman" name="no_pengiriman" class="form-control">
            </div>
            <div class="mb-3">
                <label for="item_code" class="form-label">Item Code</label>
                <input type="text" id="item_code" name="item_code" class="form-control">
            </div>
            <div class="mb-3">
                <label for="item_name" class="form-label">Item Name</label>
                <input type="text" id="item_name" name="item_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="ket" class="form-label">Ket</label>
                <input type="text" id="ket" name="ket" class="form-control">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" id="quantity" name="quantity" class="form-control">
            </div>
            <div class="mb-3">
                <label for="unit" class="form-label">Unit</label>
                <input type="text" id="unit" name="unit" class="form-control">
            </div>
            <div class="mb-3">
                <label for="po_number" class="form-label">PO Number</label>
                <input type="text" id="po_number" name="po_number" class="form-control">
            </div>
            <div class="mb-3">
                <label for="project_code" class="form-label">Project Code</label>
                <input type="text" id="project_code" name="project_code" class="form-control">
            </div>
            <div class="mb-3">
                <label for="project_name" class="form-label">Project Name</label>
                <input type="text" id="project_name" name="project_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="do_no" class="form-label">DO No</label>
                <input type="text" id="do_no" name="do_no" class="form-control">
            </div>
            <div class="mb-3">
                <label for="shipment_no" class="form-label">Shipment No</label>
                <input type="text" id="shipment_no" name="shipment_no" class="form-control">
            </div>
            <div class="mb-3">
                <label for="wbs_code" class="form-label">WBS Code</label>
                <input type="text" id="wbs_code" name="wbs_code" class="form-control">
            </div>
            <div class="mb-3">
                <label for="prpo_it" class="form-label">PRPO IT</label>
                <input type="text" id="prpo_it" name="prpo_it" class="form-control">
            </div>
            <div class="mb-3">
                <label for="it" class="form-label">IT</label>
                <input type="text" id="it" name="it" class="form-control">
            </div>
            <div class="mb-3">
                <label for="whs" class="form-label">WHS</label>
                <input type="text" id="whs" name="whs" class="form-control">
            </div>
            <div class="mb-3">
                <label for="remarks" class="form-label">Remarks</label>
                <input type="text" id="remarks" name="remarks" class="form-control">
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
    </script>

    <style>
        .hidden { display: none; }
        .dropdown-container {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</body>
</html>
