// ESM (tanpa jQuery)
import DataTable from "datatables.net-dt";
import "datatables.net-dt/css/dataTables.dataTables.css";

document.addEventListener("DOMContentLoaded", () => {
    const el = document.querySelector("#table");
    if (!el) return;

    const dt = new DataTable(el, {
        ordering: true,
        order: [],
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100],
        language: {
            search: "Cari:",
            lengthMenu: "_MENU_ per halaman",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan _START_–_END_ dari _TOTAL_ data",
            infoEmpty: "Tidak ada data",
            infoFiltered: "(disaring dari _MAX_ total data)",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "›",
                previous: "‹",
            },
        },
        columnDefs: [
            { targets: -1, orderable: false, searchable: false }, // kolom Action
            { targets: 4, type: "num" }, // kolom Price → sort numerik
        ],
    });
    const wrap = document
        .querySelector("#table")
        ?.closest(".dataTables_wrapper");
    wrap?.querySelector(".dataTables_length select")?.classList.add(
        "form-select"
    );
    wrap?.querySelector(".dataTables_filter input")?.classList.add(
        "form-input"
    );

    // opsional buat debugging di console
    window.__carsDT = dt;
});
