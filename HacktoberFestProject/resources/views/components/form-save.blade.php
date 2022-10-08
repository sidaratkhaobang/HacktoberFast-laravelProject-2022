@push('scripts')
    <script>
        function saveForm(storeUri, formData, modalCallback) {
            axios.post(storeUri, formData).then(response => {
                if (response.data.success) {
                    @if (isset($save_callback))
                        if (typeof(modalCallback) == "function") {
                        modalCallback(response.data);
                        } else {
                        saveCallback(response.data);
                        }
                    @else
                        mySwal.fire({
                        title: "{{ __('lang.store_success_title') }}",
                        text: "{{ __('lang.store_success_message') }}",
                        icon: 'success',
                        confirmButtonText: "{{ __('lang.ok') }}"
                        }).then(value => {
                        if (response.data.redirect) {
                        if (response.data.redirect === 'false'){
                        if (typeof(modalCallback) == "function") {
                        modalCallback(response.data);
                        }
                        } else {
                        window.location.href = response.data.redirect;
                        }
                        } else {
                        window.location.reload();
                        }
                        });
                    @endif
                } else {
                    mySwal.fire({
                        title: "{{ __('lang.store_error_title') }}",
                        text: response.data.message,
                        icon: 'error',
                        confirmButtonText: "{{ __('lang.ok') }}",
                    }).then(value => {
                        if (value) {
                            //
                        }
                    });
                }
            }).catch(error => {
                mySwal.fire({
                    title: "{{ __('lang.store_error_title') }}",
                    text: error.response.data.message,
                    icon: 'error',
                    confirmButtonText: "{{ __('lang.ok') }}",
                }).then(value => {
                    if (value) {
                        //
                    }
                });
            });
        }

        $(".btn-save-form").on("click", function() {
            let storeUri = "{{ $store_uri }}";
            var formData = new FormData(document.querySelector('#save-form'));
            saveForm(storeUri, formData);
        });
    </script>
@endpush
