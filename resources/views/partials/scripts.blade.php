<!-- Script Petugas -->
<!-- Tambahkan Tom Select CDN -->
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>


    <script>
        // Wizard navigation
        const slides = [
            document.getElementById("slide-1"),
            document.getElementById("slide-2"),
            document.getElementById("slide-3"),
        ];
        let currentSlide = 0;

        function showSlide(idx) {
            slides.forEach((slide, i) => {
                slide.classList.toggle("hidden", i !== idx);
            });
        }

        document.getElementById("next1").onclick = function () {
            showSlide(1);
        };
        document.getElementById("back2").onclick = function () {
            showSlide(0);
        };
        document.getElementById("next2").onclick = function () {
            showSlide(2);
        };
        document.getElementById("back3").onclick = function () {
            showSlide(1);
        };

        // TomSelect
        new TomSelect("#loket_id");
        new TomSelect("#komoditas_id");
        new TomSelect("#jenis_layanan_id");
        new TomSelect("#petugas_id", {
            onChange: function (value) {
                const manualInput = document.getElementById("nama_petugas_manual");
                if (value === "manual") {
                    manualInput.classList.remove("hidden");
                } else {
                    manualInput.classList.add("hidden");
                    manualInput.value = "";
                }
            },
        });

        // Simpan state: field mana yang sudah pernah disentuh
        const touchedFields = new Set();

        function validateSlide1() {
            const slide = document.getElementById("slide-1");
            const requiredInputs = slide.querySelectorAll("input[required], textarea[required]");
            let valid = true;

            requiredInputs.forEach((input) => {
                const errorSpan = input.parentElement.querySelector("span[id^='error-']");
                const isEmpty = !input.value.trim();

                // Cek validasi untuk tombol lanjut
                if (isEmpty) valid = false;

                // Tampilkan error hanya kalau field sudah pernah disentuh
                if (touchedFields.has(input) && errorSpan) {
                    if (isEmpty) {
                        errorSpan.classList.remove("hidden");
                    } else {
                        errorSpan.classList.add("hidden");
                    }
                }
            });

            document.getElementById("next1").disabled = !valid;
        }

        // Pasang event listener ke semua field
        document
            .querySelectorAll("#slide-1 input[required], #slide-1 textarea[required]")
            .forEach((input) => {
                // Saat user mengetik → validasi ulang
                input.addEventListener("input", validateSlide1);

                // Saat keluar dari field → tandai field sudah disentuh
                input.addEventListener("blur", () => {
                    touchedFields.add(input);
                    validateSlide1();
                });
            });

        // Jalankan validasi awal
        validateSlide1();

        // ✅ Cek apakah semua field terisi → kontrol tombol "Lanjut"
        function validateSlide1ForButton() {
            const slide = document.getElementById("slide-1");
            const requiredInputs = slide.querySelectorAll("input[required], textarea[required]");
            let allFilled = true;

            requiredInputs.forEach((input) => {
                if (!input.value.trim()) {
                    allFilled = false;
                }
            });

            document.getElementById("next1").disabled = !allFilled;
        }

        // ✅ Tampilkan error hanya saat tombol "Lanjut" diklik
        function showErrorsSlide1() {
            const slide = document.getElementById("slide-1");
            const requiredInputs = slide.querySelectorAll("input[required], textarea[required]");

            requiredInputs.forEach((input) => {
                const errorSpan = document.getElementById("error-" + input.name);
                if (errorSpan) {
                    if (!input.value.trim()) {
                        errorSpan.classList.remove("hidden"); // munculkan pesan
                    } else {
                        errorSpan.classList.add("hidden"); // sembunyikan kalau sudah isi
                    }
                }
            });
        }

        // 🔹 Event listener untuk tombol
        document.getElementById("next1").addEventListener("click", (e) => {
            showErrorsSlide1();

            // Cek lagi kalau masih ada field kosong → jangan pindah slide
            const slide = document.getElementById("slide-1");
            const requiredInputs = slide.querySelectorAll("input[required], textarea[required]");
            let valid = true;

            requiredInputs.forEach((input) => {
                if (!input.value.trim()) {
                    valid = false;
                }
            });

            if (!valid) {
                e.preventDefault(); // cegah lanjut ke slide berikutnya
            }
        });

        // 🔹 Event listener untuk update tombol saat user ngetik
        document.querySelectorAll("#slide-1 input[required], #slide-1 textarea[required]").forEach((input) => {
            input.addEventListener("input", validateSlide1ForButton);
        });

        // Jalankan validasi awal
        validateSlide1ForButton();




        function validateSlide2() {
            const slide = document.getElementById("slide-2");
            const requiredInputs = slide.querySelectorAll(
                "input[required], select[required], textarea[required]"
            );
            let valid = true;
            requiredInputs.forEach((input) => {
                // Untuk select TomSelect, cek value dari TomSelect
                if (input.tagName === "SELECT") {
                    if (!input.value || input.value === "") valid = false;
                } else {
                    if (!input.value.trim()) valid = false;
                }
            });
            // Jika pilih petugas manual, wajib isi input manual
            const petugasSelect = document.getElementById("petugas_id");
            const manualInput = document.getElementById("nama_petugas_manual");
            if (petugasSelect && petugasSelect.value === "manual") {
                if (!manualInput.value.trim()) valid = false;
            }
            document.getElementById("next2").disabled = !valid;
        }

        // Event listener untuk semua input/select di slide 2
        document
            .querySelectorAll(
                "#slide-2 input[required], #slide-2 select[required], #slide-2 textarea[required]"
            )
            .forEach((input) => {
                input.addEventListener("input", validateSlide2);
                input.addEventListener("change", validateSlide2);
            });
        // Event listener khusus input manual petugas
        document
            .getElementById("nama_petugas_manual")
            .addEventListener("input", validateSlide2);

        // Jalankan validasi awal
        validateSlide2();

        function validateSlide3() {
            const check = document.getElementById("confirmCheck");
            document.getElementById("submit").disabled = !check.checked;
        }
        document
            .getElementById("confirmCheck")
            .addEventListener("change", validateSlide3);
        validateSlide3();

        const submitBtn = document.getElementById("submit");
        const modal = document.getElementById("confirmModal");
        const cancelBtn = document.getElementById("cancelBtn");
        const confirmBtn = document.getElementById("confirmBtn");

        // Sembunyikan modal saat halaman dimuat
        modal.classList.add("hidden");

        // Ketika tombol "Kirim" ditekan
        submitBtn.addEventListener("click", () => {
            // Hanya tampilkan modal jika tombol tidak disabled (checkbox sudah dicentang)
            if (!submitBtn.disabled) {
                modal.classList.remove("hidden");
            }
        });

        // Tombol Batal
        cancelBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
        });

        // Tombol Konfirmasi
        confirmBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
            // Aksi submit form
            document.querySelector("form").submit();
        });

        console.log("confirmCheck =", document.getElementById("confirmCheck"));
        console.log("submit =", document.getElementById("submit"));

    </script>
