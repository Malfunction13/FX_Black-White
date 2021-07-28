$('#global_modal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget) // Button that triggered the modal
    let id = button.data('id') // Extract info from data-* attributes
    let modal = $(this)
    let title = modal.find('.modal-title')
    let body = modal.find('.modal-body')

    if (button.attr('id') === 'create_category') {
        title.text('Create new category')
        body.html(`
            <div>Please insert category name below.</div>
            <form id="create_category_form" class="overflow-hidden" action="" method="POST">
            <label for="name">Category name:</label>
            <input type="text" name="name" class="form-control">
            <input id="create_category" type="submit" value="Create" class="management-button mt-4 float-right" data-dismiss="modal">
            </form>
        `)
    } else if (button.attr('id').includes('update_category')) {
        title.text('Update category')
        body.html(`
        <div>Please insert a new name for your category.</div>
        <form id="update_category_form" class="overflow-hidden mt-3" action="" method="POST">
            <label for="new_name">New name:</label>
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_id" value=${id}>
            <input type="text" name="new_name" class="form-control">
            <input id="update_category" type="submit" value="Update" class="management-button mt-4 float-right" data-dismiss="modal">
        </form>`)
    } else {
        title.text('Delete category')
        body.html(`
        <div>Are you sure you want to delete this category?</div>
        <form id="update_category_form" class="overflow-hidden" action="" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_id" value=${id}>
            <input id="delete_category" type="submit" value="Delete" class="management-button mt-4 float-right" data-dismiss="modal">
        </form>`)
    }
});
