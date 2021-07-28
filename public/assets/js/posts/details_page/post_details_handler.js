import toggleElement from "../../helpers/element_toggler.js";
import updateStatusMsg from "../../helpers/status_info.js";
import updatePost from "./update_post.js";
import updatePostDetails from "./update_info.js";

$(document).ready(function() {
    $(document).on('click', ".management-button", function(e) {
        if (this.id !== 'delete_post') {
            e.preventDefault();
            if (this.id === 'update_form') {
                toggleElement($("#update_post_menu"));
            } else if (this.id === 'update_post') {
                let url = $('#update_post_form').prop('action') + '?_method=PUT'; //php bug, cant handle PUT requests FormData,method field spoofing only via query param
                let data = new FormData($('#update_post_form')[0]);
                let callbacks = [updatePostDetails, updateStatusMsg, toggleElement($("#update_post_menu"))];

                updatePost({url: url, data: data, callbacks: callbacks});
            }
        }
    });
});



