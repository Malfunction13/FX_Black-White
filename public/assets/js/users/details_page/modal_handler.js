import modelDetailsUrl from "../../helpers/url_parser.js";
import routes from "../../routes.js";

$('#global_modal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget); // Button that triggered the modal
    let id = button.data('id'); // Extract info from data-* attributes
    let modal = $(this);
    let title = modal.find('.modal-title');
    let body = modal.find('.modal-body');
    let url = modelDetailsUrl(routes['userDelete'], id);
    let csrf = $('meta[name="csrf-token"]').attr('content');
    if (button.attr('id') === 'delete_modal') {
        title.text('Delete user');
        body.html(`
        <div>Are you sure you want to delete this user?</div>
        <form id="delete_user_form" class="overflow-hidden"
         action=${url} method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="${csrf}">
            <input id="delete_user" type="submit" value="Delete" class="management-button mt-4 float-right" data-dismiss="modal">
        </form>`);
    } else if (button.attr('id') === 'extend_modal') {
        title.text('Extend user');
        body.html(`
        <div>Please insert the number of months to extend.</div>
        <form id="extend_user_form" class="overflow-hidden"
         action=${url} method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="${csrf}">
            <input type="hidden" name="_id" value="${id}">
            <label for="months">Add months:</label>
            <input type="text" name="months" class="form-control">
            <input id="extend" type="submit" value="Extend" class="management-button mt-4 float-right" data-dismiss="modal">
        </form>`);
    }
});
