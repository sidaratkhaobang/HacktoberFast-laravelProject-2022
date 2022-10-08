@extends('layouts.layout')
@section('page_title', $title)

@section('content')
    <div class="block">
        <div class="block-content">
            <form id="save-form">
                <div class="row push mb-4">
                    <div class="col-sm-6">
                        <label for="name" class="text-start col-form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="col-sm-6">
                        <label for="lastname" class="text-start col-form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="">
                    </div>
                </div>
                <div class="row push mb-4">
                    <div class="col-sm-4">
                        <label for="tel" class="text-start col-form-label">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="tel" name="tel" value="">
                    </div>
                    <div class="col-sm-4">
                        <label for="email" class="text-start col-form-label">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" value="">
                    </div>
                    <div class="col-sm-4">
                        <label class="text-start col-form-label" for="province_id">จังหวัด</label>
                        <select name="province_id" id="province_id" class="form-control js-select2-default"
                            style="width: 100%;">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row push mb-4">
                    <div class="col-sm-12">
                        <label for="address" class="text-start col-form-label">ที่อยู่ติดต่อ</label>
                        <textarea type="text" class="form-control" id="address" name="address">{{ $value }}</textarea>
                    </div>
                </div>
                <div class="row push">
                    <div class="col-sm-12 text-end">
                        <a class="btn btn-secondary" href="{{ route('profiles.index') }}">กลับ</a>
                        <button type="button" class="btn btn-primary btn-save-form">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@include('components.sweetalert')
@include('components.form-save', [
    'store_uri' => route('profiles.store'),
])

@include('components.select2-default')


@push('scripts')
    <script>
        $("#province_id").select2({
            placeholder: "- กรุณาเลือก - ",
            allowClear: true,
            ajax: {
                delay: 250,
                url: function(params) {
                    return "{{ route('select2.provinces') }}";
                },
                type: 'GET',
                data: function(params) {
                    return {
                        s: params.term
                    }
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
            }
        });
    </script>
@endpush
