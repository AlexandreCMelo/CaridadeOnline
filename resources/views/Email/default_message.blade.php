@component('mail::message')

    {{ $messageContent }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
