<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage lottery
 * @since lottery 1.0
 */

$post_id = get_the_ID();
$adv_ids = get_field('id_adv', $post_id);
$is_complete = lottery_is_complete(true);
$is_complete_cls = $is_complete ? ' active' : ' noactive';
$complete_cnt = lottery_get_complete_cnt($post_id, true);
$end_date = lottery_end_date();
?>
<div data-id="<?php echo $post_id; ?>" data-adv="<?php echo $adv_ids; ?>" style="display:block;" href="<?php echo esc_url( get_permalink() ); ?>" class="newPost c-lottery c-lottery-single<?php echo $is_complete_cls; ?>">
<div class="lottery-top-text-c">
    <div class="inner clear">
        <div class="lottery-overlay" data-id="<?php echo $post_id; ?>"></div>
        <div class="lottery-corener"></div>
        <img src="<?php echo $logo3; ?>" class="lottery-bg" />
        <div class="lottery-top-text lottery-inner-content" data-id="<?php echo $post_id; ?>">
            <div class="lottery-top-content" data-id="<?php echo $post_id; ?>">
                <h2 class="post-title"><?php echo $title; ?></h2>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="lottery-complete-c" data-id="<?php echo $post_id; ?>">
                <div>
                    <div class="fl"><?php if($is_complete){ ?>Поздравляем! Вы участник розыгрыша!<?php } else { ?>Стань участником розыгрыша!<?php } ?></div>
                    <div class="lottery-complete">
                        <span class="lottery-complete-cnt pic"></span>
                        <span class="lottery-complete-cnt-n" data-id="<?php echo $post_id; ?>"><?php echo $complete_cnt; ?></span>
                    </div>
                    <div class="lottery-complete">
                        <span class="lottery-complete-date pic"></span>
                        <span class="lottery-complete-date-n"><?php echo $end_date; ?></span>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>