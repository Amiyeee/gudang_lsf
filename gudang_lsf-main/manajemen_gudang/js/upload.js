const fileInput = document.getElementById("fileInput");
const dropArea = document.getElementById("drop-area");
const loading = document.getElementById("loading");
const statusText = document.getElementById("status");
const successBox = document.getElementById("successBox");
const uploadAgainBtn = document.getElementById("uploadAgain");
const actions = document.getElementById("actions");
const submitBtn = document.getElementById("submitBtn");
const cancelBtn = document.getElementById("cancelBtn");

let selectedFile = null;

// Menangani pemilihan file
function handleFileSelection(file) {
    selectedFile = file;

    // Tampilkan tombol dan status
    actions.classList.remove("hidden");
    statusText.innerHTML = "📂 File siap diunggah: " + file.name;
}

// Event saat file dipilih melalui input
fileInput.addEventListener("change", function () {
    const file = fileInput.files[0];
    if (file) {
        const allowedExtensions = [
            "application/pdf",
            "application/vnd.ms-excel",
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        ];

        // Validasi jenis file
        if (!allowedExtensions.includes(file.type)) {
            alert("Hanya file PDF dan Excel yang diperbolehkan!");
            fileInput.value = ""; // Reset input file
            return;
        }

        handleFileSelection(file); // Tampilkan status dan tombol
    }
});

// Event drag dan drop file
dropArea.addEventListener("dragover", function (event) {
    event.preventDefault();
    dropArea.classList.add("dragover");
});

dropArea.addEventListener("dragleave", function () {
    dropArea.classList.remove("dragover");
});

dropArea.addEventListener("drop", function (event) {
    event.preventDefault();
    dropArea.classList.remove("dragover");

    const file = event.dataTransfer.files[0];
    const allowedExtensions = [
        "application/pdf",
        "application/vnd.ms-excel",
        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    ];

    // Validasi jenis file
    if (!allowedExtensions.includes(file.type)) {
        alert("Hanya file PDF dan Excel yang diperbolehkan!");
        return;
    }

    fileInput.files = event.dataTransfer.files; // Set file ke input
    handleFileSelection(file); // Tampilkan status dan tombol
});

// Event tombol Kirim
submitBtn.addEventListener("click", function () {
    if (!selectedFile) {
        alert("Pilih file terlebih dahulu!");
        return;
    }

    // Tampilkan loading
    loading.style.display = "block";
    statusText.innerHTML = "";

    const reader = new FileReader();
    reader.readAsDataURL(selectedFile);
    reader.onload = function () {
        const base64String = reader.result.split(",")[1];
        const formData = new URLSearchParams();
        formData.append("fileData", base64String);
        formData.append("fileName", selectedFile.name);
        formData.append("mimeType", selectedFile.type);

        // Kirim data ke server
        fetch(
            "https://script.google.com/macros/s/AKfycbwp1fHI1TFRLcQ0M5yGSS0iStoPtsvQlQDXwtg6KgUO2lFFlncI7nr9gnrdb4J2IDmz/exec",
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: formData,
            }
        )
            .then((response) => response.json())
            .then((data) => {
                loading.style.display = "none";
                if (data.success) {
                    successBox.style.display = "block";
                    actions.classList.add("hidden"); // Sembunyikan tombol setelah sukses
                } else {
                    statusText.innerHTML = `❌ Gagal: ${data.message}`;
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                statusText.innerHTML = "❌ Terjadi kesalahan saat mengunggah.";
                loading.style.display = "none";
            });
    };
});

// Event tombol Cancel
cancelBtn.addEventListener("click", function () {
    selectedFile = null;
    fileInput.value = ""; // Reset input file
    actions.classList.add("hidden"); // Sembunyikan tombol
    statusText.innerHTML = ""; // Hapus status
});

// Event tombol Upload Ulang
uploadAgainBtn.addEventListener("click", function () {
    successBox.style.display = "none";
});
