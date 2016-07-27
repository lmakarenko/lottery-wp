var isGuest = true;
$(function(){
   
   $('.demo-login').on('click', function(e){
        e.preventDefault();
        window.location.href = 'http://www.wasdclub.com';
    });
    
        $.ajax({
            type:'post',
            url:'/wp-admin/admin-ajax.php',
            data: {
                action: 'login_form',
                'ajax_nonce': asdfqwer
            },
            dataType: 'json',
            success: function(d){
                console.log(d);
                if(d.html){
                    $('#demo_login').html(d.html);
                    //$("#exit-form-back").css({"background-color": "#000000", "opacity": "0.7"});
                    //$("#exit-form-back").fadeToggle("fast");
                    //$("#demo_login").fadeToggle("fast");
                }
            }
        });
    
});

