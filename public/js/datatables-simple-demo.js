window.addEventListener("DOMContentLoaded", (event) => {
    const datatable = document.querySelectorAll(".display").forEach((table) => {
        new simpleDatatables.DataTable(table);
    });
});
