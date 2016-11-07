<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage lottery
 * @since lottery 1.0
 */
get_header(); ?>
<div id="main">
    <div id="lottery-outer-c">
<?php

$posts = lottery_get_posts( get_the_ID() );

if(0 < count($posts)){
    setup_postdata($GLOBALS['post'] =& $posts[0]);
?>
        <div id="newPost" class="c-lottery">
            <div class="title-h">розыгрыш</div>
            <div class="post-c">
            <?php 
                include(locate_template( 'template-parts/content-single.php' ));
            ?>
            </div>    
            <div class="lottery-text">
                <h2>Для участия необходимо выполнить следующие задания:</h2>
                <!--Контент-->
                <ul id="lottery-task-list" class="news-list events-list">
                <?php lottery_print_tasks(); ?>
                </ul>
            </div>
            <div class="lottery-text lot-descr nonborder" id="lottery-descr-c">
                    <h2>Спонсор розыгрыша: </h2>
                    <p><?php the_field('descr'); ?></p>
            </div>
            <div class="lottery-text lot-descr nonborder" id="lottery-sponsor-c"><?php the_field('yt-iframe-sponsor'); ?></div>
            <div class="clear"></div>
        </div>
<?php } ?>
<?php lottery_print_history(); ?>
    </div>
    <div class="clear"></div>
</div>
<input type="hidden" id="id-posts" name="id_posts" value="<?php echo lottery_get_posts_ids_s(); ?>" />
<input type="hidden" id="id-adv" name="id_adv" value="<?php echo lottery_get_adv_ids_s(); ?>" />
<script type="text/javascript" src="/wp-content/themes/lottery/js/lottery-single.js"></script>

<style type="text/css">
.lottery-history-alert1{
    width: 600px;
    text-align: justify;
}
.lottery-history-alert1-inner{
    position: relative;
    border-bottom: 1px solid #fff;
    padding: 20px;
    font-size: 16px;
    font-weight:bold;
    line-height: 24px;
    background: rgba(255,255,255, 1.0);
}
</style>
<script type="text/javascript">
$(function(){
   
   function calcScrollTop_(){
        var st = $(document).scrollTop(), wh = $(window).height(), eh = 115, mt = st;
        if(wh > eh){
            mt = st + Math.ceil((wh - eh) / 2);  
        } else if(eh > wh){
            mt = st + Math.ceil((eh - wh) / 2);
        }
        return mt;
    }
   
   $('.lottery-task-btn-alert').on('click', function(){
        anim_complete = false;
        var $this = $(this),
            e_c = $('.exit-form-back1').first(),
            e_ = $('.lottery-history-alert1').first();
        e_c.on('click', function(e){
            $('.lottery-history-alert1').first().fadeOut(0, 'swing', function(){
                $('.exit-form-back1').first().hide();
                anim_complete = true;
            }).off('scroll');
        });

        e_c.css({'height': $(document).height() + 'px'});
        e_.css({'margin-top': calcScrollTop_() + 'px'}).on('click', function(e){
            e.stopPropagation();
        });
        e_c.show();
        $(window).on('scroll', {'el': e_}, function(e){
            e.data.el.css({'margin-top': calcScrollTop_() + 'px'});
        });

        e_.fadeIn(600, 'swing', function(){
            anim_complete = true;
        });
   });
});
</script>
<div class="exit-form-back exit-form-back1">
    <div class="lottery-history-alert lottery-history-alert1">
        <div class="lottery-history-alert1-inner">
            В данный момент авторизация через VK недоступна, ведутся тех. работы. Для восстановления доступа обратитесь, пожалуйста, в тех. поддержку <a href="www.wasdclub.com/support">www.wasdclub.com/support</a>, либо ожидайте восстановления авторизации.
        </div>
    </div>
</div>

<?php get_footer(); ?>
<?php
/*
txt_a($user_data);
txt_a(lottery_get_posts());
txt_a(lottery_get_tasks_data());
txt_a(lottery_get_tasks_status());
txt_a(lottery_get_history_data());
*/
?>
