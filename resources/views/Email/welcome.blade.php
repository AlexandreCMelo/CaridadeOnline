@component('mail::message')

    {{  __(\Charis\Mail\MailSettings::USER_VIEW_WELCOME_BODY,
            [
            'name' => $user->{\Charis\Models\User::NAME}
            ]
    )}}

    Thanks,
    {{ config('app.name') }}
@endcomponent
