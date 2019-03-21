@component('mail::message')

# Hello! Good news, a new GSuite account has been provisioned for you.

With your new GSuite account you will have access to all of the great services Google offers. For example, email
via G-Mail, file storage via Google Drive, and so much more! You are free to use this account for personal and
professional use, but keep it professional as all activity is stil subject to monitoring. Your new account
details are below, you will be required to set a new password the first time you log in.

## Email Address: {{ $email_handle }}
## Temporary Password: {{ $password }}

@component('mail::button', ['url' => 'https://accounts.google.com'])
Login to your GSuite Account
@endcomponent

Thanks,
<br> {{ config('app.name') }}
@endcomponent
