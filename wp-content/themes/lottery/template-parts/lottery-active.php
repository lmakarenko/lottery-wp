<?php
/**
 * The template part for displaying content
 *
 * @package lottery
 * @subpackage lottery
 * @since lottery 1.0
 */
$post_id = get_the_ID();
$is_complete = lottery_is_complete(true);
$is_complete_cls = $is_complete ? 'active' : 'noactive';
$complete_cnt = lottery_get_complete_cnt($post_id, true);
$end_date = lottery_end_date();
$title = get_the_title();
$adv_ids = get_field('id_adv', $post_id);
$logo3 = get_field('logo3', $post_id)[0];

?>
<a class="post-c" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo $title; ?>">    
<div data-id="<?php echo $post_id; ?>" data-adv="<?php echo $adv_ids; ?>" style="display:block;" href="<?php echo esc_url( get_permalink() ); ?>" class="newPost c-lottery <?php echo $is_complete_cls; ?>">
<div class="lottery-top-text-c">
    <div class="inner clear">
        <div class="lottery-overlay"></div>
        <div class="lottery-corener"></div>
        <img src="<?php the_field('logo3'); ?>" class="lottery-bg" />
        <div class="lottery-top-text">
            <h2 class="post-title"><?php echo $title; ?></h2>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            <div class="lottery-complete-c">
                <div>
                    <div class="fl">Поздравляем! Вы участник конкурса!</div>
                    <div class="lottery-complete">
                        <span class="lottery-complete-cnt"></span>
                        <?php echo $complete_cnt; ?>
                    </div>
                    <div class="lottery-complete">
                        <span class="lottery-complete-date"></span>
                        <?php echo $end_date; ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
</a>