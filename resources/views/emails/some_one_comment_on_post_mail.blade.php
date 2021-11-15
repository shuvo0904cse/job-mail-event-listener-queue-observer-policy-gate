@component('mail::message')
# Introduction

some one comment on this post -- {{ $post->name }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
