import updateInfo from "./update_info.js";
import updateStatusMsg from "../helpers/status_info.js";
import updateModel from "../helpers/update_model.js";
import modelDetailsUrl from "../helpers/url_parser.js";
import routes from "../routes.js";

$(document).ready(function() {
    $(document).on('click','.management-button', function(e) {
        e.preventDefault();

        if (this.id === 'create_category') {
            let url = routes['categoryCreate'];
            let data = $('#create_category_form').serialize();
            let callbacks = [updateInfo, updateStatusMsg];

            updateModel({url: url, data: data, callbacks: callbacks});

        } else if (this.id.includes('update_category')) {
            let url = modelDetailsUrl(routes['categoryUpdate'], $('input[name=_id]').val())
            let data = $('#update_category_form').serialize();
            let callbacks = [updateInfo, updateStatusMsg];
            let request = $('input[name = _method]').val();

            updateModel({url: url, data: data, callbacks: callbacks, request: request});

        } else if (this.id === 'delete_category') {
            let url = modelDetailsUrl(routes['categoryDelete'], $('input[name=_id]').val())
            let callbacks = [updateInfo, updateStatusMsg];

            updateModel({url: url, callbacks: callbacks, request: $('input[name=_method]').val()});

        }
    });
});



