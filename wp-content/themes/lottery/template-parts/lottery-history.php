<?php if (count($old) > 0) { ?>
<input type="hidden" id="lottery-history-cnt" value="<?php echo count($old); ?>" />
<div class="c-lottery">
<div id="lottery-history" class="endevent">
<!--<div class="ev-header"> Завершенные розыгрышы </div>-->
<h2>Завершенные розыгрыши:</h2>
<div id="lottery-history-panel-top" class="lottery-history-panel-top">
    <div id="lottery-history-dots-c" class="lottery-history-dots-c"></div>
</div>
<div class="clear"></div>
<div class="lottery-history-row-l-c" id="lottery-history-row-l">
    <div class="lottery-history-row-l fl"></div>
</div>
<div class="lottery-history-row-r-c" id="lottery-history-row-r">
    <div class="lottery-history-row-r fr"></div>
</div>
<div id="lottery-old-c">
<div id="lottery-old">
<?php foreach($old as $c) { ?>
    <div class="lottery-history-bg lottery-history-item">
        <div class="lottery-history-c">
            <img class="lottery-history-img" src="/public/lottery/<?php echo $c->ID; ?>/logo1.jpg" />
            <div class="lottery-history-c1">
                <div class="lottery-history-c11">спонсор</div>
                <div class="lottery-history-c12"><?php echo $c->post_title; ?></div>
            </div>
            <div class="lottery-history-c2">
                <div class="lottery-history-c11">дата окончания</div>
                <div class="lottery-history-c12"><?php the_field('date-end'); ?></div>
            </div>
            <div class="lottery-history-c2">
                <div class="lottery-history-c11">участников</div>
                <div class="lottery-history-c12">0</div>
            </div>
            <div class="clear"></div>
            <div class="lottery-history-btn" data-id="<?php echo $c->ID; ?>">
                <span>подробнее</span>
            </div>
        </div>
    </div>
    <div class="exit-form-back" data-id="<?php echo $c->ID; ?>">
        <div class="lottery-history-alert" data-id="<?php echo $c->ID; ?>">
            <img class="lottery-bg" src="/public/lottery/<?php echo $c->ID; ?>/logo3.jpg" />
            <div class="lottery-history-alert-inner-1 fl">
                <div style="background:url('/public/lottery/<?php echo $c->ID; ?>/logo4.jpg') 0 0 no-repeat scroll;">
                    <div>
                    <?php the_field('descr-ending'); ?>
                    </div>
                </div>
            </div>
            <div class="lottery-history-alert-inner-2 fl">
                <?php the_field('yt-iframe-history'); ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php } ?>
<div class="clear"></div>
</div>
</div>
</div>
</div>
<?php } ?>

