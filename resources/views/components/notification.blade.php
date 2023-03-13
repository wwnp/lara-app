@php
// class component
$message = session()->get('notification');
$hasMessage = $message !== null;
$messages = $hasMessage ? config('app-notifications') : [];
@endphp
@if($hasMessage)
<div class="custom-toast alert mb-4 alert-{{ $messages[$message]['type'] }} " id="notificationStatus">
    {{ $messages[$message]['text'] }}
</div>
@endif