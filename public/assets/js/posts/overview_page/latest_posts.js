import routes from '../../routes.js'
function getLatestPosts(callbacksArr) {
    $.ajax({
        url: routes['postOverview'],
        type: 'GET',
        dataType: 'json',
        data: '',
        success: callbacksArr
    });
}

export default getLatestPosts;
