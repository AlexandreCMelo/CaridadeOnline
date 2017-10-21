@component('mail::message')

    {{ Lang::get('user_welcome_message', ['name' => $username]) }}

    @component('mail::button', ['url' => ''])
        {{ __('user_activate_button') }}
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent