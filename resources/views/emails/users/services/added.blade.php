@component('mail::message')

# Hello!

Heads up, you just authorized a new service (service name) to access your
account. If this is not news to you, disregard this email. Otherwise, please log in
and look for any strange activity.

@component('mail::button', ['url' => 'http://usaf.cloud/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
