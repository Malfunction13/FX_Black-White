<table>
    <thead>
        <tr><th>Username</th><th>Subscribed</th><th>Expiry</th><th>Subscription count</th><th>Email</th><th>Role</th><th>Created at</th><th>Updated at</th></tr>
    </thead>
    <tbody>
        <tr>
            <td id="username">
                {{ $user->username }}
            </td>
            @if ($user->subscribed)
                <td id="subscribed" class="text-success font-weight-bold">
                    True
                </td>
            @else
                <td id="subscribed" class="text-danger font-weight-bold">
                    False
                </td>
            @endif
            <td id="expiry_date">
                @if ($user->expiry_date !== null)
                    {{ $user->expiry_date }}
                @else
                    N/A
                @endif
            </td>
            <td id="subscription_count">
                {{ $user->subscription_count }}
            </td>
            <td id="email">
                {{ $user->email }}
            </td>
            <td id="role">
                @if ($user->role === 0)
                    User
                @elseif($user->role === 1)
                    Moderator
                @else
                    Administrator
                @endif
            </td>
            <td id="created_at">
                {{ $user->created_at }}
            </td>
            <td id="updated_at">
                {{ $user->updated_at }}
            </td>
        </tr>
    </tbody>
</table>
