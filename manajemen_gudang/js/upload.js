document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("fileInput");
    const dragFileInput = document.getElementById("dragFileInput");
    const dropArea = document.getElementById("drop-area");
    const uploadForm = document.getElementById("uploadForm");
    const submitBtn = document.getElementById("submitBtn");
    const statusText = document.getElementById("status");
    const loading = document.getElementById("loading");
    const successBox = document.getElementById("successBox");
    const uploadAgain = document.getElementById("uploadAgain");

    let selectedFile = null;

    // Event listener untuk form upload
    uploadForm.addEventListener("submit", function (e) {
        e.preventDefault();
        uploadFile(fileInput.files[0]);
    });

    // Event listener untuk drag-and-drop
    dropArea.addEventListener("dragover", function (e) {
        e.preventDefault();
        dropArea.classList.add("highlight");
    });

    dropArea.addEventListener("dragleave", function () {
        dropArea.classList.remove("highlight");
    });

    dropArea.addEventListener("drop", function (e) {
        e.preventDefault();
        dropArea.classList.remove("highlight");
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            selectedFile = files[0];
            uploadFile(selectedFile);
        }
    });

    function uploadFile(file) {
        if (!file) {
            alert("Pilih file terlebih dahulu!");
            return;
        }

        loading.style.display = "block";
        statusText.innerHTML = "";

        const formData = new FormData();
        formData.append("file", file);

        fetch("upload.php", {
            method: "POST",
            body: formData,
        })
        .then((response) => response.json())
        .then((data) => {
            loading.style.display = "none";
            if (data.success) {
                alert("✅ " + data.message);
                successBox.style.display = "block";
            } else {
                alert("❌ Gagal: " + data.message);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("❌ Terjadi kesalahan saat mengunggah.");
            loading.style.display = "none";
        });
    }

    uploadAgain.addEventListener("click", function () {
        successBox.style.display = "none";
        fileInput.value = "";
    });
});
