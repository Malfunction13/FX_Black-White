import routes from "../routes.js";

$('#global_modal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget) // Button that triggered the modal
    let modal = $(this)
    let title = modal.find('.modal-title')
    let body = modal.find('.modal-body')
    let csrf = $('meta[name="csrf-token"]').attr('content')

    if (button.attr('id') === 'forgot_password_modal') {
        let url = routes['forgotPassword'];
        title.text('Reset forgotten password')
        body.html(`
        <div>Please insert the email address you registered with.</div>
        <form id="reset_password" class="overflow-hidden" action=${url} method="POST">
            <input type="hidden" name="_token" value="${csrf}">
                <div class="my-3">
                    <input type="email" name="email" class="form-control" id="email"">
                </div>
            <input id="forgot_password" type="submit" value="Submit" class="management-button mt-4 float-right" data-dismiss="modal">
        </form>`)
    }


});
