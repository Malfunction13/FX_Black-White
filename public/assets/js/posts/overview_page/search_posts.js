function searchPosts({url: url, search: search=null,filter: filter=null, page: page=null,
                         callbacks: callbacksArr, request: request='GET'}) {
    $.ajax({
        url: url,
        type: request,
        dataType: 'json',
        data: {
            search: search,
            filter: filter,
            page: page,
        },
        success: callbacksArr,

    });
}

export default searchPosts;
