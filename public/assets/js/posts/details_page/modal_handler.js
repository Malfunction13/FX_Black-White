import modelDetailsUrl from "../../helpers/url_parser.js";
import routes from "../../routes.js";

$('#global_modal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget); // Button that triggered the modal
    let id = button.data('id'); // Extract info from data-* attributes
    let modal = $(this);
    let title = modal.find('.modal-title');
    let body = modal.find('.modal-body');
    let url = modelDetailsUrl(routes['postDelete'], id);
    let csrf = $('meta[name="csrf-token"]').attr('content');
    if (button.attr('id') === 'delete_modal') {
        title.text('Delete post');
        body.html(`
        <div>Are you sure you want to delete this post?</div>
        <form id="delete_category_form" class="overflow-hidden"
         action=${url} method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="${csrf}">
            <input id="delete_post" type="submit" value="Delete" class="management-button mt-4 float-right">
        </form>`);
    }
});
