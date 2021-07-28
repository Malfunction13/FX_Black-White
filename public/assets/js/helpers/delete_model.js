import updateStatusMsg from "./status_info.js";

function deleteModel({url: url, redirectUrl: route}) {
    $.ajax({
        url: url,
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        success: function(response, updateStatusMsg) {
            window.location.href = route;
            updateStatusMsg();
        },
        error: function(response){
            updateStatusMsg(response.responseJSON);
        },
    });
}

export default deleteModel;
