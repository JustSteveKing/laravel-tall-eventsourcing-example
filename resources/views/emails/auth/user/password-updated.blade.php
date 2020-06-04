@component('mail::message')
# Hey there!

Just to let you know, the password for your account has just been updated.

If you believe this was in error please get in touch so we can take the necessary steps to undo this action.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
