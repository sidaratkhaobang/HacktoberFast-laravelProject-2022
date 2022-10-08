@push('scripts')
<script>
    $(".btn-delete-row").on("click", function () {
        var route_delete = $(this).attr('data-route-delete');
        mySwal.fire({
            title: "ยืนยันลบข้อมูล",
            text: "ต้องการลบข้อมูลใช่หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            customClass: {
                confirmButton: 'btn btn-danger m-1',
                cancelButton: 'btn btn-secondary m-1'
            },
            confirmButtonText: "ตกลง",
            cancelButtonText: "ยกเลิก",
            html: false,
            preConfirm: e => {
                return new Promise(resolve => {
                    setTimeout(() => {
                        resolve();
                    }, 50);
                });
            }
        }).then(result => {
            if (result.value) {
                axios.delete(route_delete).then(response => {
                    if (response.data.success) {
                        mySwal.fire({
                            title: "เรียบร้อย",
                            text: "ลบข้อมูลเรียบร้อย",
                            icon: 'success',
                            confirmButtonText: "ตกลง"
                        }).then(value => {
                            if (response.data.redirect) {
                                window.location.href = response.data.redirect;
                            } else {
                                window.location.reload();
                            }
                        });
                    } else {
                        mySwal.fire({
                            title: "ไม่สามารถลบข้อมูลได้",
                            text: response.data.message,
                            icon: 'error',
                            confirmButtonText: "ตกลง",
                        }).then(value => {
                            if (value) {
                                //
                            }
                        });
                    }
                });
            }
        }).catch(error => {
            mySwal.fire({
                title: "{{ __('lang.delete_fail') }}",
                text: error.response.data.message,
                icon: 'error',
                confirmButtonText: "ตกลง",
            }).then(value => {
                if (value) {
                    //
                }
            });
        });
    });
</script>
@endpush
