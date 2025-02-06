document.getElementById("dataForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    let dataType = document.getElementById("dataType").value;
    let id = document.getElementById("id").value;
    let name = document.getElementById("name").value;
    let quantity = document.getElementById("quantity").value;
    
    let data = `<tr><td>${id}</td><td>${name}</td><td>${quantity}</td></tr>`;
    
    localStorage.setItem(`table_${dataType}`, localStorage.getItem(`table_${dataType}`) + data);
    
    alert("Data berhasil disimpan! Silakan buka " + dataType + ".html untuk melihat hasilnya.");
    document.getElementById("dataForm").reset();
});

window.addEventListener("load", function() {
    let dataType = document.getElementById("dataType").value;
    let storedData = localStorage.getItem(`table_${dataType}`) || "";
    document.getElementById("dataTable").innerHTML += storedData;
});
