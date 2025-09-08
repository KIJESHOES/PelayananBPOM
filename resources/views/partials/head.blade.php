<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <title>@yield('title', 'Formulir Permohonan Konsultasi - BPOM Bogor')</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon" />

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        body {
            font-family: "Inter", sans-serif;
        }

         .ts-control,
        .ts-control .item,
        .ts-dropdown .option,
        .tom-select,
        .ts-control input,
        select,
        select option {
            text-align: left !important;
            justify-content: flex-start !important;
        }

        .ts-control {
            display: flex !important;
            justify-content: flex-start !important;
            align-items: center !important;
        }

        .ts-control .item {
            display: flex !important;
            justify-content: flex-start !important;
            align-items: center !important;
            text-align: left !important;
            width: 100% !important;
            padding-left: 0 !important;
        }

        /* Tambahan agar placeholder TomSelect tidak center */
        .ts-control .item[data-value=""] {
            color: #9ca3af !important;
            font-style: italic;
            text-align: left !important;
            justify-content: flex-start !important;
            align-items: flex-start !important;
            padding-left: 0 !important;
        }

        /* Paksa input TomSelect agar tidak center */
        .ts-control input {
            text-align: left !important;
            padding-left: 0 !important;
        }

        /* Jika masih center, tambahkan ini */
        .ts-control .items {
            justify-content: flex-start !important;
            text-align: left !important;
        }
    </style>
</head>
