function updateProfileDetails(response) {
    if (response.data) {
        let user = response.data;
        for (let field in user) {
            if ((['username', 'email', 'subscribed', 'expiry_date'].includes(field))) {
                if (field === 'subscribed') {
                    if (user[field] === 1) {
                        $('#subscribed').addClass('text-success').removeClass('text-danger').html('Active');
                    } else {
                        $('#subscribed').removeClass('text-success').addClass('text-danger').html('Inactive');
                    }
                } else if (field === 'expiry_date') {
                    if (user[field] === null) {
                        $('#user[field]').html(`
                        <div id="subscribe_modal" class="sm-management-button"
                        data-toggle="modal" data-target="#global_modal">Subscribe</div>`);
                    }
                } else {
                    $(`#${field}`).html(user[field])
                }
            }
        }
    }
}

export default updateProfileDetails;
