function sendPost(url,data,success,fail) {
        var d = {};
        data['url'] = url;
        d['data'] = data;
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
