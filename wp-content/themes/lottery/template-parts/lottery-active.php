<?php
/**
 * The template part for displaying content
 *
 * @package lottery
 * @subpackage lottery
 * @since lottery 1.0
 */
$is_user = isset($GLOBALS['user_data']['id']) && (int)$GLOBALS['user_data']['id'] > 0;
$post_id = get_the_ID();
$end_date = lottery_end_date();
$title = get_the_title();
$adv_ids = get_field('id_adv', $post_id);
$logo3 = get_field('logo3', $post_id);
$complete_cnt = lottery_get_complete_cnt($post_id, true);
if($is_user){
    $is_complete = lottery_is_complete(true);
    $is_complete_cls = ($is_complete ? ' active' : ' noactive');
} else {
    $is_complete = false;
    $is_complete_cls = '';
}

?>
<a class="post-c" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo $title; ?>">    
<div data-id="<?php echo $post_id; ?>" data-adv="<?php echo $adv_ids; ?>" style="display:block;" href="<?php echo esc_url( get_permalink() ); ?>" class="newPost c-lottery<?php echo $is_complete_cls; ?>">
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
                    <div class="fl lottery-complete-txt"><?php if($is_complete){ ?>Поздравляем! Вы участник розыгрыша!<?php } else { ?>Стань участником розыгрыша!<?php } ?></div>
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
</a>