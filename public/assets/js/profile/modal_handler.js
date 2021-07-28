import modelDetailsUrl from "../helpers/url_parser.js";
import routes from "../routes.js";

$('#global_modal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget); // Button that triggered the modal
    let modal = $(this);
    let title = modal.find('.modal-title');
    let body = modal.find('.modal-body');
    let csrf = $('meta[name="csrf-token"]').attr('content');

    if (button.attr('id') === 'change_pwd_modal') {
        let url = routes['forgotPassword'];
        title.text('Change account password')
        body.html(`
        <div>If you click on the button below, we will send an email to your inbox with a unique password reset link.</div>
        <form id="change_pwd_form" class="overflow-hidden" action=${url} method="POST">
            <input type="hidden" name="_token" value="${csrf}">
            <input id="change_pwd" type="submit" value="Submit" class="management-button mt-4 float-right" data-dismiss="modal">
        </form>`);
    }
    if (button.attr('id') === 'change_email_modal') {
        let id = button.data('id');
        let url = modelDetailsUrl(routes['profileResetEmail'], id);
        title.text('Change account email');
        body.html(`
        <div>Please insert below your new email address.</div>
        <form id="change_email_form" class="overflow-hidden" action=${url} method="POST">
            <input type="hidden" name="_token" value="${csrf}">
            <input type="email" name="email" class="form-control" id="email">
            <input id="change_email" type="submit" value="Submit" class="management-button mt-4 float-right" data-dismiss="modal">
        </form>`);
    }
    if (button.attr('id') === 'subscribe_modal') {
        let url = routes['subscribe'];
        title.text('Subscribe for access to exclusive trading insight');
        body.html(`
        <div>Please share below your preferred payment method and feel free to ask us anything or refer to our detailed FAQ!</div>
        <form id="subscribe_form" class="overflow-hidden" action=${url} method="POST">
            <input type="hidden" name="_token" value="${csrf}">
                <div class="my-3">
                <textarea class="form-control" maxlength="400" rows="3" cols="15" name="message"></textarea>
                </div>
            <input id="subscribe" type="submit" value="Submit" class="management-button mt-4 float-right" data-dismiss="modal">
        </form>`);
    }
    if (button.attr('id') === 'extend_modal') {
        let id = button.data('id');
        let url = modelDetailsUrl(routes['profileExtendSubscription'], id);
        title.text('Extend your subscription before it expires')
        body.html(`
        <div>Insert below the number of months you would like to extend your subscription</div>
        <form id="extend_form" class="overflow-hidden" action=${url} method="POST">
            <input type="hidden" name="_token" value="${csrf}">
            <input type="number" class="form-control" name="months" min="1">
            <input id="extend" type="submit" value="Submit" class="management-button mt-4 float-right" data-dismiss="modal">
        </form>`);
    }

});
