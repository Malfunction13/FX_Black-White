import searchPosts from "./search_posts.js";
import toggleElement from "../../helpers/element_toggler.js";
import updateStatusMsg from "../../helpers/status_info.js";
import managePagination from "../../helpers/manage_pagination.js";
import updateInfo from "./update_info.js";
import createPost from "./create_post.js";


$(document).ready(function() {
    $(document).on('click', ".search-button, .management-button", function(e) {
        if (!$(this).hasClass('disabled')) {
            e.preventDefault();

            if (this.id === 'search_by_title') {
                let url = $('#search_by_title_form').prop('action');
                let search = $('#search').val();
                let callbacks = [updateInfo, managePagination,updateStatusMsg];
                searchPosts({url: url,search: search, callbacks: callbacks});

            } else if (this.id === 'filter_by_category') {
                let url = $('#search_by_category_form').prop('action');
                let filter = $('#filter').val();
                let callbacks = [updateInfo, managePagination,updateStatusMsg];

                searchPosts({url: url,filter: filter, callbacks: callbacks});

            } else if (this.id === 'new_post') {
                toggleElement($("#new_post_menu"));

            } else if (this.id === 'create_post') {
                let url = $('#new_post_form').prop('action');
                let data = new FormData($('#new_post_form')[0]); //must use form data to upload text and image

                let callbacks = [updateInfo, managePagination, updateStatusMsg, toggleElement($("#new_post_menu"))];
                createPost({url: url, data: data, callbacks: callbacks});
            }
            else {  //pagination links
                //will work for both filters separately - can control title and category search pagination independently
                let url = $(this).prop('href');
                let search = $('#search').val();
                let filter = $('#filter').val();
                let page = url.charAt(url.length - 1);
                let callbacks = [updateInfo, managePagination,updateStatusMsg];

                searchPosts({url: url,search: search,
                    filter: filter, callbacks: callbacks, page: page});

            }
        }
    });
});



