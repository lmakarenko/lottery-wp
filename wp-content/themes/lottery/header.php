<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
<meta property="og:image" content="<?php echo $GLOBALS['wasd_domain']; ?>/site/skins/wasd2_main/public/images/wasd_logo.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Зарабатывайте деньги online, выполняя несложные задания" />
<meta name="keywords" content="Online,заработок,работа,сети,игры" />	
<meta name="verification" content="faddbab08fcc393180f820b60ab6efb2" />
<title>WASD</title>

<link type="text/css" rel="stylesheet" href="/cms/public/css/main.css" />
<?php /*
<link type="text/css" rel="stylesheet" href="/cms/public/bootstrap/css/datepicker.css" />
<link type="text/css" rel="stylesheet" href="/cms/public/css/jquery/smoothness/jquery-ui.custom.min.css" />
<link type="text/css" rel="stylesheet" href="/site/plugins/coins/public/css/controller/docs/charity/cabinet.css" />
 */?>
<link type="text/css" rel="stylesheet" href="/cms/public/bootstrap/css/bootstrap.min.css" />

<link type="text/css" rel="stylesheet" href="/site/skins/wasd2_sub/public/css/lottery.css" />
<link type="text/css" rel="stylesheet" href="/wp-content/themes/lottery/css/lottery.css" />

<script type="text/javascript">var asdfqwer = '<?php echo $GLOBALS['ajax_nonce']; ?>', wasd_domain = '<?php echo $GLOBALS['wasd_domain']; ?>', wasd_domain_ = '<?php echo $GLOBALS['wasd_domain_']; ?>', PHPSESSID = '<?php echo $_COOKIE['PHPSESSID']; ?>';</script>

<script type="text/javascript" src="/cms/public/js/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/cms/public/js/main.js"></script>
<?php /*
<script type="text/javascript" src="/cms/public/js/ajaxDialog.js"></script>
<script type="text/javascript" src="/cms/public/js/jquery/jquery.cookie.js"></script>
<script type="text/javascript" src="/cms/public/js/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="/cms/public/js/jquery/jquery.ui.datepicker-ru.js"></script>
<script type="text/javascript" src="/cms/public/js/jquery/ckeditor_in_jq_dialog_patch.js"></script>
<script type="text/javascript" src="/cms/public/js/bsDialog.js"></script>
<script type="text/javascript" src="/cms/public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/cms/public/bootstrap/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/lottery-history.js"></script>
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/lottery-user.js"></script>
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/lottery-public.js"></script>
*/ ?>
<link rel="stylesheet" type="text/css" href="/site/skins/wasd2_sub/public/css/all.css" />
<?php /*
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/clear-form-fields.js"></script>
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/form.js"></script>
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/select.js"></script>
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/jquery.main.js"></script>
<script type="application/javascript" src="/wp-content/themes/lottery/js/lottery-common.js"></script>
*/ ?>
<?php if(isset($GLOBALS['user_data']['id'])){ ?>
<?php /*<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/soctask_script.js"></script>*/ ?>
<script type="application/javascript">var isGuest = false;</script>
<?php } else { ?>
<script type="application/javascript" src="/wp-content/themes/lottery/js/lottery-guest.js"></script>
<?php /*
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/guest.js"></script>
<script type="text/javascript" src="/site/plugins/siteuser/public/js/main.js"></script>
*/ ?>
<?php } ?>

<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/share.js"></script>
<!--[if lt IE 9]><script type="text/javascript" src="/site/skins/wasd2_sub/public/js/pie.js"></script><![endif]-->
<?php
/*
<script src="//www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load("swfobject", "2.1");
</script>
<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
*/ ?>
<style>
    body {
        background: #000 url("/site/skins/wasd2_sub/public/images/panzar-bg.jpg") no-repeat scroll center top;
    }
</style>

</head>
<body>
    <div id="exit-form-back" style="opacity: 0.7; background-color: rgb(0, 0, 0); display:none"></div>
    <?php if(!isset($GLOBALS['user_data']['id'])){ ?>
    <div id="demo_login" style="display: none"></div>
    <?php } ?>
        <div id="default_alert_popup">
        <div class="default_alert_background" onclick="$('#default_alert_popup').toggle();"></div>
        <div class="default_alert_border ditch-border">
            <div class="default_alert_inner">
                <div class="default_alert_msg"></div>
                <div class="default_alert_close_btn ditch-border" onclick="$('#default_alert_popup').toggle();"><div>Закрыть</div></div>
            </div>
        </div>
    </div>
        <div id="exit-form" class="withdrawal-popup withdrawal-data ditch-border popup-alert" style="display:none"></div>
        <div class="modal-overlay">
                <div id="exit-form-howto" class="withdrawal-popup withdrawal-data withdrawal-howto" style="display:none"></div>
        </div>
        <img id="exit-form-confirmation" class="withdrawal-popup .confirmation" style="display:none"/>
        <div id="wrapper">
            <div class="w1">
            <div class="ad" style="height: 120px;">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Wasd TOP -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:900px;height:120px"
                     data-ad-client="ca-pub-4161231456128054"
                     data-ad-slot="7115443322"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
                        <div id="header">
                                <div class="nav-holder">

                                <ul id="nav">
                                    <li>
                                        <a href="<?php echo $GLOBALS['wasd_domain']; ?>/<?php if(isset($GLOBALS['user_data']['id'])) { ?>jobs<?php } else { ?>demo<?php } ?>">
                                            <div class="ditch-border">
                                                <div class="inner-convex-background sab-nav-option">
                                                    Задания
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $GLOBALS['wasd_domain']; ?>/withdraw">
                                            <div class="ditch-border">
                                                <div class="inner-convex-background sab-nav-option">
                                                    Вывод
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li onclick="location.href='<?php echo $GLOBALS['wasd_domain']; ?>/discounts'" style="cursor:pointer;">
                                        <div class="ditch-border">
                                            <div class="inner-convex-background sab-nav-option">
                                                <?php if(0 < (int)$GLOBALS['user_data']['unViewedDealCount']){ ?>
                                                <span class="clr-chngn">Акции</span>
                                                <span class="number blue"><?php echo $GLOBALS['user_data']['unViewedDealCount']; ?></span>
                                                <?php } else { ?>
                                                <span>Акции</span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header-hovered">
                                        <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/">
                                            <div class="ditch-border">
                                                <div class="inner-convex-background sab-nav-option">
                                                    Розыгрыши
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $GLOBALS['wasd_domain']; ?>/guides">
                                            <div class="ditch-border">
                                                <div class="inner-convex-background sab-nav-option">
                                                    Видео
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="ditch-border" style="cursor:pointer;">
                                            <div class="inner-convex-background sab-nav-option">
                                            <?php if(0 < (int)$GLOBALS['user_data']['unViewedNewsCount']
                                                    || 0 < (int)$GLOBALS['user_data']['unViewedBlogCount']){ ?>
                                                <span class="clr-chngn">Еще</span>
                                                <span class="number"> 
                                                <?php echo (int)$GLOBALS['user_data']['unViewedNewsCount'] + (int)$GLOBALS['user_data']['unViewedBlogCount']; ?>
                                                </span>
                                            <?php } else { ?>
                                                <span>Еще</span>
                                                <span class="number"></span>
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <ul class="drop">
                                            <div class="ditch-border">
                                            <div class="inner-ditch-background">
                                            <li>
                                                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/games">
                                                    <span>Игры</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/api/oauth/index?c_id=2&redirect=http://forum.wasdclub.com/ucp.php">
                                                    <span>Форум</span>
                                                </a>
                                            </li>
                                            <li onclick="location.href='<?php echo $GLOBALS['wasd_domain']; ?>/siteuser/news/list'" style="cursor:pointer;">
                                                <?php if(0 < (int)$GLOBALS['user_data']['unViewedNewsCount']){ ?>
                                                <span class="clr-chngn">Новости</span>
                                                <span class="number blue"><?php echo $GLOBALS['user_data']['unViewedNewsCount']; ?></span>
                                                <?php } else { ?>
                                                <span>Новости</span>
                                                <?php } ?>
                                            </li>
                                            <li onclick="location.href='<?php echo $GLOBALS['wasd_domain']; ?>/articles'" style="cursor:pointer;">
                                                <?php if(0 < (int)$GLOBALS['user_data']['unViewedBlogCount']){ ?>
                                                <span class="clr-chngn">Блог</span>
                                                <span class="number blue"><?php echo $GLOBALS['user_data']['unViewedBlogCount']; ?></span>
                                                <?php } else { ?>
                                                <span>Блог</span>
                                                <?php } ?>
                                            </li>
                                            <li>
                                                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/streams">
                                                    <span>Стримы</span>
                                                </a>
                                            </li>
                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                    <?php if(isset($GLOBALS['user_data']['id'])){ ?>
                                        <a href="#" onclick="return false;">
                                            <div class="ditch-border">
                                                <div class="inner-convex-background sab-nav-option">
                                                    Личный кабинет
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="drop">
                                            <div class="ditch-border">
                                            <div class="inner-ditch-background">
                                            <li>
                                                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/siteuser/index/userinfo">
                                                    Анкета
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/coins/docs/stat">
                                                    Статистика
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/premium">
                                                    VIP
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/pay">
                                                    Пополнить счёт
                                                </a>
                                            </li>
                                            <li onclick="location.href='<?php echo $GLOBALS['wasd_domain']; ?>/support'" style="cursor:pointer;">
                                                <span>Саппорт</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="16px" style="enable-background:new 0 0 16 16;" class="mail_svg_icon"version="1.1" viewBox="0 0 16 16" width="16px" xml:space="preserve"><path d="M8,10c-0.266,0-0.5-0.094-1-0.336L0,6v7c0,0.55,0.45,1,1,1h14c0.55,0,1-0.45,1-1V6L9,9.664C8.5,9.906,8.266,10,8,10z M15,2  H1C0.45,2,0,2.45,0,3v0.758l8,4.205l8-4.205V3C16,2.45,15.55,2,15,2z" fill="#FFFFFF"/></svg>
                                                                                                                                                                                     <li>
                                                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/siteuser/index/logout">
                                                    Выход
                                                </a>
                                            </li>
                                            </div>
                                            </div>
                                        </ul>
                                    <?php } else { ?>
                                        <a class="demo-login" href="#">
                                            <div class="ditch-border">
                                                <div class="inner-convex-background sab-nav-option">
                                                    Вход
                                                </div>
                                                <?php /*
                                                <script>
                                                    $(function(){   
                                                        $.getJSON(
                                                            '/wp-admin/admin-ajax.php',
                                                            {
                                                                action: 'login_form',
                                                                'ajax_nonce': asdfqwer
                                                            },
                                                            function(d){
                                                                //console.log(d);
                                                                if(d.html){
                                                                    $('#demo_login').html(d.html);
                                                                }
                                                            }
                                                        );  
                                                    });
                                                </script>
                                                */ ?>
                                            </div>
                                        </a>
                                    <?php } ?>
                                    </li>
                                </ul>

                            </div>
                            
<?php if($GLOBALS['user_data'] && isset($GLOBALS['user_data']['id'])){ ?>
                            
<div class="header-holder <?php if($GLOBALS['user_data']['premium']){ ?>vip-header-holder<?php } ?>">
     
        <form action="#" class="referal-link <?php if($GLOBALS['user_data']['premium']){ ?>premium<?php } ?>">
                <fieldset>
                        <div class="row">
                            <div class="ditch-border" id="share_icon_field">
                                <div class="inner-ditch-background">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20px" id="share_icon" style="enable-background:new 0 0 80 90;" version="1.1" viewBox="0 0 80 90" width="20px" xml:space="preserve"><g><path d="M65,60c-3.436,0-6.592,1.168-9.121,3.112L29.783,47.455C29.914,46.654,30,45.837,30,45c0-0.839-0.086-1.654-0.217-2.456   l26.096-15.657C58.408,28.833,61.564,30,65,30c8.283,0,15-6.717,15-15S73.283,0,65,0S50,6.717,50,15   c0,0.837,0.086,1.654,0.219,2.455L24.123,33.112C21.594,31.168,18.438,30,15,30C6.717,30,0,36.717,0,45s6.717,15,15,15   c3.438,0,6.594-1.167,9.123-3.113l26.096,15.657C50.086,73.346,50,74.161,50,75c0,8.283,6.717,15,15,15s15-6.717,15-15   S73.283,60,65,60z" fill="#FFFFFF"/></g></svg>
                                    <div id="share_field" class="ditch-border">
                                        <div class="inner-ditch-background">
                                            <label>Пригласи друзей - получи доп. ричики:</label>
                                            <div class="share_icons_top" style="float: left;margin: 5px 0;">
                                                <div class="soc_one">
                                                    <a onclick="Share.vkontakte('http://<?php echo $_SERVER['SERVER_NAME']; if($GLOBALS['user_data']['custom_ref']){ ?>/id/<?php echo $GLOBALS['user_data']['custom_ref']; } else { ?>/x/<?php echo $GLOBALS['user_data']['id']; } ?>','Сайт WasdClub.com','http://www.wasdclub.com/site/skins/wasd2_main/public/images/wasd_logo.png','Валюта для твоих любимых игр! Бесплатно! Быстро! Здесь!')">
                                                        <img src="/site/plugins/blog/public/images/VK.png"/>
                                                    </a>
                                                </div>
                                                <div class="soc_one">
                                                    <a onclick="Share.facebook('http://<?php echo $_SERVER['SERVER_NAME']; if($GLOBALS['user_data']['custom_ref']){ ?>/id/<?php echo $GLOBALS['user_data']['custom_ref']; } else { ?>/x/<?php echo $GLOBALS['user_data']['id']; } ?>','Сайт WasdClub.com','http://www.wasdclub.com/site/skins/wasd2_main/public/images/wasd_logo.png','Валюта для твоих любимых игр! Бесплатно! Быстро! Здесь!')">
                                                        <img src="/site/plugins/blog/public/images/FB.png"/>
                                                    </a>
                                                </div>
                                                <div class="soc_one">
                                                    <a onclick="Share.odnoklassniki('http://<?php echo $_SERVER['SERVER_NAME']; if($GLOBALS['user_data']['custom_ref']){ ?>/id/<?php echo $GLOBALS['user_data']['custom_ref']; } else { ?>/x/<?php echo $GLOBALS['user_data']['id']; } ?>','Сайт WasdClub.com','http://www.wasdclub.com/site/skins/wasd2_main/public/images/wasd_logo.png','Валюта для твоих любимых игр! Бесплатно! Быстро! Здесь!')">
                                                        <img src="/site/plugins/blog/public/images/Odnoklasniki.png"/>
                                                    </a>
                                                </div>
                                                <div class="soc_one">
                                                    <a onclick="Share.twitter('http://<?php echo $_SERVER['SERVER_NAME']; if($GLOBALS['user_data']['custom_ref']){ ?>/id/<?php echo $GLOBALS['user_data']['custom_ref']; } else { ?>/x/<?php echo $GLOBALS['user_data']['id']; } ?>','Сайт WasdClub.com','http://www.wasdclub.com/site/skins/wasd2_main/public/images/wasd_logo.png','Валюта для твоих любимых игр! Бесплатно! Быстро! Здесь!')">
                                                        <img src="/site/plugins/blog/public/images/Twitter.png"/>
                                                    </a>
                                                </div>
                                                <div class="soc_one">
                                                <a href="https://plus.google.com/share?url=http://<?php echo $_SERVER['SERVER_NAME']; if($GLOBALS['user_data']['custom_ref']){ ?>/id/<?php echo $GLOBALS['user_data']['custom_ref']; } else { ?>/x/<?php echo $GLOBALS['user_data']['id']; } ?>" onclick="javascript:window.open(this.href,  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                                    <img src="/site/plugins/blog/public/images/G+.png" alt="Share on Google+"/>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ditch-border">
                                <div class="inner-ditch-background">
                                    <input type="text" class="copy-text default" id="user_ref_input" value="http://<?php echo $_SERVER['SERVER_NAME']; ?><?php if($GLOBALS['user_data']['custom_ref']){ ?>/id/<?php echo $GLOBALS['user_data']['custom_ref']; } else { ?>/x/<?php echo $GLOBALS['user_data']['id']; } ?>" />
                                    <?php /*if($GLOBALS['user_data']['premium']){ ?>
                                        <a href="#" onclick="customizeRef();return false;">
                                            <svg class="customize_ref" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 48 48" height="48px" version="1.1" viewBox="0 0 48 48" width="48px" x="0px" xml:space="preserve" y="0px">
                                                <g id="Expanded">
                                                    <g>
                                                        <g><path d="M26,48h-4c-1.654,0-3-1.346-3-3v-3.724c-1.28-0.37-2.512-0.881-3.681-1.527l-2.634,2.635     c-1.134,1.134-3.109,1.132-4.243,0l-2.829-2.828c-0.567-0.566-0.879-1.32-0.879-2.121s0.312-1.555,0.879-2.121l2.635-2.636     c-0.645-1.166-1.156-2.398-1.525-3.679H3c-1.654,0-3-1.346-3-3v-4c0-0.802,0.312-1.555,0.878-2.121     c0.567-0.566,1.32-0.879,2.122-0.879h3.724c0.37-1.278,0.88-2.511,1.526-3.679l-2.634-2.635c-1.17-1.17-1.17-3.072,0-4.242     l2.828-2.829c1.133-1.132,3.109-1.134,4.243,0l2.635,2.635C16.49,7.604,17.722,7.093,19,6.724V3c0-1.654,1.346-3,3-3h4     c1.654,0,3,1.346,3,3v3.724c1.28,0.37,2.512,0.881,3.678,1.525l2.635-2.635c1.134-1.132,3.109-1.134,4.243,0l2.829,2.828     c0.567,0.566,0.879,1.32,0.879,2.121s-0.312,1.555-0.879,2.121l-2.634,2.635c0.646,1.168,1.157,2.4,1.526,3.68H45     c1.654,0,3,1.346,3,3v4c0,0.802-0.312,1.555-0.878,2.121s-1.32,0.879-2.122,0.879h-3.724c-0.37,1.28-0.881,2.513-1.526,3.68     l2.634,2.635c1.17,1.17,1.17,3.072,0,4.242l-2.828,2.829c-1.134,1.133-3.109,1.133-4.243,0L32.68,39.75     c-1.168,0.646-2.401,1.156-3.679,1.526V45C29,46.654,27.655,48,26,48z M15.157,37.498c0.179,0,0.36,0.048,0.521,0.146     c1.416,0.866,2.949,1.502,4.557,1.891C20.684,39.644,21,40.045,21,40.507V45c0,0.552,0.449,1,1,1h4c0.551,0,1-0.448,1-1v-4.493     c0-0.462,0.316-0.863,0.765-0.972c1.606-0.389,3.139-1.023,4.556-1.89c0.396-0.241,0.902-0.18,1.229,0.146l3.178,3.179     c0.375,0.374,1.039,0.376,1.415,0l2.828-2.829c0.39-0.39,0.39-1.024,0-1.414l-3.179-3.179c-0.327-0.326-0.387-0.835-0.146-1.229     c0.865-1.414,1.5-2.947,1.889-4.556c0.108-0.449,0.51-0.766,0.972-0.766H45c0.267,0,0.519-0.104,0.708-0.293     C45.896,26.518,46,26.267,46,25.999v-4c0-0.552-0.449-1-1-1h-4.493c-0.462,0-0.864-0.316-0.972-0.766     c-0.388-1.607-1.023-3.14-1.889-4.556c-0.241-0.394-0.181-0.901,0.146-1.229l3.179-3.179c0.186-0.187,0.293-0.444,0.293-0.707     s-0.107-0.521-0.293-0.707l-2.829-2.828c-0.378-0.377-1.037-0.377-1.415,0l-3.179,3.179c-0.326,0.328-0.833,0.389-1.229,0.146     c-1.413-0.864-2.945-1.5-4.554-1.889C27.317,8.356,27,7.955,27,7.493V3c0-0.552-0.449-1-1-1h-4c-0.551,0-1,0.448-1,1v4.493     c0,0.462-0.316,0.863-0.765,0.972c-1.606,0.388-3.139,1.023-4.556,1.889c-0.395,0.241-0.902,0.181-1.228-0.146l-3.179-3.179     c-0.378-0.377-1.037-0.377-1.415,0L7.03,9.857c-0.39,0.39-0.39,1.024,0,1.414l3.179,3.179c0.327,0.326,0.387,0.835,0.146,1.229     c-0.866,1.416-1.501,2.949-1.889,4.555c-0.108,0.449-0.51,0.766-0.972,0.766H3c-0.267,0-0.519,0.104-0.708,0.293     C2.104,21.48,2,21.731,2,21.999v4c0,0.552,0.449,1,1,1h4.493c0.462,0,0.864,0.316,0.972,0.766     c0.389,1.608,1.024,3.141,1.889,4.555c0.241,0.394,0.181,0.901-0.146,1.229l-3.179,3.18c-0.186,0.187-0.293,0.444-0.293,0.707     s0.107,0.521,0.293,0.707l2.829,2.828c0.377,0.377,1.037,0.377,1.415,0l3.178-3.179C14.643,37.598,14.898,37.498,15.157,37.498z" style="fill: white;"/>
                                                        </g>
                                                        <g><path d="M24,34c-5.514,0-10-4.486-10-10s4.486-10,10-10s10,4.486,10,10S29.515,34,24,34z M24,16c-4.411,0-8,3.589-8,8     s3.589,8,8,8s8-3.589,8-8S28.412,16,24,16z" style="fill: white;"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    <?php }*/ ?>
                                </div>
                            </div>
                        </div>
                </fieldset>
        </form>

<?php if(1){ ?>
<!---- new premium cuts ---->
<?php
    if(isset($GLOBALS['user_data']['nickname']) && !empty($GLOBALS['user_data']['nickname'])){
        $nickname = $GLOBALS['user_data']['nickname'];
    } else {
        $nickname = $GLOBALS['user_data']['email'];
    }
    $premium_till_date = smarty_date_format($GLOBALS['user_data']['premium_till_date'], '%d.%m.%Y %H:%M');
?>
<div id="user">
<div class="rangimg <?php if($GLOBALS['user_data']['premium']){ ?>vip<?php } ?> ditch-border">
    <?php if($GLOBALS['user_data']['level'] == 1){ ?>
        <div class="firstlvl inner-ditch-background rang_icon"></div>
    <?php } ?>
    <?php if($GLOBALS['user_data']['level'] == 2){ ?>
        <div class="secondlvl inner-ditch-background rang_icon"></div>
    <?php } ?>
    <?php if($GLOBALS['user_data']['level'] == 3){ ?>
        <div class="star inner-ditch-background rang_icon"></div>
    <?php } ?>
    <?php if($GLOBALS['user_data']['level'] == 4){ ?>
        <div class="king inner-ditch-background rang_icon"></div>
    <?php } ?>
    <?php if($GLOBALS['user_data']['level'] == 5){ ?>
        <div class="hat inner-ditch-background rang_icon"></div>
    <?php } ?>
    <?php if($GLOBALS['user_data']['level'] == 6){ ?>
        <div class="goldstone inner-ditch-background rang_icon"></div>
    <?php } ?>
    <div id="helpbox" class="ditch-border">
        <div class="helpbox-inner-background">
                <div class="rang_one <?php if($GLOBALS['user_data']['level'] == 1){ ?> reached<?php } ?>"><div class="rangimg"><div class="firstlvl rang_icon"></div></div><div class="desription">Странник:</br>  Мы рады вас приветствовать. Испробуйте все возможности WASD.</div></div>
                <div class="rang_one <?php if($GLOBALS['user_data']['level'] == 2){ ?> reached<?php } ?>"><div class="rangimg"><div class="secondlvl rang_icon"></div></div><div class="desription">Обитатель:</br>  Ваши усердия будут вознаграждены.</div></div>
                <div class="rang_one <?php if($GLOBALS['user_data']['level'] == 3){ ?> reached<?php } ?>"><div class="rangimg"><div class="star rang_icon"></div></div><div class="desription">Герой:</br>  Вы много трудились и получаете + 2.5% за каждое выполненное задание.</div></div>
                <div class="rang_one <?php if($GLOBALS['user_data']['level'] == 4){ ?> reached<?php } ?>"><div class="rangimg"><div class="king rang_icon"></div></div><div class="desription">Избранный:</br>  Теперь вы занимаете высокий статус в WASD, 300 ричиков и + 5%.</div></div>
                <div class="rang_one <?php if($GLOBALS['user_data']['level'] == 5){ ?> reached<?php } ?>"><div class="rangimg"><div class="hat rang_icon"></div></div><div class="desription">Мудрец:</br>  Вы достигли вершины! 1000 ричиков и +10%!</div></div>
        </div>
    </div>
</div>
<div id="progressbar" class="ditch-border">
    <div class="inner-ditch-background">
        <div id="percentage" style="width: <?php echo $GLOBALS['user_data']['level_percent']; ?>%">
            <div id="username" title="<?php echo $nickname; ?>">
                <?php if($GLOBALS['user_data']['level'] == 1){ ?>
                    <p>Странник:
                    <?php echo $nickname; ?></p>
                <?php } ?>
                <?php if($GLOBALS['user_data']['level'] == 2){ ?>
                    <p>Обитатель:
                    <?php echo $nickname; ?></p>
                <?php } ?>
                <?php if($GLOBALS['user_data']['level'] == 3){ ?>
                    <p>Герой:
                    <?php echo $nickname; ?></p>
                <?php } ?>
                <?php if($GLOBALS['user_data']['level'] == 4){ ?>
                    <p>Избранный:
                    <?php echo $nickname; ?></p>
                <?php } ?>
                <?php if($GLOBALS['user_data']['level'] == 5){ ?>
                    <p>Мудрец:
                    <?php echo $nickname; ?></p>
                <?php } ?>
                <?php if($GLOBALS['user_data']['level'] == 6){ ?>
                    <p>Хранитель тайн:
                    <?php echo $nickname; ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div id="popupmenu" class="ditch-border">
            <div id="lvlvip">
                <div id="ulvl"><p>Уровень:</p><p><?php echo $GLOBALS['user_data']['level']; ?></p></div>
                <?php if($GLOBALS['user_data']['premium']){ ?>
                <div id="vipleft"><p>VIP до:</p><p><?php echo $premium_till_date; ?></p></div>
                <?php } else { ?>
                <div id="vipleft" onclick="document.location.href='<?php echo $GLOBALS['wasd_domain']; ?>/premium'" style="cursor: pointer"><p>Стать V.I.P.!</p></div>
                <?php } ?>
            </div>
          <?php if(isset($GLOBALS['user_data']['task'][ $GLOBALS['user_data']['level'] ])){ ?>
            <ul id="achieves">
                <?php foreach($GLOBALS['user_data']['task'][ $GLOBALS['user_data']['level'] ] as $t){ ?>
                    <li>
                        <div class="checker">
                            <?php if($t['done']){ ?><div></div><?php } ?>
                        </div>
                        <div class="description">
                            <?php echo $t['text']; ?><?php if(isset($t['need']) && !$t['done']){ ?>; Осталось <?php echo $t['need']; ?><?php } ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
          <?php } ?>
    </div>
</div>
</div>
<!---- new premium cuts END ---->
<?php } else { ?>
<a href="<?php echo $GLOBALS['wasd_domain']; ?>/premium"><div title="<?php if($GLOBALS['user_data']['premium']){ ?>V.I.P до <?php echo $premium_till_date; } else { ?>Стать V.I.P.!<?php } ?>" class="tt premium_block <?php if($GLOBALS['user_data']['premium']){ ?>premium_active<?php } ?>" onclick="document.location.href='<?php echo $GLOBALS['wasd_domain']; ?>/premium'"></div></a>
<?php } ?>
        <ul class="score">
            <li id="wsd_balance" class="ditch-border">
                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/pay">
                    <div class="inner-ditch-background">
                        <span class="title">
                            W
                        </span>
                        <?php echo wcBalance(array('number' => $GLOBALS['user_data']['wsd_balance'], 'diz' => 2)); ?>
                    </div>
                </a>
                <div class='help_icon_text'>
                    <div class="help_icon_label">
                        ваздики
                    </div>
                </div>
            </li>
            <li id="balance" class="ditch-border">
                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/pay">
                    <div class="inner-ditch-background">
                        <span class="title">
                            R
                        </span>
                        <?php echo wcBalance(array('number' => $GLOBALS['user_data']['balance'], 'diz' => 2)); ?>
                    </div>
                </a>
                <div class='help_icon_text'>
                    <div class="help_icon_label">
                        ричики
                    </div>
                </div>
            </li>
        </ul>
</div>

<?php if($GLOBALS['user_data']['premium']){ ?>

<div id="customize_ref_dialog">
    <div class="customize_ref_dialog_background" onclick="$('#customize_ref_dialog').fadeOut(500);">
    </div>
    <div class="customize_ref_dialog_form ditch-border">
        <div>
            <span>
            Выбери название для своей реферальной ссылки!<br /><br />
            http://www.wasdclub.com/id/</span><input id="custom_ref_input" type="text" value="<?php echo $GLOBALS['user_data']['custom_ref']; ?>" class="cstmz_ref_input" onkeyup="filterRef();" />
            <br />
            <button class="btn btn-inverse" onclick="saveCustomRef();">сохранить</button>

            <a href="#" onclick="$('#customize_ref_dialog').fadeOut(500);"><div class="rd_close"></div></a>
        </div>
    </div>
</div>


<script>
    function customizeRef() {
        return true;
        $('#customize_ref_dialog').fadeIn(200);
    }
    
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // escape key maps to keycode `27`
           if ($('#customize_ref_dialog').css('display') == 'block')
           $('.customize_ref_dialog_background').click();
        }
    });
    
    
    function saveCustomRef() {
        return true;
	var data = {
	    ref: $('#custom_ref_input').val()
	};
	
	$.post('/siteuser/index/savecustomref',data,function(ret){
	    if (ret.error!='') {
		alert(ret.error);
	    }else {
		alert('Готово!');
		$('#customize_ref_dialog').fadeOut(500);
		$('#user_ref_input').val("http://www.wasdclub.com/id/"+$('#custom_ref_input').val());
	    }
	},'json');
    }
    
    
    function filterRef() {
	var val = $('#custom_ref_input').val();
	
	val = val.replace(/[^a-z0-9_-]/gi,'').toLowerCase();
	
	$('#custom_ref_input').val(val);
    }
</script>

<?php } ?>
                            
<?php } ?>
                            
</div>
