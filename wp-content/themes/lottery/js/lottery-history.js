$('document').ready(function(){
    
    var anim_complete = true,
        i_w = 272,
        i_c_max = 30,
        i_c_v = 3,
        i_c = parseInt($('#lottery-history-cnt').val()),
        i_sel = 1,
        i_sel_max = i_c - i_c_v + 1,
        d_w = 13,
        d_c = Math.floor(i_c / i_c_v), i,
        e_l = $('#lottery-old'),
        e_r_l = $('#lottery-history-row-l'),
        e_r_r = $('#lottery-history-row-r'),
        i_loaded_all = false,
        i_c_loaded = 3;
    
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
    
    function items_load(p){
        $.ajax({
           'type': 'post',
           'url': '/wp-admin/admin-ajax.php',
           data: {
            'action': 'history_items_get',
            'ajax_nonce': asdfqwer,
            'offset': p.offset,
            'limit': p.limit
           },
           'dataType': 'json',
           'success': function(d){
               if(d.items){
                items_add(d.items);
               }
               if(p['callback']){
                   p['callback']();
               }
           }
        });
    }

    function items_add(d){
        var i, l = d.length,
            tpl = _.template($('#history-item-tpl').html()),
            html_ = '';
        for(i=0;i<l;++i){
            html_ = tpl(d[i]);
            e_l.append(html_);
        }
    }
    
    function right_row_click(){
        if(!anim_complete){
            return;
        }
        var limit = i_c - i_c_loaded;
        if(!i_loaded_all && limit > 0){
            items_load({
               'offset': i_c_loaded,
               'limit': limit,
               'callback': function(){
                   i_loaded_all = true;
                   right_row_click_v();
               }
            });
        } else {
            right_row_click_v();
        }
    }
    
    function right_row_click_v(){
        var i_sel_ = i_sel + 1;
        if(i_sel_ > i_sel_max){
            anim_(e_l, {'left':'+=' + (i_sel_max - 1) * i_w + 'px'}, 600);
            i_sel = 1;
            check_();
        } else {
            anim_(e_l, {'left':'-=' + i_w +'px'}, 600);
            ++i_sel;
            check_();
        }
    }
    
    function left_row_click(){
        if(!anim_complete){
            return;
        }
        var limit = i_c - i_c_loaded;
        if(!i_loaded_all && limit > 0){
            items_load({
               'offset': i_c_loaded,
               'limit': limit,
               'callback': function(){
                   i_loaded_all = true;
                   left_row_click_v();
               }
            });
        } else {
            left_row_click_v();
        }
    }
    
    function left_row_click_v(){
        var i_sel_ = i_sel - 1;
        if(i_sel_ < 1){
            anim_(e_l, {'left':'-=' + (i_sel_max - 1) * i_w + 'px'}, 600);
            i_sel = i_sel_max;
            check_();
        } else {
            anim_(e_l, {'left':'+=' + i_w +'px'}, 600);
            --i_sel;
            check_();
        }
    }
    
    function dot_click(){
        if(!anim_complete){
            return;
        }
        var e = $(this), limit = i_c - i_c_loaded;
        if(!i_loaded_all && limit > 0){
            items_load({
               'offset': i_c_loaded,
               'limit': limit,
               'callback': function(){
                   i_loaded_all = true;
                   dot_click_v(e);
               }
            });
        } else {
            dot_click_v(e);
        }
    }
    
    function dot_click_v(e_){
        var i_ = parseInt(e_.attr('data-i'));
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
    }
    
    function init_v(){
     
        if(i_c > i_c_v){

            $('#lottery-history-row-l').show();
            $('#lottery-history-row-r').show();

            e_r_r.on('click', right_row_click);

            e_r_l.on('click', left_row_click);

        }

        if(d_c > 1){
            var e_d = $('#lottery-history-dots-c'), e_d_i;
            e_d.css({'width': (d_w + 10) * d_c + 'px'}).html('');
            for(i=0;i<d_c;++i){
                e_d_i = $('<div data-i="' + (i * i_c_v + 1) + '" class="lottery-history-t"></div>');
                e_d_i.appendTo(e_d);
                e_d_i.on('click', dot_click)
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
    }
    
    if(0 < i_c){
        items_load({
           'offset': 0,
           'limit': i_c_loaded,
           'callback': function(){
               init_v();
           }
        });
    }
    
 });