<div id="profile_info" class="d-flex flex-column">
    <table>
        <thead>
        <tr><th>Username</th><th>Email</th><th>Subscription</th><th>Subscription expiry</th></tr>
        </thead>
        <tbody id="profile_details">
        <tr>
            <td id="username">
                {{ $user->username }}
            </td>
            <td id="email">
                {{ $user->email }}
            </td>
            @if($user->subscribed)
                <td id="subscribed" class="text-success font-weight-bold">Active</td>
            @else
                <td id="subscribed" class="text-danger font-weight-bold">Inactive</td>
            @endif
            <td id="expiry_date">
                @if($user->expiry_date)
                    {{ $user->expiry_date }}
                @else
                    <div id="subscribe_modal" class="sm-management-button" data-toggle="modal" data-target="#global_modal"
                    >Subscribe</div>
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</div>
