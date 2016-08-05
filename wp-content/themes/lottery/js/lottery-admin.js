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
                //console.log(d);
                var i, html = '<table>';
                for(i=0;i<d.length;++i){
                    html += '<tr><td>' + d[i].id + '</td>td>' + d[i].vk_id + '</td>td>' + d[i].email + '</td></tr>';
                }
                html += '</table>';
                $('<div/>').html(html).on('click', function(){
                    $(this).remove();
                }).appendTo('body');
            }
        });
   });
});


