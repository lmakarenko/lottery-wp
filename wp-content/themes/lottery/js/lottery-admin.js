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
            }
        });
   });
});


