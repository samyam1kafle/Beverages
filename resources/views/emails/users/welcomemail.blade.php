@component('mail::message')
## Welcome to Nepal All Beverage family.

**Welcome** to our services . Since you are new to our site please feel free to ask us about any inquiries regarding our site.
You will get notified when there is any new products in our site .
Hope you enjoy our services ._Happy Shopping !_

@component('mail::button', ['url' => route('home-index')])
Go to Home
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
