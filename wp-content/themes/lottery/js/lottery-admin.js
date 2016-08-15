(function($){
    
$('document').ready(function(){
   
   var loading = false,
       overlay_e = $('<div class="lottery-overlay" />').on('click', function(){
           $('.lottery-report-c-c').remove();
           overlay_e.hide();
       }).appendTo('body');
   
   $('.lottery-report-btn').on('click', function(){
        if(loading) return;
        loading = true;
        $('.lottery-report-c-c').remove();
        var post_id = parseInt($(this).attr('data-id'));
        $.ajax({
            type:'post',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'get_report',
                post_id: post_id,
                BE: 1
            },
            dataType: 'json',
            success: function(d){
                //console.log(d);
                
                var html = '';
                
                if(!d.report && !d.error){
                    
                    html += '<div class="lottery-report-c1">No report data</div>';
                
                } else if(d.error){
                    
                    html += '<div class="lottery-report-c1">' + d.error + '</div>';
                    
                } else {
                
                    var limit = 10, l = d.report.length, i,
                        pages_cnt = (d.report_cnt < limit ? 1 : Math.ceil(d.report_cnt / limit));

                    html = '<div id="lottery-report-row-left" class="row row-left">&lsaquo;</div><div id="lottery-report-row-right" class="row row-right">&rsaquo;</div><div class="lottery-report-cnt">Всего участников: ' + d.report_cnt + '</div><a class="lottery-report-cp">Скачать в .csv</a><div class="clear"></div>';
                    html += '<table><thead><tr><th>ID</th><th>VK_ID</th><th>EMAIL</th></tr></thead><tbody>';              

                    for(i=0;i<l;++i){
                        html += '<tr><td>' + d.report[i].id + '</td>';
                        html += '<td>' + report_vk_id(d.report[i].vk_id) + '</td>';
                        html += '<td>' + (d.report[i].email ? report_email(d.report[i].email) : '-') + '</td></tr>';
                    }

                    html += '</tbody></table>';
                    
                    html += '<div class="lottery-pagination-bar">';
                    for(i=1;i<=pages_cnt;++i){
                        if(i > 1){
                            html += ' - <a data-i="' + i + '" href="#">' + i + '</a>';
                        } else {
                            html += '<a class="sel" data-i="' + i + '" href="#">' + i + '</a>';
                        }
                    }
                    html += '<div class="clear"></div></div>';
                
                }
                
                overlay_e.show();
                $('<div class="lottery-report-c-c" />').appendTo('body');
                $('<div class="lottery-report-c" />').html(html).appendTo('.lottery-report-c-c');               
                
                $('#lottery-report-row-left').on('click', function(e){
                   e.preventDefault();
                   var i = parseInt($('.lottery-pagination-bar a.sel').attr('data-i')), i_ = i - 1;
                   if(1 > i_){
                       i_ = pages_cnt;
                   }
                   $('.lottery-pagination-bar a[data-i="' + i_ + '"]').click();
                });
                $('#lottery-report-row-right').on('click', function(e){
                   e.preventDefault();
                   var i = parseInt($('.lottery-pagination-bar a.sel').attr('data-i')), i_ = i + 1;
                   if(i_ > pages_cnt){
                       i_ = 1;
                   }
                   $('.lottery-pagination-bar a[data-i="' + i_ + '"]').click();
                });
                
                $('.lottery-report-cp').on('click', function(e){
                   e.preventDefault();
                   
                   if(loading) return;
                   
                   loading = true;
                   
                   $.ajax({
                       type: 'post',
                       url: '/wp-admin/admin-ajax.php',
                       data: {
                           action: 'create_report',
                           post_id: post_id,
                           no_cache: 1,
                           BE: 1
                       },
                       dataType: 'json',
                       success: function(data){
                            if(data.url){
                                $.fileDownload(data.url, {
                                    /*successCallback: function (url) {
                                        alert('You just got a file download dialog or ribbon for this URL :' + url);
                                    },*/
                                    failCallback: function (html, url) {
                                        alert('Your file download just failed for this URL:' + url + '\r\n' +
                                                'Here was the resulting error HTML: \r\n' + html
                                        );
                                    }
                                });
                           }
                       },
                       complete: function(){
                           loading = false;
                       }
                   });
                });
                
                $('.lottery-pagination-bar a').on('click', function(e){
                   e.preventDefault();
                   
                   if(loading) return;
                   
                   var $this = $(this);
                   
                   if($this.hasClass('sel')) return;
                   
                   loading = true;
                   
                   var i = parseInt($this.attr('data-i'));
                   $('.lottery-pagination-bar a.sel').removeClass('sel');
                   $this.addClass('sel');
                   
                   $.ajax({
                       type: 'post',
                       url: '/wp-admin/admin-ajax.php',
                       data: {
                           action: 'get_report',
                           post_id: post_id,
                           offset: limit * (i - 1),
                           BE: 1
                       },
                       dataType: 'json',
                       success: function(d){
                           if(d.report){
                            var i, l = d.report.length, html = '';
                            for(i=0;i<l;++i){
                                html += '<tr><td>' + d.report[i].id + '</td>';
                                html += '<td>' + report_vk_id(d.report[i].vk_id) + '</td>';
                                html += '<td>' + (d.report[i].email ? report_email(d.report[i].email) : '-') + '</td></tr>';
                            }
                            $('.lottery-report-c table tbody').html(html);
                           }
                       },
                       complete: function(){
                           loading = false;
                       }
                   });
                });
                
            },
            complete: function(){
                loading = false;
            }
        });
   });
   /*
   $('.lottery-promo-btn').on('click', function(){
        if(loading) return;
        loading = true;
        $('.lottery-report-c-c').remove();
        var post_id = parseInt($(this).attr('data-id'));
        $.ajax({
            type:'post',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'get_promo',
                post_id: post_id,
                BE: 1
            },
            dataType: 'json',
            success: function(d){
                
                var html = '';
                
                overlay_e.show();
                $('<div class="lottery-report-c-c" />').appendTo('body');
                $('<div class="lottery-report-c" />').html(html).appendTo('.lottery-report-c-c');
                
            },
            complete: function(){
                loading = false;
            }
        });
   });
   */
   function report_vk_id(vk_id){
       return '<a target="_blank" href="http://vk.com/id' + vk_id + '">' + vk_id + '</a>';
   }
   
   function report_email(email){
       return '<a href="mailto:' + email + '">' + email + '</a>';
   }
   
});

})(jQuery);