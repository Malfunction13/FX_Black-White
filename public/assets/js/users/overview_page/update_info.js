function updateInfo(response) {
    $("#search_results").empty();
    for(let i = 0; i < response.data.data.length; i++) {
        let user = response.data.data[i];
        $("#search_results").append(`
            <tr>
                <td id="username">
                    ${user.username}
                </td>
                <td id="email">
                    ${user.email}
                </td>
                <td id="subscribed" class="${user.subscribed ? 'text-success' : 'text-danger'} font-weight-bold">
                    ${user.subscribed ? 'True' : 'False'}
                </td>
                <td id="subscription_count">
                    ${user.subscription_count}
                </td>
                <td id="joined_date">
                    ${user.created_at}
                </td>
                <td class="white-button py-1">
                    <a href="/admin/users/${user.id}">Details</a>
                </td>
            </tr>`);
    }
}

export default updateInfo;
