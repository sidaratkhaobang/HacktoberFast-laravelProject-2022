@push('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $('.js-select2-default').select2({
        placeholder: "{{ __('lang.select_option') }}",
        allowClear: false,
        tag: true
    });
</script>
@endpush
