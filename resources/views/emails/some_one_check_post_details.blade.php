@component('mail::message')
# Introduction

Some one visited your post details now

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
