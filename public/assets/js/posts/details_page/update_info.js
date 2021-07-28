function updatePostDetails(response) {
    if (response.data) {
        $("#post_info").empty();
        let post = response.data;
        $("#post_info").html(
            ` <tr>
            <td>
                ${post.user.username}
            </td>
            <td>
                ${post.category.name}
            </td>
            <td>
                ${post.created_at}
            </td>
            <td>
                ${post.updated_at}
            </td>
            </tr>`
        );
        $("#post_title").html(`${post.title}`);
        $("#post_text").html(`${post.text}`);


        let src = $("#img").attr('src').split('/');
        let filename = src[src.length-1]
        if (filename !== post.img_name){
            src.pop();
            src.push(post.img_name);
            $("#img").attr('src', src.join('/'));
        }
    }
}

export default updatePostDetails;
