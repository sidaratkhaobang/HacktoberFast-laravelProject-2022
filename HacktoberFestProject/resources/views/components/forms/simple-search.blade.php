<form action="" method="GET" id="form-search">
    <div class="form-group row mb-4">
        <label for="s" class="col-sm-1 text-start col-form-label">{{ __('lang.search_label') }}</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="s" name="s"
                placeholder="{{ __('lang.search_placeholder') }}" value="{{ $s }}">
        </div>
        <div class="col-sm-4">
            <button type="submit" class="btn btn-primary">{{ __('lang.search') }}</button>
            <a href="{{ URL::current() }}"
                class="btn btn-secondary btn-clear-search">{{ __('lang.clear_search') }}</a>
        </div>
    </div>
</form>
