function updateUserDetails(response) {
    if (response.data) {
        for (let key in response.data) {
            if (!(['id', 'password', 'email_verified_at', 'deleted_at'].includes(key))) {
                if (key === 'subscribed') {
                    if (response.data[key] === 1) {
                        $('#subscribed').addClass('text-success').removeClass('text-danger').html('True');
                    } else {
                        $('#subscribed').removeClass('text-success').addClass('text-danger').html('False');
                    }
                } else if (key === 'role') {
                    if (response.data[key] === 0) {
                        $(`#${key}`).html('User')
                    } else if (response.data[key] === 1) {
                        $(`#${key}`).html('Moderator')
                    } else if (response.data[key] === 2) {
                        $(`#${key}`).html('Administrator')
                    }
                } else if (key === 'expiry_date') {
                    if (response.data[key] === null) {
                        $(`#${key}`).html('N/A')
                    } else {
                        $(`#${key}`).html(response.data[key])
                    }
                } else {
                    $(`#${key}`).html(response.data[key])
                }
            }
        }
    }
}

export default updateUserDetails;
