import updateStatusMsg from "./status_info.js";
//data=null because deactivate and activate use update model without sending any data, the controller knows what to do
function updateModel({url: url,data: data = null, callbacks: callbacksArr, request: request='POST'}) {
    $.ajax({
        url: url,
        type: request,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        data: data,
        success: callbacksArr,
        error: function(response) {
            updateStatusMsg(response.responseJSON);
        },
    });
}

export default updateModel;
