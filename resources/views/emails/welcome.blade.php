@component('mail::message')
# Welcome to Hospital Management {{ $user->name}} thank you for signing up

The body of your message.

@component('mail::button', ['url' => '', 'color' => 'success'])
Button Text
@endcomponent

@component('mail::panel')
    Hello, This is a welcome message to you. Feel
    free to check ou what we sell.
@endcomponent
@component('mail::table')
    
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
