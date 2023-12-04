<script src="/public/assets/landing_page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/public/assets/landing_page/js/script.js"></script>
<script src="/public/assets/landing_page/vendor/aos/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<script>

    /**
   * Daftar Lomba logic
   */

    window.onload = function () {
        setTimeout(function () {
            document.getElementById('gambarVerified').src = '/public/assets/landing_page/img/verified_loop.gif';
        }, 2000);
    };

    let currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        const tabs = document.getElementsByClassName("tab");
        tabs[n].style.display = "block";

        // Update the progress tracker
        const progress = document.getElementById("progress");
        progress.style.width = (n + 1) * 50 + "%";

        // Show the Previous/Next buttons as appropriate
        if (n === 0) {
            document.querySelector(".prevBtn").style.display = "none";
        } else {
            document.querySelector(".prevBtn").style.display = "inline";
        }
        if (n === tabs.length - 1) {
            document.querySelector(".nextBtn").innerHTML = "Submit";
        } else {
            document.querySelector(".nextBtn").innerHTML = "Next";
        }
    }

    function validateForm() {
        const currentTabInputs = document
            .getElementsByClassName("tab")
        [currentTab].getElementsByTagName("input");

        for (let i = 0; i < currentTabInputs.length; i++) {
            const input = currentTabInputs[i];

            // Validasi apakah input kosong
            if (input.value === "") {
                alert("Please fill in all fields");
                return false;
            }

            // Validasi tipe data input email
            if (input.type === "email") {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(input.value)) {
                    alert("Please enter a valid email address");
                    return false;
                }
            }

            // Validasi tipe data input number
            if (input.type === "number") {
                if (isNaN(input.value)) {
                    alert("Please enter a valid number");
                    return false;
                }
            }
            // Tambahkan validasi lainnya sesuai kebutuhan (seperti validasi untuk tipe data lainnya)
        }
        return true;
    }

    function nextPrev(n) {
        const tabs = document.getElementsByClassName("tab");
        if (n === 1 && !validateForm()) return false;
        tabs[currentTab].style.display = "none";
        currentTab = currentTab + n;
        if (currentTab >= tabs.length) {
            document.getElementById("regForm").submit();
            return false;
        }
        showTab(currentTab);
    }


</script>
</body>

</html>