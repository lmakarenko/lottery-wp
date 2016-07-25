<div id="demo_login_header">
    <div id="demo_login_header_txt">
        Вы находитесь в демо-режиме. Войдите или зарегистрируйтесь.
    </div>
</div>
<div id="demo_login_btn">
    <button class="demo_sign_up">РЕГИСТРАЦИЯ</button>
    <button class="demo_sign_in active">ВОЙТИ</button>
</div>
<div id="demo_agreement">
    При входе на сайт, вы соглашаетесь с условиями <a href="/agreement.html" target="_blank">пользовательского соглашения</a>
</div>
<div id="demo_login_tab">
    <div id="demo_login_tab_l">
        <form id="ajax_login_form" action="/login" method="post">
            <div class="demo_login_txt">
                Заполните форму:
            </div>
            <div class='demo_holder'><img src="/site/skins/wasd2_main/public/images/emailico.png"><input type="text" name="login" value="" placeholder="E-mail адресс"/></div>
            <div class='demo_holder'><img src="/site/skins/wasd2_main/public/images/passwordico.png"><input type="password" name="password" value="" placeholder="Пароль"/></div>
            <div class="align-right">
                <a href="#" onclick="return forgetPass()">Забыли пароль?</a>
            </div>
            <div id="demo_login_captcha" <?php if(!$d->captcha){ ?>style="display: none"<?php } ?>>
                <div id="captcha" style="cursor: pointer" title="Обновить" onclick="$('#captcha').load('/user/index/captcha');"></div>
                <div class="holder">
                    <input type="text" name="captcha[input]" placeholder="Введите код"/>
                </div>
                <?php if($d->captcha){ ?>
                <script>
                    $('#captcha').load('/user/index/captcha');
                </script>
                <?php } ?>
            </div>
            <div id="demo_login_login">
                <button class="button reg-button" onclick="ajaxLogin(); return false;">ВХОД</button>
            </div>
            <input type="hidden" name="rurl" value="<?php echo $rurl; ?>" />
        </form>
    </div>
    <div id="demo_register_tab_l">
        <form id="ajax_register_form" action="#" method="post">
            <div class="demo_login_txt">
                Заполните форму:
            </div>
            <div class='demo_holder'><img src="/site/skins/wasd2_main/public/images/emailico.png"><input id="demo_input_email" type="text" name="email" value="" placeholder="E-mail адресс"/></div>
            <div class='demo_holder'><img src="/site/skins/wasd2_main/public/images/passwordico.png"><input id="demo_input_password1" type="password" name="password1" value="" placeholder="Пароль"/></div>
            <div class='demo_holder'><img src="/site/skins/wasd2_main/public/images/passwordico.png"><input id="demo_input_password2" type="password" name="password2" value="" placeholder="Пароль еще раз"/></div>
            <div id="demo_email_code" class='demo_holder' style="display: none"><img class="refresh" onclick="dl_resendEmail();" src="/site/skins/wasd2_main/public/images/refresharrows.png" style="cursor: pointer"><input id="demo_input_code_email" type="text" value="" name="code_email" style="" placeholder="Код из E-mail"></div>
            <input type="hidden" name="code_email_id" id="email_code_id" value="" />
            <div id="demo_login_login">
                <button id="demo_reg_btn" class="button reg-button" onclick="ajaxRegister(); return false;">РЕГИСТРАЦИЯ</button>
            </div>
        </form>
    </div>
    <div id="demo_login_tab_r">
        <div class="demo_login_txt">
            Войдите через соц. сети:
        </div>
        <ul id="demo_login_social">
            <li><a href="<?php echo $d->vkAuthUri; ?>"><img src="/site/skins/wasd2_sub/public/images/vk_small.png" width="155px" height="24px" alt="ВКонтакте" /><div>Вконтакте</div></a></li>
            <li><a href="<?php echo $d->fbAuthUri; ?>"><img src="/site/skins/wasd2_sub/public/images/fb_small.png" width="155px" height="24px" alt="facebok" /><div>Facebook</div></a></li>
            <li><a href="<?php echo $d->odAuthUri; ?>"><img src="/site/skins/wasd2_sub/public/images/od_small.png" width="155px" height="24px" alt="Одноклассники" /><div>Одноклассники</div></a></li>
        </ul>
    </div>
</div>
<script>

    $("#exit-form-back").click(function () {
        $("#exit-form-back").css({"background-color": "", "opacity": ""});
        $("#exit-form-back").hide();
        $("#demo_login").hide();
        $("#exit-form").hide();
    });

    $('#demo_login_btn button').click(function () {
        if ($(this).hasClass("active")) {
            return false;
        }
        $('#demo_login_btn button').removeClass('active');
        $(this).addClass('active');
        $('#demo_login_tab_l').toggle();
        $('#demo_register_tab_l').toggle();
    });

    function ajaxLogin() {
        $('#ajax_login_form').submit();
        /*
        var params = $('#ajax_login_form').serialize();
        $.post('/siteuser/ajax/ajaxlogin', params,
                function (response) {
                    if (!response['ok']) {
                        alert(response['error']);
                        if (response['captcha']) {
                            $('#demo_login_captcha').show();
                            $('#captcha').load('/user/index/captcha');
                            $('.holder > input').val('');
                        }
                    } else {
                        console.log(response);
                        setTimeout(function(){
                            //document.location.href = response['url'];
                            document.location.href = '/';
                        }, 5000);
                        return false;
                    }
                },
                'json'
        );
        return false;
        */
    }

    function ajaxRegister() {
        lom = showLoadingProcessLayer('Минутку...');
        var data = {
            email: $('#demo_input_email').val(),
            password1: $('#demo_input_password1').val(),
            password2: $('#demo_input_password2').val()
        };

        $.post('/siteregister/index/sendemail', data, function (ret) {
            $('#' + lom).remove();

            if (ret['error'] != '') {
                alert(ret['error']);
                return false;
            }

            alert('На ваш E-mail отправлен код подтверждения. Введите его в соответствующее поле.');
            $('#demo_email_code').show();
            $('#email_code_id').val(ret['code_id']);
            $('#demo_reg_btn').attr('onclick', 'dl_doRegister(); return false;');
        }, 'json');
    }

    function dl_doRegister() {
        var data = $('#ajax_register_form').serialize();
        lom = showLoadingProcessLayer('Регистрирую...');
        sendPost('/siteregister/index/userregister', data, function () {
            $('#' + lom).remove();
            document.location.href = "/siteregister/index/success" + ((typeof rurl != 'undefined') ? '/rurl/' + rurl : '');
        }, function () {
            $('#' + lom).remove();
        });
    }

    function dl_resendEmail() {
        var data = {
            email: $('#demo_input_email').val()
        };

        $.post('/siteregister/index/sendemail', data, function (ret) {
            if (ret['error'] != '') {
                alert(ret['error']);
                return false;
            }
            $('#email_code_id').val(ret['code_id']);
            alert('На ваш E-mail отправлен код подтверждения');
        }, 'json');
    }

</script>
