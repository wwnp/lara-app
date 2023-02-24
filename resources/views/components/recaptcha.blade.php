@props(["name"])
<div>
    <div class="input-group mt-3">
        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
    </div>
    @if($errors->has($name))
        <p class="invalid-feedback d-block">{{ $errors->first($name) }}</p>
    @endif
</div>

