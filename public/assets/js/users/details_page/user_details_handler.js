import toggleElement from "../../helpers/element_toggler.js";
import updateStatusMsg from "../../helpers/status_info.js";
import updateUserDetails from "./update_info.js";
import updateModel from "../../helpers/update_model.js";
import deleteModel from "../../helpers/delete_model.js";
import routes from "../../routes.js";
import modelDetailsUrl from "../../helpers/url_parser.js";

$(document).on('click', ".management-button", function(e) {
    if (this.id !== 'delete_user') {
        e.preventDefault();
        if (this.id === 'update_user_form') {
            toggleElement($('#update_form'));
        }
        if (this.id === 'update_user') {
            let url = $('#update_form').prop('action');
            let data = $('#update_form').serialize();
            let callbacks = [updateUserDetails, updateStatusMsg, toggleElement($('#update_form'))];
            let method = $('#update_form input[name=_method]').val();
            updateModel({url: url, data: data, callbacks: callbacks, request: method});
        }
        if (this.id === 'activate') {
            let url = $('#activate_user').prop('action');
            let callbacks = [updateUserDetails, updateStatusMsg];

            updateModel({url: url, callbacks: callbacks});
        }
        if (this.id === 'extend') {
            let url = modelDetailsUrl(routes['userExtend'], $('input[name=_id]').val());
            let data = $('#extend_user_form').serialize();
            let callbacks = [updateUserDetails, updateStatusMsg];

            updateModel({url: url, data: data, callbacks: callbacks});
        }

        if (this.id === 'deactivate') {
            let url = $('#deactivate_user').prop('action');
            let callbacks = [updateUserDetails, updateStatusMsg];

            updateModel({url: url, callbacks: callbacks});
        }
    }
});



