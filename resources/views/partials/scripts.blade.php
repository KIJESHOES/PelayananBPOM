<!-- Script Petugas -->
<!-- Tambahkan Tom Select CDN -->
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tabler/icons@1.74.0/icons-react/dist/index.umd.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let currentStep = 1;
        const step1 = document.getElementById("step1");
        const step2 = document.getElementById("step2");
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");
        const submitBtn = document.getElementById("submitBtn");
        const step1Indicator = document.getElementById("step1Indicator");
        const step2Indicator = document.getElementById("step2Indicator");

        function showStep(step) {
            if (step === 1) {
                step1.classList.remove("hidden");
                step2.classList.add("hidden");
                prevBtn.classList.add("hidden");
                nextBtn.classList.remove("hidden");
                submitBtn.classList.add("hidden");
                step1Indicator.classList.add("text-indigo-600");
                step2Indicator.classList.remove("text-indigo-600");
                step2Indicator.classList.add("text-gray-400");
            } else {
                step1.classList.add("hidden");
                step2.classList.remove("hidden");
                prevBtn.classList.remove("hidden");
                nextBtn.classList.add("hidden");
                submitBtn.classList.remove("hidden");
                step1Indicator.classList.remove("text-indigo-600");
                step2Indicator.classList.remove("text-gray-400");
                step2Indicator.classList.add("text-indigo-600");
            }
        }

        nextBtn.addEventListener("click", function() {
            currentStep = 2;
            showStep(currentStep);
        });

        prevBtn.addEventListener("click", function() {
            currentStep = 1;
            showStep(currentStep);
        });

        // Toggle petugas manual
        const selectPetugas = document.getElementById("petugas_id");
        const inputManual = document.getElementById("nama_petugas_manual");
        selectPetugas.addEventListener("change", function() {
            if (selectPetugas.value === "manual") {
                inputManual.classList.remove("hidden");
                inputManual.required = true;
            } else {
                inputManual.classList.add("hidden");
                inputManual.required = false;
                inputManual.value = "";
            }
        });

        showStep(currentStep);
    });

    document.addEventListener("DOMContentLoaded", function() {
        const selectPetugas = document.getElementById("petugas_id");
        const inputManual = document.getElementById("nama_petugas_manual");

        function toggleManual() {
            if (selectPetugas.value === "manual") {
                inputManual.classList.remove("hidden");
                inputManual.required = true;
            } else {
                inputManual.classList.add("hidden");
                inputManual.required = false;
                inputManual.value = ""; // reset kalau pindah pilihan
            }
        }

        selectPetugas.addEventListener("change", toggleManual);
        toggleManual();
    });
</script>
