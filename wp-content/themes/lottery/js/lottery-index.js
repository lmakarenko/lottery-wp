$(function(){
    
    var taskTimeoutId, tasks_statuses, posts_statuses = {}, posts_id, adv_id, post_status_q = [];
    
    (function init(){
        posts_id = $('#id-posts').val().split(',');
        adv_id = $('#id-adv').val();
        for(var i=0;i<posts_id.length;++i){
            post_status_q.push(posts_id[i]);
        }
        status_updater();
    })();
    
    function status_updater(){
        
        if (taskTimeoutId) {
            clearTimeout(taskTimeoutId);
	}
        
        $.ajax({
            type:'post',
            url:'/wp-admin/admin-ajax.php',
            data: {
                action: 'get_tasks_status',
                id_adv: adv_id,
            },
            dataType: 'json',
            success: function(d){
                if(d.statuses){
                  tasks_statuses = d.statuses;
                  check_statuses();
                  update_statuses();
                  console.log(posts_statuses);
                  console.log(post_status_q);
                  if(0 < post_status_q.length){
                    taskTimeoutId = setTimeout(status_updater, 6000);
                  }
                }
            }
        });
    }
    
    function set_status_active(post_id){
        var e = $('.newPost[data-id="' + post_id + '"]').first();
        e.removeClass('noactive').addClass('active');
        var i = $.inArray(post_id, post_status_q);
        if(-1 < i){
            post_status_q.splice(i,1);
        }
    }
    
    function set_status_noactive(post_id){
        var e = $('.newPost[data-id="' + post_id + '"]').first();
        e.removeClass('active').addClass('noactive');
        if(-1 == $.inArray(post_id, post_status_q)){
            post_status_q.push(post_id);
        }
    }
    
    function update_statuses(){
        for(var i=0;i<posts_id.length;++i){
            var post_id = posts_id[i];
            if(typeof posts_statuses[post_id] !== 'undefined'
                    && posts_statuses[post_id]){
                set_status_active(post_id);
            } else {
                set_status_noactive(post_id);
            }
        }
    }
    
    function check_statuses(){
        for(var k=0;k<posts_id.length;++k){
            var post_id = posts_id[k],
                id_adv_a = $('.newPost[data-id="' + post_id + '"]').attr('data-adv').split(','),
                i, task_id, task_type;
            for(i=0;i<id_adv_a.length;++i){
                if(typeof tasks_statuses['soc'] !== 'undefined'
                        && tasks_statuses['soc'][ id_adv_a[i] ]){                   
                    task_type = 'soc';
                } else if(typeof tasks_statuses['cpa'] !== 'undefined'
                        && tasks_statuses['cpa'][ id_adv_a[i] ]){
                    task_type = 'cpa';
                } else {
                    posts_statuses[post_id] = false;
                    continue;
                }
                for(task_id in tasks_statuses[task_type][ id_adv_a[i] ]){
                    if('paid' == tasks_statuses[task_type][ id_adv_a[i] ][task_id]['task_status'] ||
                        'finish' == tasks_statuses[task_type][ id_adv_a[i] ][task_id]['task_status']){
                        posts_statuses[post_id] = true;
                    } else {
                        posts_statuses[post_id] = false;
                    }
                }
            }
        }
    }
    
});

