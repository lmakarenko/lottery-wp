/*
function sendPost(url,data,success,fail) {
        var d = {};
        d['query_url'] = url;
        d['query_data'] = data;
        d['action'] = 'wasd_call';
        d['ajax_nonce'] = asdfqwer;
        return $.post('/wp-admin/admin-ajax.php',d,function(ret) {
                if (ret['error']!='') {
                        alert(ret['error']);
                        if (fail!==undefined) fail(ret);
                        return false;
                }else {
                        if (success!==undefined) success(ret);
                        return true;
                }
        },'json');
}

*/
/*
function sendPost_(url,data,success,fail) {
    $.ajax({
        url: wasd_domain + url,

        // The name of the callback parameter, as specified by the YQL service
        jsonp: "callback",

        // Tell jQuery we're expecting JSONP
        dataType: "jsonp",

        // Tell YQL what we want and that we want JSON
        data: {
            q: "select title,abstract,url from search.news where query=\"cat\"",
            format: "json"
        },

        // Work with the response
        success: function( response ) {
            console.log( response ); // server response
        }
    });
}
*/