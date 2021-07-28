function searchUsers({url, search=null, criteria=null, filter=null, page= 1,
                         callbacks: callbacksArr, request='GET'}) {
    $.ajax({
        url: url,
        type: request,
        dataType: 'json',
        data: {
            search: search,
            criteria: criteria,
            filter: filter,
            page: page,
        },
        success: callbacksArr
    });
}

export default searchUsers;
