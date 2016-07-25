var isGuest = true;
$(function(){
   
   $('.demo-login').on('click', function(e){
        e.preventDefault();
        return false;
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
                if(d.data){
                    $('#demo_login').html(d.data);
                    $("#exit-form-back").css({"background-color": "#000000", "opacity": "0.7"});
                    $("#exit-form-back").fadeToggle("fast");
                    $("#demo_login").fadeToggle("fast");
                }
            }
        });
   });
    
});

