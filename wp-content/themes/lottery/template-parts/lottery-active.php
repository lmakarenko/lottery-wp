<?php
/**
 * The template part for displaying content
 *
 * @package lottery
 * @subpackage lottery
 * @since lottery 1.0
 */
?>
<a href="<?php echo esc_url( get_permalink() ); ?>">
<div style="display:block;" href="<?php echo esc_url( get_permalink() ); ?>" id="newPost" class="c-lottery<?php echo lottery_is_complete() ? ' active' : ' noactive'; ?>">
<div class="lottery-top-text-c">
    <div class="inner clear">
        <img src="<?php the_field('logo3'); ?>" class="lottery-bg" />
        <div class="lottery-bg-trans" id="lottery-complete-cnt-c" style="margin: 20px 455px 0 0">
            <div>Участников:&nbsp;&nbsp;<span id="lottery-complete-cnt"><?php echo lottery_get_complete_cnt(get_the_ID(), true); ?></span>, <?php echo lottery_end_date(); ?></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</a>