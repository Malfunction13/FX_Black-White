@component('mail::message')
# Subscription request from: {{ $user->username ?  $user->username : 'Unregistered User' }}

@component('mail::table')
| Email                                               | Subscribed                                | Expiry date                                          | Timestamp                |
| --------------------------------------------------- |------------------------------------------ | ---------------------------------------------------- | ------------------------ |
| {{ $user->email ?  $user->email : $data['email'] }} | {{$user->subscribed ? 'True' : 'False' }} | {{$user->expiry_date ? $user->expiry_date : 'N/A' }} | {{ $data['timestamp'] }} |
@endcomponent

## Message from user:

{{ $data['message'] ? $data['message'] : 'THE_MESSAGE_BODY_IS_EMPTY' }}
@if ($user)
@component('mail::button', ['url' => route('userDetails', [$user])])
Go to user profile
@endcomponent
@endif


Thanks,<br>
FX Black & White
@endcomponent
