$('document').ready(function(){
   $('.lottery-report-btn').on('click', function(e){
        var post_id = parseInt($(this).attr('data-id'));
        $.ajax({
            type:'post',
            url: ajax_url,
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


