$(function(){
    
    var taskTimeoutId, camps_statuses, posts_statuses = {}, posts_id, id_adv, post_status_q = [];
    
    (function init(){
        parse_posts_data();
        bind_posts_events();
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
                action: 'get_camps_status',
                id_adv: get_adv_id_for_upd(),
            },
            dataType: 'json',
            success: function(d){
                if(d.statuses){
                  camps_statuses = d.statuses;
                  check_posts_statuses();
                  update_posts_statuses();
                  console.log(camps_statuses);
                  console.log(posts_id);
                  console.log(post_status_q);
                  console.log(posts_statuses);
                  if(0 < post_status_q.length){
                    //taskTimeoutId = setTimeout(status_updater, 16000);
                  }
                }
            }
        });
    }
        
    function parse_posts_data(){
        var i, post_id;
        id_adv = $('#id-adv').val();
        posts_id = $('#id-posts').val().split(',');
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
                    var post_id = e.data.post_id,
                        el_c = $('.newPost[data-id="'+post_id+'"]').first();
                    el_c.find('.lottery-overlay').first().show();
                    el_c.find('.lottery-complete-c').first().fadeIn('slow');
                })
                .on('mouseleave', {'post_id': post_id}, function(e){
                    var post_id = e.data.post_id,
                        el_c = $('.newPost[data-id="'+post_id+'"]').first();
                    el_c.find('.lottery-complete-c').first().fadeOut('slow');
                    el_c.find('.lottery-overlay').first().hide();
                });
        }
    }
    
    function get_adv_id_for_upd(){
        var i, post_id, id_adv_ = [];
        for(i=0;i<post_status_q.length;++i){
            post_id = post_status_q[i];
            id_adv_.push(post_id);
        }
        //id_adv = id_adv_.join(',');
        //console.log('new id_adv ' + id_adv);
        return id_adv;
    }
    
    function check_posts_statuses(){
        var i, post_id;
        for(i=0;i<post_status_q.length;++i){
            post_id = post_status_q[i];
            posts_statuses[ post_id ] = check_post_status(post_id);
        }
    }
    
    function check_post_status(post_id){
        var adv_id_a = $('.newPost[data-id="'+post_id+'"]').first().attr('data-adv').split(','),
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
    
    function update_posts_statuses(){
        for(var i=0;i<post_status_q.length;++i){
            var post_id = post_status_q[i];
            if(posts_statuses[post_id]){
                set_status_active(post_id);
            } else {
                set_status_noactive(post_id);
            }
        }
    }
    
});

