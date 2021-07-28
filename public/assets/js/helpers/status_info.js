// Object.values(response.errors)[0][0] is used because there can be arbitrary number of erroring fields
// and each field can have arbitrary number of errors e.g. not unique AND not long enough.
// This way only 1 error at a time will be delievered even if there is just 1 error
function updateStatusMsg(response) {
    if ($(".status-info").length !== 0) {
        $(".status-info").empty();
    }

    if (response.status === "success") {
        $(".status-info").append(
            `<div class="col-6 alert alert-success mb-5 text-sm">
                ${response.message}
            </div>`)
    } else {
        $(".status-info").append(
            `<div class="col-6 alert alert-danger mb-5 text-sm">
                ${response.errors ? Object.values(response.errors)[0][0] : response.message}
            </div>`)
    }
}

export default updateStatusMsg;
