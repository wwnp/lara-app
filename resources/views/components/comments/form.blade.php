@props(['for', 'id'])
<x-form method="post" action="{{ route('comments.store') }}">
    <x-form-input type="text" name="for" value="{{ $for }}" hidden />
    <x-form-input type="text" name="id" value="{{ $id }}" hidden />
    <x-form-input name="nickname" label="Nickname" />
    <x-form-textarea name="body" label="Body" />
    <div class="text-end">
        <button class="btn btn-success mt-3">Send</button>
    </div>
 </x-form>