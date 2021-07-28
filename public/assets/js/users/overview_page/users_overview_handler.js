import searchUsers from "./search_users.js";
import updateInfo from "./update_info.js";
import managePagination from "../../helpers/manage_pagination.js";
import updateStatusMsg from "../../helpers/status_info.js";

$(document).ready(function() {
    $(document).on('click', ".search-button", function(e) {
        if (!$(this).hasClass('disabled')) {
            e.preventDefault();

            if (this.id === 'users_search') {
                let url = $('#search_by_name_mail').prop('action');
                let search = $('#search').val();
                let criteria = $('#criteria').val();
                let callbacks = [updateInfo, managePagination, updateStatusMsg];

                searchUsers({url: url, search: search, criteria: criteria,
                                                                        callbacks: callbacks});
            } else if (this.id === 'filtered_search') {
                let url = $('#search_by_filter').prop('action');
                let filter = $('#filter').val();
                let callbacks = [updateInfo, managePagination, updateStatusMsg];

                searchUsers({url: url, filter: filter, callbacks: callbacks});

            } else {  //pagination links
                //pagination will work for both filters separately - can control title and category search pagination
                let url = $(this).prop('href');
                let search = $('#search').val();
                let criteria = $('#criteria').val();
                let filter = $('#filter').val();
                let page = url.charAt(url.length - 1);
                let callbacks = [updateInfo, managePagination];

                searchUsers({url: url, search: search, criteria: criteria,
                                                                    filter: filter, page: page, callbacks: callbacks});
            }
        }
    });
});



