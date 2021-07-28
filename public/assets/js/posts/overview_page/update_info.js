function updateInfo(response) {
    $("#search_results").empty();
    for(let i = 0; i < response.data.data.length; i++) { //paginator gives object with .data and the response we send has data
        let post = response.data.data[i];
        $("#search_results").append(
            ` <tr>
            <td>
                ${post.title}
            </td>
            <td>
                ${post.category.name}
            </td>
            <td>
                ${post.created_at}
            </td>
            <td class="white-button py-1">
                <a href="/admin/posts/${post.id}">Details</a>
            </td>
            </tr>`
        );
    }
}

export default updateInfo;
