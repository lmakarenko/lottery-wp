<?php get_header(); ?>
<div id="main">
<div class="lottery-outer-c">
<div class="title-h">розыгрыш</div>
<?php

$posts = lottery_get_posts();

if ( 'ACTIVE' == lottery_get_status() && 0 < count($posts) ) : 

        foreach($posts as $post){

            setup_postdata( $GLOBALS['post'] =& $post );
            include(locate_template( 'template-parts/lottery-active.php' ));

        }

else :

    setup_postdata( $GLOBALS['post'] =& $posts[0] );
    include(locate_template( 'template-parts/lottery-ending.php' ));

    setup_postdata( $GLOBALS['post'] =& $posts[1] );
    include(locate_template( 'template-parts/lottery-future.php' ));

endif;

?>
</div>
</div>
<?php get_footer(); ?>
<?php
txt_a($GLOBALS['user_data']);
txt_a(lottery_get_posts());
//txt_a(lottery_get_tasks_data());
txt_a(lottery_get_tasks_status());
?>

