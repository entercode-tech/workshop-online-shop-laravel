<!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ URL::asset("/sneat/assets/vendor/libs/jquery/jquery.js") }}"></script>
    <script src="{{ URL::asset("/sneat/assets/vendor/libs/popper/popper.js") }}"></script>
    <script src="{{ URL::asset("/sneat/assets/vendor/js/bootstrap.js") }}"></script>
    <script src="{{ URL::asset("/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js") }}"></script>

    <script src="{{ URL::asset("/sneat/assets/vendor/js/menu.js") }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ URL::asset("/sneat/assets/vendor/libs/apex-charts/apexcharts.js") }}"></script>

    <!-- Main JS -->
    <script src="{{ URL::asset("/sneat/assets/js/main.js") }}"></script>

    <!-- Page JS -->
    <script src="{{ URL::asset("/sneat/assets/js/dashboards-analytics.js") }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        function logout(form_id){
            var conf = confirm('Yakin Ingin Keluar ?')
            if(conf){
                $(form_id).submit()
            }
        }
    </script>