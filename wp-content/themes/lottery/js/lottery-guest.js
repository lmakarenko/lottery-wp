var isGuest = true;
$('document').ready(function(){
   $('.demo-login').on('click', function(e){
        e.preventDefault();
        window.location.href = 'http://www.wasdclub.com';
        /*
        $.getJSON(
            '/wp-admin/admin-ajax.php',
            {
                action: 'login_form',
                'ajax_nonce': asdfqwer,
                rurl: window.location.href
            },
            function(d){
                //console.log(d);
                if(d.html){
                    $('#demo_login').html(d.html);
                    $('#exit-form-back').show();
                    $('#demo_login').show();
                }
            }
        );
        */
    });
});

