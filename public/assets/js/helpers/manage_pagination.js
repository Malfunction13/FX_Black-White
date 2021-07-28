function managePagination(response) {
    let pagination = response.data;
    $("#pagination").empty();
    if(pagination.last_page > 1) {
        if (pagination.current_page === 1) {
            $("#pagination").append(
                `<div class="disabled search-button mr-2">Previous</div>`
            );
        } else {
            $("#pagination").append(
                `<div class="mr-2">
                    <a class="search-button"
                        href="${pagination.links[pagination.current_page-1].url}"
                        rel="prev">Previous
                    </a>
                  </div>`
            );
        }

        for(let i = 1; i <= pagination.last_page; i++) {
            let link = pagination.links[i];
            if (pagination.current_page == i) {
                $("#pagination").append(
                    `<div class="disabled mx-2 active search-button mx-2">${link.label}</div>`
                );
            } else {
                $("#pagination").append(
                    `<div class="mx-2"><a class="search-button" href="${link.url}">${link.label}</a></div>`
                );
            }
        }

        if (pagination.current_page == pagination.last_page) {
            $("#pagination").append(
                `<div class="disabled search-button ml-2">Next</div>`
            );
        } else {
            $("#pagination").append(
                `<div class="ml-2">
                    <a class="search-button" href="${pagination.links[pagination.links.length-1].url}" rel="next">Next</a>
                </div>`
            );
        }
    }
}

export default managePagination;
