@push('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    const mySwal = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    function warningAlert(text){
        return mySwal.fire({
            title: "เกิดข้อผิดพลาด",
            text: text ,
            icon: 'warning',
            confirmButtonText: "ตกลง"
        });
    }

    function errorAlert(text){
        return mySwal.fire({
            title: "เกิดข้อผิดพลาด",
            text: text ,
            icon: 'error',
            confirmButtonText: "ตกลง"
        });
    }

    function copyAlert(text){
        return mySwal.fire({
            title: text,
            // text: text ,
            icon: 'success',
            showConfirmButton: false,
            timer: 1000
        });
    }

</script>
@endpush
