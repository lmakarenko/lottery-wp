<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div id="newPost" class="c-lottery">
<div class="lottery-top-text-c">
    <div class="inner clear">
        <img src="<?php the_field('logo3'); ?>" class="lottery-bg" />
        <div class="lottery-bg-trans" id="lottery-top-text">
            <?php the_content(); ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>