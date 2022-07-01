@component('mail::message')
# Introduction

Thanks for writing us, we will get back asap

Name: {{$message->full_name}}
Email: {{$message->email}}

Il tuo messaggio: <br>
{{$message->message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
