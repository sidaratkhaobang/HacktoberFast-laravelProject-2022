
<label class="{{ $label_class }}" for="{{ $id }}">{{ $label }}
@if($required)
<span class="text-danger" >*</span>
@endif</label>
<div class="{{ $input_class }}">
    <div id="{{ $id }}" class="dropzone file-upload" class="custom-file-image">
        <div class="file-select dropzone-area" id="{{ $id }}-area">
            <div class="file-select-button" id="fileName">เลือกไฟล์</div>
            <div id="{{ $id }}-area" class="file-select-name">
                <span>กรุณาเลือกไฟล์</span> 
            </div>
        </div>     
        <div class="{{ $id }}-previews"></div>
    </div>
</div>