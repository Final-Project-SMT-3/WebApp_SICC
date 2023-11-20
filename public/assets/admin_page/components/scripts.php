<script src="<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp_SICC/public/assets/admin_page/assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp_SICC/public/assets/admin_page/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp_SICC/public/assets/admin_page/assets/js/sidebarmenu.js'); ?>"></script>
<script src="<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp_SICC/public/assets/admin_page/assets/js/app.min.js'); ?>"></script>
<script src="<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp_SICC/public/assets/admin_page/assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script>
<script src="<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp_SICC/public/assets/admin_page/assets/libs/simplebar/dist/simplebar.js'); ?>"></script>
<script src="<?php include($_SERVER['DOCUMENT_ROOT'] . '/WebApp_SICC/public/assets/admin_page/assets/js/dashboard.js'); ?>"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    new DataTable('#dataTables', {
        "columnDefs": [
            { "orderable": false, "targets": 1 },
            { "orderable": false, "targets": 2 },
            { "orderable": false, "targets": 3 },
            { "orderable": false, "targets": 4 }
        ],
        info: false
    });
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
</body>

</html>