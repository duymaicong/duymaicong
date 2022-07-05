@component('mail::message')
# Introduction

Send email.

@component('mail::button', ['url' => '{{$url}}'])
click to dowload report excel
@endcomponent



Thanks,<br>
{{ config('app.name') }}



@endcomponent
