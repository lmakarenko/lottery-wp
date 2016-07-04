$('document').ready(function(){
    
    var checkTimeoutId = false, posts_id_s = $('#id-posts').val(), posts_id = posts_id_s.split(',');
    
    checkCompleteCnt();
    
    function checkCompleteCnt(id_adv){
        
        if (checkTimeoutId) {
            clearTimeout(checkTimeoutId);
	}
        
        var p = {'action': 'get_complete_cnt', 'id_posts': posts_id_s};
        
        $.ajax({
            'url':'/wp-admin/admin-ajax.php',
            'type':'post',
            'data':p,
            'dataType':'json',
            'success':function(data){
                
                var i, cnt, post_id;
                
                for(i=0;i<posts_id.length;++i){
                    post_id = posts_id[i];
                    if(!data[ post_id ]){
                        continue;
                    }
                    cnt = data[ post_id ].cnt || false;                   
                    if(false !== cnt){
                        cnt = parseInt(cnt);
                        $('.lottery-complete-cnt-n[data-id="' + post_id + '"]').first().html(cnt);
                    }
                }
                
                checkTimeoutId = setTimeout(checkCompleteCnt, 60000);

            }
        });
                
    }
    
});


