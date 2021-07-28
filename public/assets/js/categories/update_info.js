function updateInfo(response) {
    $('#category_list').empty();
    for(let i = 0; i < response.data.length; i++) {
        let category = response.data[i];
        $("#category_list").append(
            ` <tr>
                <td>
                    ${category.id}
                </td>
                <td>
                    ${category.name}
                </td>
                <td>
                    ${category.created_at}
                </td>
                <td>
                    ${category.created_at === category.updated_at ? 'Same' : category.updated_at}
                </td>
                <td>
                    <button id="update_category_${category.id}" class="modal-button my-1" data-toggle="modal" data-id="${category.id}" data-target="#global_modal">Update</button>
                </td>
                <td>
                    <button id="delete_category_${category.id}" class="modal-button my-1" data-toggle="modal" data-id="${category.id}" data-target="#global_modal">Delete</button>
                </td>
            </tr>`
        );
    }
}

export default updateInfo;
