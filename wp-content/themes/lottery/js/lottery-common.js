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

function sendPost_(url,data,success,fail) {
    $.getJSON(
       wasd_domain + url,
       function(json){
           console.log(json);
       }
    );
}