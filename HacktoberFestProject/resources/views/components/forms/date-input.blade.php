<label class="{{ $label_class }}" for="{{ $id }}" class="{{ $label_class }}">{{ $label }}
    @if ($required)
        <span class="text-danger">*</span>
    @endif
</label>
<div class="input-group">
    <input type="{{ $type }}" class="form-control {{ $input_class }}" id="{{ $id }}"
        name="{{ $id }}" placeholder="{{ $placeholder }}" readonly="readonly" 
        @if ($date_enable_time)
            data-enable-time="true" data-time_24hr="true"
        @else
            data-date-format="Y-m-d"
        @endif
        {{ $required ? 'required' : '' }} value="{{ $value }}">
    <span class="input-group-text">
        <i class="far fa-calendar-check"></i>
    </span>
</div>
