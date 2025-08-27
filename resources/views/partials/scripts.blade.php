<!-- Script Petugas -->
<!-- Tambahkan Tom Select CDN -->
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
    new TomSelect("#petugas", {
        create: true, // bisa ketik nama manual
        sortField: {
            field: "text",
            direction: "asc"
        },
    });
</script>
