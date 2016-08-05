jQuery('document').ready(function(){
   jQuery('.lottery-report-btn').on('click', function(e){
        var post_id = parseInt(jQuery(this).attr('data-id'));
        jQuery.ajax({
            type:'post',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'get_report',
                post_id: post_id
            },
            dataType: 'json',
            success: function(d){
                console.log(d);
                if(!d.report){
                    return false;
                }
                var l = d.report.length, i, html = '<table><tr><th>ID</th><th>VK_ID</th><th>EMAIL</th></tr>';
                for(i=0;i<l;++i){
                    html += '<tr><td>' + d.report[i].id + '</td><td>' + d.report[i].vk_id + '</td><td>' + d.report[i].email + '</td></tr>';
                }
                html += '</table>';
                
                jQuery('<div class="lottery-report-c-c" />').appendTo('body');
                jQuery('<div class="lottery-report-c" />').html(html).on('dblclick', function(){
                    jQuery('.lottery-report-c-c').remove();
                }).appendTo('.lottery-report-c-c');
            }
        });
   });
});


