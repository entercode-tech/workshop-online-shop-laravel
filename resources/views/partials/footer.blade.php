<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ URL::asset('/sneat/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ URL::asset('/sneat/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ URL::asset('/sneat/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ URL::asset('/sneat/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ URL::asset('/sneat/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ URL::asset('/sneat/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ URL::asset('/sneat/assets/js/dashboards-analytics.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#myTable');
    })

    function logout(form_id) {
        var conf = confirm('Yakin Ingin Keluar ?')
        if (conf) {
            $(form_id).submit()
        }
    }

    function send_form(form_id) {
        let form = $(form_id)
        let btn = form.find('#submit_btn')
        let icon_btn = btn.find('i')

        let action = form.attr('action')
        let method = form.attr('method')
        let data = new FormData(form[0])

        $.ajax({
            url: action,
            data: data,
            method: method,
            contentType: false,
            processData: false,
            beforeSend: function() {
                icon_btn.replaceWith(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                    );
            },
            success: function(response) {
                console.log(response);
            },
            error: function(response) {

            },
            complete: function() {
                btn.find('span').replaceWith(icon_btn)
            }
        })
    }
</script>
