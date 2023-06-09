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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ URL::asset('js/currency.js') }}"></script>
@stack('js')
<script>
    $(document).ready(function() {
        var sx = false;
        if(screen.width < 992){
            sx = true
        }
        new DataTable('#myTable',{
            scrollX:sx
        })
    })

    function logout(form_id) {
        Swal.fire({
            title: 'Yakin Ingin Keluar ?',
            text: "Anda Akan Keluar Dari Aplikasi !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $(form_id).submit()
            }
        })
    }

    function hapus_data(form_id) {
        Swal.fire({
            title: 'Hapus Data Ini ?',
            text: "Data Akan Dihapus Permanen !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $(form_id).submit()
            }
        })
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
                form.find('input, select, textarea').removeClass('is-invalid')
                form.find('.error_alert').text('')
            },
            success: function(response) {
                window.location.href = response.data
            },
            error: function(response) {
                let res = response.responseJSON
                $.each(res.data, function(index, value) {
                    value = value[0]
                    form.find('[name="' + index + '"]').addClass('is-invalid')
                    form.find('#' + index + '_error_alert').text(value)
                });
            },
            complete: function() {
                btn.find('span').replaceWith(icon_btn)
            }
        })
    }
</script>
