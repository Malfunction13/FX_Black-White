import updateStatusMsg from "../../helpers/status_info.js";

function updatePost({url: url,data: data = null, callbacks: callbacksArr, request: request='POST'}) {
    $.ajax({
        url: url,
        type: request,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        contentType: false, // if there is image content and processing must be set false
        processData: false,
        cache: false,
        data: data,
        success: callbacksArr,
        error: function(response){
            updateStatusMsg(response.responseJSON);
            },

    });
}

export default updatePost;
