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
                var l = d.report.length, i, html = '<table>';
                for(i=0;i<l;++i){
                    html += '<tr><td>' + d[i].id + '</td>td>' + d[i].vk_id + '</td>td>' + d[i].email + '</td></tr>';
                }
                html += '</table>';
                jQuery('<div/>').html(html).on('click', function(){
                    jQuery(this).remove();
                }).appendTo('body');
            }
        });
   });
});


