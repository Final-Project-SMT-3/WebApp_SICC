<script src="/public/assets/admin_page/libs/jquery/dist/jquery.min.js"></script>
<script src="/public/assets/admin_page/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/public/assets/admin_page/js/sidebarmenu.js"></script>
<script src="/public/assets/admin_page/js/app.min.js"></script>
<script src="/public/assets/admin_page/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="/public/assets/admin_page/libs/simplebar/dist/simplebar.js"></script>
<script src="/public/assets/admin_page/js/dashboard.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    $("#dataTables").DataTable()
    // new DataTable('#dataTables', {
    //     "columnDefs": [
    //         { "orderable": false, "targets": 1 },
    //         { "orderable": false, "targets": 2 },
    //         { "orderable": false, "targets": 3 },
    //         { "orderable": false, "targets": 4 }
    //     ],
    //     info: false
    // });
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