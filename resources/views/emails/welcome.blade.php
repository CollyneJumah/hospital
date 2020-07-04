@component('mail::message')
# Welcome to Hospital Management {{ $user->name}} thank you for signing up

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
