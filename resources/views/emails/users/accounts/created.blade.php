@component('mail::message')

# Hello!

A USAF.Cloud account has been created for you. Please login and set up your account, you will be required to set a
password. This link will expire in 2 days.

@component('mail::button', ['url' => $loginUrl])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
