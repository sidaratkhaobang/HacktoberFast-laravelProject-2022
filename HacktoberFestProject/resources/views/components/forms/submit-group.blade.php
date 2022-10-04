<div class="row push">
    {{-- <div class="col-sm-2"></div> --}}
    <div class="{{ $input_class }}">
        
        @if(!isset($status))
        <button type="button" class="btn btn-primary btn-save-form" >{{ __('lang.save') }}</button>    
        @endif
        @if (isset($url))

            <a class="btn btn-secondary" href="{{ route($url) }}" >{{ __('lang.back') }}</a>         
        @else
            <button type="button" class="btn btn-secondary" onclick="window.history.back();" >{{ __('lang.back') }}</button>
        @endif
    </div>
</div>
