<a href="{{ $route_create }}" class="btn btn-primary" >
    @if (isset($btn_text))
        {{ $btn_text }}
    @else
    <i class="fa fa-plus"></i> {{ __('lang.add_new') }}
    @endif
</a>