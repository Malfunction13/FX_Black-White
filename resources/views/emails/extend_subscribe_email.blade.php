@component('mail::message')
# Subscription Extension request from: {{ $user->username }}

@component('mail::table')
| Email                                               | Subscribed                                | Expiry date                                          | Timestamp                |
| --------------------------------------------------- |------------------------------------------ | ---------------------------------------------------- | ------------------------ |
| {{ $user->email  }} | {{$user->subscribed ? 'True' : 'False' }} | {{$user->expiry_date ? $user->expiry_date : 'N/A' }} | {{ $data['timestamp'] }} |
@endcomponent

## Subscription Extension request for: {{ $data['months']}}

@component('mail::button', ['url' => route('userDetails', [$user])])
Go to user profile
@endcomponent



Thanks,<br>
FX Black & White
@endcomponent
