@props(['for', 'id'])

@error('comments_limit')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<x-form method="post" action="{{ route('comments.store') }}" id="recaptcha-form">
    <x-form-input type="text" name="for" value="{{ $for }}" hidden />
    <x-form-input type="text" name="id" value="{{ $id }}" hidden />
    <x-form-input name="nickname" label="Nickname" />
    <x-form-textarea name="body" label="Body" />

    <div class="input-group mt-3">
        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
        @error('g-recaptcha-response')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="text-center">
        <button class="btn btn-lg btn-primary mt-1" id="submit-btn">Send</button>
    </div>
</x-form>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>