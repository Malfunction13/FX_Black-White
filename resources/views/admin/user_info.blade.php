<table>
    <tr><th>Username</th><th>Subscribed</th><th>Expiry</th><th>Email</th><th>Role</th><th>Created at</th><th>Updated at</th></tr>
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
        <td id="expiry">
            @if ($user->expiry_date !== null)
                {{ $user->expiry_date }}
            @else
                N/A
            @endif
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
        <td id="created-at">
            {{ $user->created_at }}
        </td>
        <td id="updated-at">
            {{ $user->updated_at }}
        </td>

    </tr>
</table>
