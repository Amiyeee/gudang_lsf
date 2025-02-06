
document.addEventListener('DOMContentLoaded', () => {
    console.log('Manajemen Gudang loaded successfully!');
});

document.addEventListener("DOMContentLoaded", function () {
    function handleFormSubmit(formId, tableSelector, storageKey) {
        document.getElementById(formId).addEventListener("submit", function (event) {
            event.preventDefault();
            let table = document.querySelector(tableSelector + " tbody");
            let row = table.insertRow();
            let formData = new FormData(event.target);
            let values = Array.from(formData.values());
            row.innerHTML = `<td>${table.rows.length}</td>` + values.map(val => `<td>${val}</td>`).join('') + `<td>New</td>`;
            
            // Simpan data ke LocalStorage
            let storedData = JSON.parse(localStorage.getItem(storageKey)) || [];
            storedData.push(values);
            localStorage.setItem(storageKey, JSON.stringify(storedData));
            
            event.target.reset();
        });
    }

    function loadTableData(tableSelector, storageKey) {
        let table = document.querySelector(tableSelector + " tbody");
        let storedData = JSON.parse(localStorage.getItem(storageKey)) || [];
        storedData.forEach((values, index) => {
            let row = table.insertRow();
            row.innerHTML = `<td>${index + 1}</td>` + values.map(val => `<td>${val}</td>`).join('') + `<td>Saved</td>`;
        });
    }

    if (document.getElementById("dataStockForm")) {
        handleFormSubmit("dataStockForm", "#dataStockTable", "dataStock");
    }
    if (document.getElementById("goodIssueForm")) {
        handleFormSubmit("goodIssueForm", "#goodIssueTable", "goodIssue");
    }
    if (document.getElementById("lpbForm")) {
        handleFormSubmit("lpbForm", "#lpbTable", "lpbData");
    }
    
    if (document.getElementById("dataStockTable")) {
        loadTableData("#dataStockTable", "dataStock");
    }
    if (document.getElementById("goodIssueTable")) {
        loadTableData("#goodIssueTable", "goodIssue");
    }
    if (document.getElementById("lpbTable")) {
        loadTableData("#lpbTable", "lpbData");
    }
});
