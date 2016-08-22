<?php get_header(); ?>
<div id="main">
<div id="lottery-outer-c" class="lottery-outer-c">
<div class="title-h">розыгрыши</div>
<?php

$posts = lottery_get_posts();

if ( 'ACTIVE' == lottery_get_status() && 0 < count($posts) ) : 

        foreach($posts as $post){

            setup_postdata( $GLOBALS['post'] =& $post );
            include(locate_template( 'template-parts/lottery-active.php' ));

        }
?>
<input type="hidden" id="id-posts" name="id_posts" value="<?php echo lottery_get_posts_ids_s(); ?>" />
<input type="hidden" id="id-adv" name="id_adv" value="<?php echo lottery_get_adv_ids_s(); ?>" />
<script type="text/javascript" src="/wp-content/themes/lottery/js/lottery-index.js"></script>
<script type="text/javascript" src="/wp-content/themes/lottery/js/lottery-complete.js"></script>
<?php
else :
    
    if(isset($posts['ending'])){
        setup_postdata( $GLOBALS['post'] =& $posts['ending'] );
        include(locate_template( 'template-parts/lottery-ending.php' ));
    }
    
    if(isset($posts['future'])){
        setup_postdata( $GLOBALS['post'] =& $posts['future'] );
        include(locate_template( 'template-parts/lottery-future.php' ));
    }
    
endif;

?>
<?php lottery_print_history(); ?>
</div>
</div>
<?php get_footer(); ?>
<!--
<?php
//txt_a($GLOBALS['user_data']);
/*
txt_a($GLOBALS['user_data']);
txt_a(lottery_get_posts());
//txt_a(lottery_get_tasks_data());
txt_a(lottery_get_tasks_status());
*/
?>
-->