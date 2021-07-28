import updateModel from "../helpers/update_model.js";
import updateStatusMsg from "../helpers/status_info.js";
$(document).on('click', '#forgot_password', function(e) {
    let form = $('#reset_password');
    updateModel({
        url: form.prop('action'),
        data: form.serialize(),
        callbacks: [updateStatusMsg],
    });
})
