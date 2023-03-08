@props(["name"])
<div>
    <div class="input-group mt-3">
        <div class="g-recaptcha" data-sitekey="{{ config('recaptcha.sitekey') }}"></div>
    </div>
    @if($errors->has($name))
        <p class="invalid-feedback d-block">{{ $errors->first($name) }}</p>
    @endif
</div>

