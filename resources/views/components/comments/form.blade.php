@props(['for', 'id'])

@error('comments_limit')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<x-form method="post" action="{{ route('comments.store') }}" id="recaptcha-form">
    <x-form-input type="text" name="for" value="{{ $for }}" hidden ></x-form-input>
    <x-form-input type="text" name="id" value="{{ $id }}" hidden ></x-form-input>

    <x-form-input 
        name="nickname" 
        label="Nickname"
        :disabled="Auth::check()"
        :value="Auth::user() ? Auth::user()->name : '' "
    ></x-form-input>

    <x-form-textarea name="body" label="Body"></x-form-textarea>

    <x-recaptcha 
        name="g-recaptcha-response"
    >
    </x-recaptcha>

    {{-- <div class="input-group mt-3">
        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
    </div>
    @error('g-recaptcha-response') <div class="invalid-feedback">{{ $message }}</div> @enderror --}}
    <div class="text-center">
        <button class="btn btn-lg btn-primary mt-1" id="submit-btn">Send</button>
    </div>
</x-form>

