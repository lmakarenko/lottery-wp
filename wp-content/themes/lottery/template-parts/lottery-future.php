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
$start_date = lottery_start_date();
$title = get_the_title();
$adv_ids = get_field('id_adv', $post_id);
$logo3 = get_field('logo3', $post_id);
?>
<div data-id="<?php echo $post_id; ?>" data-adv="<?php echo $adv_ids; ?>" style="display:block;" class="newPost c-lottery c-lottery-single c-lottery-noactive">
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
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>