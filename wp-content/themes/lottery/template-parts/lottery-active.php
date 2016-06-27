<?php
/**
 * The template part for displaying content
 *
 * @package lottery
 * @subpackage lottery
 * @since lottery 1.0
 */

$is_complete = lottery_is_complete(true);
$is_complete_cls = $is_complete ? 'active' : 'noactive';
$complete_cnt = lottery_get_complete_cnt(get_the_ID(), true);
$end_date = lottery_end_date();
$title = get_the_title();

?>
<a class="post-c" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo $title; ?>">
<div style="display:block;" href="<?php echo esc_url( get_permalink() ); ?>" class="newPost c-lottery<?php echo ' ',$is_complete_cls; ?>">
<div class="lottery-top-text-c">
    <div class="inner clear">
        <div class="lottery-corener lottery-corener-<?php echo $is_complete_cls; ?>"></div>
        <img src="<?php the_field('logo3'); ?>" class="lottery-bg" />
        <div class="lottery-top-text">
            <h2 class="post-title"><?php echo $title; ?></h2>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="lottery-bg-trans lottery-complete-cnt-c">
            <div>Участников:&nbsp;&nbsp;<span id="lottery-complete-cnt"><?php echo $complete_cnt; ?></span>, <?php echo $end_date; ?></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</a>