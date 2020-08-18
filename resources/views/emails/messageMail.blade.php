@component('mail::message')


One message send from {{ $message['email'] }} . Please check yout inbox.

Thanks,<br>
{{ config('app.name') }}
@endcomponent