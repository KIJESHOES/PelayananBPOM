<script>
    document.addEventListener("DOMContentLoaded", function () {
        // ====== Wizard slides ======
        const slides = [
            document.getElementById("slide-1"),
            document.getElementById("slide-2"),
            document.getElementById("slide-3")
        ];
        let currentSlide = 0;

        function showSlide(idx) {
            slides.forEach((slide, i) => {
                slide.classList.toggle("hidden", i !== idx);
            });
        }

        // ====== Toggle input manual petugas ======
        const selectPetugas = document.getElementById("petugas_id");
        const inputManual = document.getElementById("nama_petugas_manual");

        function toggleManual() {
            if (selectPetugas.value === "manual") {
                inputManual.classList.remove("hidden");
                inputManual.required = true;
            } else {
                inputManual.classList.add("hidden");
                inputManual.required = false;
                inputManual.value = "";
            }
        }
        selectPetugas.addEventListener("change", () => {
            toggleManual();
            validateSlide2();
        });
        toggleManual();

        // ====== Navigation buttons ======
        document.getElementById("next1").addEventListener("click", function () {
            if (validateSlide1()) {
                currentSlide = 1;
                showSlide(currentSlide);
            }
        });
        document.getElementById("back2").addEventListener("click", function () {
            currentSlide = 0;
            showSlide(currentSlide);
        });
        document.getElementById("next2").addEventListener("click", function () {
            if (validateSlide2()) {
                currentSlide = 2;
                showSlide(currentSlide);
            }
        });
        document.getElementById("back3").addEventListener("click", function () {
            currentSlide = 1;
            showSlide(currentSlide);
        });

        // ====== VALIDASI SLIDE 1 ======
        function validateSlide1() {
            const slide = slides[0];
            let valid = true;
            slide.querySelectorAll("input[required], textarea[required]").forEach(input => {
                if (!input.value.trim()) valid = false;
            });
            document.getElementById("next1").disabled = !valid;
            return valid;
        }
        slides[0].querySelectorAll("input[required], textarea[required]").forEach(input => {
            input.addEventListener("input", validateSlide1);
        });
        validateSlide1();

        // ====== VALIDASI SLIDE 2 ======
        function validateSlide2() {
            const slide = slides[1];
            let valid = true;
            slide.querySelectorAll("input[required], select[required], textarea[required]").forEach(input => {
                if (input.tagName === "SELECT") {
                    if (!input.value || input.value === "") valid = false;
                } else {
                    if (!input.value.trim()) valid = false;
                }
            });
            if (selectPetugas.value === "manual" && !inputManual.value.trim()) valid = false;
            document.getElementById("next2").disabled = !valid;
            return valid;
        }
        slides[1].querySelectorAll("input[required], select[required], textarea[required]").forEach(input => {
            input.addEventListener("input", validateSlide2);
            input.addEventListener("change", validateSlide2);
        });
        inputManual.addEventListener("input", validateSlide2);
        validateSlide2();

        // ====== VALIDASI SLIDE 3 ======
        const confirmCheck = document.getElementById("confirmCheck");
        const submitBtn = document.getElementById("submitBtn");
        function validateSlide3() {
            submitBtn.disabled = !confirmCheck.checked;
        }
        confirmCheck.addEventListener("change", validateSlide3);
        validateSlide3();

        // ====== Modal Konfirmasi ======
        const form = document.getElementById('wizardForm');
        const modal = document.getElementById('confirmModal');
        const confirmBox = document.getElementById('confirmBox');
        const cancelBtn = document.getElementById('cancelBtn');
        const confirmBtn = document.getElementById('confirmBtn');

        function openModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');

            setTimeout(() => {
                confirmBox.classList.remove('scale-95', 'opacity-0');
                confirmBox.classList.add('scale-100', 'opacity-100');
            }, 10);

            document.body.classList.add('overflow-hidden');
        }

        function closeModal() {
            confirmBox.classList.add('scale-95', 'opacity-0');
            confirmBox.classList.remove('scale-100', 'opacity-100');

            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }, 200);
        }

        // intercept submit
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            openModal();
        });

        cancelBtn.addEventListener('click', closeModal);

        modal.addEventListener('click', function (e) {
            if (e.target === modal) closeModal();
        });

        confirmBtn.addEventListener('click', () => {
            closeModal();
            form.submit(); // ini akan submit ke POST /konsultasi dengan CSRF
        });


        // tampilkan slide pertama
        showSlide(currentSlide);

        function showSlide(idx) {
            slides.forEach((slide, i) => {
                slide.classList.toggle("hidden", i !== idx);

                // Stepper circle
                const stepCircle = document.getElementById(`step-${i + 1}`);
                const stepLabel = document.getElementById(`label-${i + 1}`);

                if (i < idx) {
                    // Step sudah selesai
                    stepCircle.classList.remove("border-gray-300", "text-gray-400");
                    stepCircle.classList.add("border-emerald-500", "bg-emerald-500", "text-white");
                    stepLabel.classList.add("text-emerald-600", "font-semibold");
                } else if (i === idx) {
                    // Step aktif
                    stepCircle.classList.remove("border-gray-300", "text-gray-400", "bg-emerald-500", "text-white");
                    stepCircle.classList.add("border-emerald-500", "text-emerald-600");
                    stepLabel.classList.add("text-emerald-600", "font-semibold");
                } else {
                    // Step belum aktif
                    stepCircle.classList.remove("border-emerald-500", "bg-emerald-500", "text-white", "text-emerald-600");
                    stepCircle.classList.add("border-gray-300", "text-gray-400");
                    stepLabel.classList.remove("text-emerald-600", "font-semibold");
                    stepLabel.classList.add("text-gray-500");
                }
            });
        }

    });
</script>
