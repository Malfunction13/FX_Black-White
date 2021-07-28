import updateStatusMsg from "../helpers/status_info.js";
import updateModel from "../helpers/update_model.js";
import updateProfileDetails from "./update_info.js";

$(document).ready(function() {
    $(document).on('click', ".search-button, .management-button", function(e) {
        e.preventDefault();

        if (this.id === 'change_pwd') {
            let url = $('#change_pwd_form').prop('action');
            let callbacks = [updateStatusMsg];

            updateModel({url: url, callbacks: callbacks});
        }
        if (this.id === 'change_email') {
            let form = $('#change_email_form');
            let url = form.prop('action');
            let data = form.serialize();
            let callbacks = [updateProfileDetails, updateStatusMsg];

            updateModel({url: url, data: data, callbacks: callbacks});
        }
        if (this.id === 'subscribe') {
            let form = $('#subscribe_form');
            let url = form.prop('action');
            let data = form.serialize();
            let callbacks = [updateStatusMsg];

            updateModel({url: url, data: data, callbacks: callbacks});
        }
        if (this.id === 'extend') {
            let form = $('#extend_form');
            let url = form.prop('action');
            let data = form.serialize();
            let callbacks = [updateStatusMsg];

            updateModel({url: url, data: data, callbacks: callbacks});
        }

    });
});



