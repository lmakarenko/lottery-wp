<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage lottery
 * @since lottery 1.0
 */
get_header(); ?>

<?php

$posts = lottery_get_posts( get_the_ID() );

if(0 < count($posts)){
    setup_postdata($GLOBALS['post'] =& $posts[0]);
?>
<div id="main">
    <div id="lottery-outer-c">
        <div id="newPost" class="c-lottery">
            <div class="title-h">розыгрыш</div>
            <a class="post-c">
            <?php 
                include(locate_template( 'template-parts/content-single.php' ));
            ?>
            </a>    
            <div class="lottery-text">
                <h2>Для участия необходимо выполнить следующие задания:</h2>
                <!--Контент-->
                <ul id="lottery-task-list" class="news-list events-list">
                <?php

                    lottery_print_tasks();

                } ?>
                </ul>
            </div>
        </div>
        <?php lottery_print_history(); ?>
    </div>
    <div class="clear"></div>
</div>
<input type="hidden" id="id-adv" name="id_adv" value="<?php echo lottery_get_adv_ids_s(); ?>" />
<script type="text/javascript" src="/wp-content/themes/lottery/js/lottery-single.js"></script>
<script type="text/javascript" src="/wp-content/themes/lottery/js/lottery-history.js"></script>
<?php get_footer(); ?>
<!--
<?php
txt_a($user_data);
txt_a(lottery_get_posts());
txt_a(lottery_get_tasks_data());
txt_a(lottery_get_tasks_status());
txt_a(lottery_get_history_data());
?>
-->
