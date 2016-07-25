$(function(){
    
    var taskTimeoutId, camps_statuses, posts_statuses = {}, posts_id, id_adv,
        post_status_q = [], post_q = [], animating = false;
    
    init();
    
    function init(){
        parse_posts_data();
        bind_posts_events();
        if(user_id){
            create_post_q();
            status_updater();
        }
    }
    
    function status_updater(){
        
        if (taskTimeoutId) {
            clearTimeout(taskTimeoutId);
	}
        
        $.ajax({
            type:'post',
            url:'/wp-admin/admin-ajax.php',
            data: {
                action: 'get_camps_status',
                id_adv: get_adv_id_for_upd(),
                'ajax_nonce': asdfqwer
            },
            dataType: 'json',
            success: function(d){
                if(d.statuses){
                  camps_statuses = d.statuses;
                  /*
                  console.log('BEFORE');
                  console.log('camps_statuses:', camps_statuses);
                  console.log('posts_id:', posts_id);
                  console.log('posts_statuses:', posts_statuses);
                  console.log('post_status_q:', post_status_q);
                  */
                  check_posts_statuses();
                  /*
                  console.log('AFTER CHECK');
                  console.log('posts_statuses:', posts_statuses);
                  console.log('post_status_q:', post_status_q);
                  */
                  update_posts_statuses();
                  /*
                  console.log('AFTER UPDATE');
                  console.log('posts_statuses:', posts_statuses);
                  console.log('post_status_q:', post_status_q);
                  console.log('post_q:', post_q);
                  */
                  if(0 < post_status_q.length){
                    taskTimeoutId = setTimeout(status_updater, 36000);
                  }
                }
            }
        });
    }
        
    function parse_posts_data(){
        id_adv = $('#id-adv').val();
        posts_id = $('#id-posts').val().split(',');
    }
    
    function create_post_q(){
        var i, post_id;
        for(i=0;i<posts_id.length;++i){
            post_id = posts_id[i];
            post_status_q.push(post_id);
        }
    }
    
    function bind_posts_events(){
        var i, post_id, el;
        for(i=0;i<posts_id.length;++i){
            post_id = posts_id[i];
            el = $('.newPost[data-id="'+post_id+'"]').first().parent()
                .on('mouseenter', {'post_id': post_id}, function(e){
                    if(animating){
                        return;
                    }
                    var post_id = e.data.post_id;
                    $('.lottery-overlay[data-id="'+post_id+'"]').first().show();
                    $('.lottery-inner-content[data-id="'+post_id+'"]').first().show().animate({ bottom: 20 }, {duration: 400}, function(){
                        animating = false;
                    });
                })
                .on('mouseleave', {'post_id': post_id}, function(e){
                    if(animating){
                        return;
                    }
                    var post_id = e.data.post_id;
                    $('.lottery-inner-content[data-id="'+post_id+'"]').first().show().animate({ bottom: -20 }, {duration: 400}, function(){
                       animating = false;
                    });
                    $('.lottery-overlay[data-id="'+post_id+'"]').first().hide();
                });
        }
    }
    
    function get_adv_id_for_upd(){
        var i, post_id, id_adv, id_adv_ = [];
        for(i=0;i<post_status_q.length;++i){
            post_id = post_status_q[i];
            id_adv = $('.newPost[data-id="'+post_id+'"]').first().attr('data-adv');
            if('' != $.trim(id_adv)){
                id_adv_.push(id_adv);
            }
        }
        return id_adv_.join(',');
    }
    
    function check_posts_statuses(){
        var i, post_id;
        for(i=0;i<post_status_q.length;++i){
            post_id = post_status_q[i];
            posts_statuses[ post_id ] = check_post_status(post_id);
        }
    }
    
    function check_post_status(post_id){
        var e = $('.newPost[data-id="' + post_id + '"]').first(),
            adv_id_a = e.attr('data-adv').split(','),
            i, adv_id, s = true;
        for(i=0;i<adv_id_a.length;++i){
            adv_id = adv_id_a[i];
            if(!camps_statuses[ adv_id ]){
                s = false;
                break;
            }
        }
        return s;
    }
    
    function set_status_active(post_id){
        var i = $.inArray(post_id, post_q);
        if(-1 < i){
            post_q.splice(i,1);
        }
        var e = $('.newPost[data-id="' + post_id + '"]').first();
        e.removeClass('noactive').addClass('active');
    }
    
    function set_status_noactive(post_id){
        if(-1 == $.inArray(post_id, post_q)){
            post_q.push(post_id);
        }
        var e = $('.newPost[data-id="' + post_id + '"]').first();
        e.removeClass('active').addClass('noactive');
    }
    
    function update_posts_statuses(){
        var i, post_id;
        post_q = post_status_q.slice();
        for(i=0;i<post_status_q.length;++i){
            post_id = post_status_q[i];
            if(posts_statuses[post_id]){
                //console.log('status active:', post_id);
                set_status_active(post_id);
            } else {
                //console.log('status noactive:', post_id);
                set_status_noactive(post_id);
            }
        }
        post_status_q = post_q.slice();
    }
    
});

