<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
<meta property="og:image" content="http://www.wasdclub.com/site/skins/wasd2_main/public/images/wasd_logo.png" />
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

<script type="text/javascript" src="/cms/public/js/jquery/jquery-1.10.2.min.js"></script>
<?php /*
<script type="text/javascript" src="/cms/public/js/ajaxDialog.js"></script>
<script type="text/javascript" src="/cms/public/js/jquery/jquery.cookie.js"></script>
<script type="text/javascript" src="/cms/public/js/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="/cms/public/js/jquery/jquery.ui.datepicker-ru.js"></script>
<script type="text/javascript" src="/cms/public/js/jquery/ckeditor_in_jq_dialog_patch.js"></script>
<script type="text/javascript" src="/cms/public/js/bsDialog.js"></script>
<script type="text/javascript" src="/cms/public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/cms/public/js/main.js"></script>
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
*/ ?>
<?php if(isset($GLOBALS['user_data']['id'])){ ?>
<?php /*<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/soctask_script.js"></script>*/ ?>
<script type="application/javascript">var isGuest = false;</script>
<?php } else { ?>
<script type="application/javascript">var isGuest = true;</script>
<?php /*
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/guest.js"></script>
<script type="text/javascript" src="/site/plugins/siteuser/public/js/main.js"></script>
*/ ?>
<?php } ?>

<?php /*
<script type="text/javascript" src="/site/skins/wasd2_sub/public/js/share.js"></script>
<!--[if lt IE 9]><script type="text/javascript" src="/site/skins/wasd2_sub/public/js/pie.js"></script><![endif]-->

<script src="//www.google.com/jsapi" type="text/javascript"></script>

<script type="text/javascript">
  google.load("swfobject", "2.1");
</script>
<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
*/ ?>

<style>
    body {
        background: #455A6F url("/site/skins/wasd2_sub/public/images/mail-ru-bg.jpeg") no-repeat scroll center top;
    }
</style>

</head>
<body>
    <div id="exit-form-back" style="display:none"></div>
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
                                                    Tasks
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $GLOBALS['wasd_domain']; ?>/withdraw">
                                            <div class="ditch-border">
                                                <div class="inner-convex-background sab-nav-option">
                                                    Withdraw
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li onclick="location.href='<?php echo $GLOBALS['wasd_domain']; ?>/discounts'" style="cursor:pointer;">
                                        <div class="ditch-border">
                                            <div class="inner-convex-background sab-nav-option">
                                                    <span>Deals</span>
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
                                                    Video
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="ditch-border" style="cursor:pointer;">
                                            <div class="inner-convex-background sab-nav-option">
                                                <span>Other</span>
                                                <span class="number"></span>
                                            </div>
                                        </div>
                                        <ul class="drop">
                                            <div class="ditch-border">
                                            <div class="inner-ditch-background">
                                            <li>
                                                <a href="<?php echo $GLOBALS['wasd_domain']; ?>/games">
                                                    <span>Games</span>
                                                </a>
                                            </li>
                                            <li>
                                                    <a href="<?php echo $GLOBALS['wasd_domain']; ?>/api/oauth/index?c_id=2&redirect=http://forum.wasdclub.com/ucp.php">
                                                        <span>Forum</span>
                                                    </a>
                                            </li>
                                            <li onclick="location.href='<?php echo $GLOBALS['wasd_domain']; ?>/siteuser/news/list'" style="cursor:pointer;">
                                                <span>News</span>
                                            </li>
                                            <li onclick="location.href='<?php echo $GLOBALS['wasd_domain']; ?>/articles'" style="cursor:pointer;">
                                                <span>Blog</span>
                                                <span class="number blue"></span>
                                            </li>
                                            <a href="<?php echo $GLOBALS['wasd_domain']; ?>/streams">
                                                <span>Streams</span>
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
                                        <a href="<?php echo $GLOBALS['wasd_domain']; ?>">
                                            <div class="ditch-border">
                                                <div class="inner-convex-background sab-nav-option">
                                                    Вход
                                                </div>
                                            </div>
                                        </a>
                                    <?php } ?>
                                    </li>
                                </ul>

                            </div>
</div>