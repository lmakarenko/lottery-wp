$('document').ready(function(){
    
    var anim_complete = true,
        i_w = 272, i_c_max = 30, i_c_v = 3, i_c = parseInt($('#lottery-history-cnt').val()), i_sel = 1, i_sel_max = i_c - i_c_v + 1,
        d_w = 13, d_c = Math.floor(i_c / i_c_v), i,
        e_l = $('#lottery-old'),
        e_r_l = $('#lottery-history-row-l'),
        e_r_r = $('#lottery-history-row-r');
    
    function check_(){
        var e_ = $('.lottery-history-t[data-i="' + i_sel + '"]');
        if(e_.length){
            $('.lottery-history-t1').first().removeClass('lottery-history-t1');
            e_.addClass('lottery-history-t1');
        }
    }
    
    function anim_(el, params, delay, callback){
        if(!anim_complete){
            return;
        }
        anim_complete = false;
        el.animate(params, delay, function(){
            if(typeof callback !== 'undefined'){
                callback();
            }
            anim_complete = true;
        });
    }
    
    function calcScrollTop_(){
        var st = $(document).scrollTop(), wh = $(window).height(), eh = 654, mt = st;
        if(wh > eh){
            mt = st + Math.ceil((wh - eh) / 2);  
        } else if(eh > wh){
            mt = st + Math.ceil((eh - wh) / 2);
        }
        return mt;
    }
    
    function hideAlert_(id){
        $('.lottery-history-alert[data-id="'+id+'"]').first().fadeOut(0, 'swing', function(){
            $('.exit-form-back[data-id="'+id+'"]').first().hide().appendTo('#lottery-old');
            anim_complete = true;
        }).off('scroll');
    }
    
    if(i_c > i_c_v){
        
        $('#lottery-history-row-l').show();
        $('#lottery-history-row-r').show();
        
        e_r_r.on('click', function(){
            if(!anim_complete){
                return;
            }
            var i_sel_ = i_sel + 1;
            if(i_sel_ > i_sel_max){
                anim_(e_l, {'left':'+=' + (i_sel_max - 1) * i_w + 'px'}, 600);
                i_sel = 1;
            } else {
                anim_(e_l, {'left':'-=' + i_w +'px'}, 600);
                ++i_sel;
            }
            check_();
        });

        e_r_l.on('click', function(){
            if(!anim_complete){
                return;
            }
            var i_sel_ = i_sel - 1;
            if(i_sel_ < 1){
                anim_(e_l, {'left':'-=' + (i_sel_max - 1) * i_w + 'px'}, 600);
                i_sel = i_sel_max;
            } else {
                anim_(e_l, {'left':'+=' + i_w +'px'}, 600);
                --i_sel;
            }
            check_();
        });
    }
    
    if(d_c > 1){
        var e_d = $('#lottery-history-dots-c'), e_d_i;
        e_d.css({'width': (d_w + 10) * d_c + 'px'}).html('');
        for(i=0;i<d_c;++i){
            e_d_i = $('<div data-i="' + (i * i_c_v + 1) + '" class="lottery-history-t"></div>');
            e_d_i.appendTo(e_d);
            e_d_i.on('click', function(e){
                if(!anim_complete){
                    return;
                }
                var i_ = parseInt($(this).attr('data-i'));
                if(i_ == i_sel){
                    return;
                }
                $('.lottery-history-t[data-i="' + i_sel + '"]').removeClass('lottery-history-t1');
                if(i_ < i_sel){
                    anim_(e_l, {'left':'+=' + (i_sel - i_) * i_w + 'px'}, 600);
                } else if(i_ > i_sel){
                    anim_(e_l, {'left':'-=' + (i_ - i_sel) * i_w + 'px'}, 600);
                }
                i_sel = i_;
                $('.lottery-history-t[data-i="' + i_sel + '"]').addClass('lottery-history-t1');
            })
            .on('mouseout', function(){
                var i_ = parseInt($(this).attr('data-i'));
                if(i_ != i_sel){
                    $(this).removeClass('lottery-history-t1');
                }
            })
            .on('mouseover', function(){
                var i_ = parseInt($(this).attr('data-i'));
                if(i_ != i_sel){
                    $(this).addClass('lottery-history-t1');
                }
            });
        }
        $('.lottery-history-t[data-i="1"]').addClass('lottery-history-t1');
        $('#lottery-history-panel-top').show();
    }
    
    e_l.css({
        'width': i_w * i_c + 'px'
    });
         
    $('.lottery-history-btn').on('click', function(){
        anim_complete = false;
        var $this = $(this),
            id = parseInt($this.attr('data-id')),
            e_c = $('.exit-form-back[data-id="'+id+'"]').first(),
            e_ = $('.lottery-history-alert[data-id="'+id+'"]').first();
        e_c.on('click', {'id': id}, function(e){
            hideAlert_(e.data.id);
        });
        if(!$('body > .exit-form-back[data-id="'+id+'"]').length){
            e_c.css({'height': $(document).height() + 'px'});
            e_.css({'margin-top': calcScrollTop_() + 'px'}).on('click', function(e){
                e.stopPropagation();
            });
            e_c.appendTo('body').show();
            /*var e__ = $('.lottery-history-alert-inner-2[data-id="'+id+'"]').first();
            e__.html( e__.html() );*/
            $(window).on('scroll', {'el': e_}, function(e){
                e.data.el.css({'margin-top': calcScrollTop_() + 'px'});
            });
        }
        e_.fadeIn(600, 'swing', function(){
            anim_complete = true;
        });
    });
    
    $(document).keydown(function(e) {
        var id = $('body > .exit-form-back').first().attr('data-id');
        if (e.keyCode == 27) {
            hideAlert_(id);
        }
    });
    
 });
 
 $('document').ready(function(){
    
    var checkTimeoutId = false, posts_id_s = $('#id-posts').val(), posts_id = posts_id_s.split(',');
    
    checkTimeoutId = setTimeout(checkCompleteCnt, 60000);
    
    function checkCompleteCnt(id_adv){
        
        if (checkTimeoutId) {
            clearTimeout(checkTimeoutId);
	}
        
        var p = {'action': 'get_complete_cnt', 'id_posts': posts_id_s, 'ajax_nonce': asdfqwer};
        
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