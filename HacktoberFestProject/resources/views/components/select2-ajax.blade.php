@push('scripts')
<script>
    $("#{{ $id }}").select2({
        placeholder: "{{ __('lang.select_option') }}",
        allowClear: true,
        dropdownParent: $("{{ (isset($modal) ? $modal : 'body') }}"),
        ajax: {
            delay: 250,
            url: function (params) {
                // console.log("params", params, params.term);
                return "{{ $url }}";
            },
            type: 'GET',
            data: function (params) {
                let parent_field = "{{ (isset($parent_id) ? $parent_id : '') }}";
                let parent_id = null;
                if (parent_field !== "") {
                    parent_id = $("#" + parent_field).val();
                }
                return {
                    parent_id: parent_id,
                    s: params.term
                }
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
        }
    });

    if ("{{ (isset($parent_id) ? $parent_id : '') }}" !== "") {
        $("#" + "{{ (isset($parent_id) ? $parent_id : '') }}").on("change.select2", function (e) {
            // console.log("change.select2", e);
            $('#{{ $id }}').val(null).trigger('change');
        });
    }
</script>
@endpush
