<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage lottery
 * @since lottery 1.0
 */

$is_complete = lottery_is_complete(true);
$is_complete_cls = $is_complete ? ' active' : ' noactive';
$complete_cnt = lottery_get_complete_cnt(get_the_ID(), true);
$end_date = lottery_end_date();
?>
<div class="newPost c-lottery">
    <div class="lottery-top-text-c">
        <div class="inner clear">
            <img src="<?php the_field('logo3'); ?>" class="lottery-bg" />
            <div id="lottery-top-text" class="lottery-bg-trans">
                <h4><?php the_title(); ?></h4>
                <?php the_content(); ?>
            </div>
            <div class="lottery-bg-trans" id="lottery-complete-cnt-c" style="margin: 20px 455px 0 0">
                <div>Участников:&nbsp;&nbsp;<span id="lottery-complete-cnt"><?php echo $complete_cnt; ?></span></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
