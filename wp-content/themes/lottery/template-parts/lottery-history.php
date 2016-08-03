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
<?php foreach($old as $c) {
    $date_end = new DateTime(get_field('date_end', $c->ID));
    //$date_end = DateTime::createFromFormat('m-d-Y H:i:s', get_field('date_end', $c->ID));
    $date_end = $date_end->format('d.m.Y');
?>
    <div class="lottery-history-bg lottery-history-item">
        <div class="lottery-history-c">
            <img class="lottery-history-img" src="<?php the_field('logo1', $c->ID); ?>" />
            <div class="lottery-history-c1">
                <div class="lottery-history-c11">спонсор</div>
                <div class="lottery-history-c12"><?php echo $c->post_title; ?></div>
            </div>
            <div class="lottery-history-c2">
                <div class="lottery-history-c11">дата окончания</div>
                <div class="lottery-history-c12"><?php echo $date_end; ?></div>
            </div>
            <div class="lottery-history-c2">
                <div class="lottery-history-c11">участников</div>
                <div class="lottery-history-c12"><?php echo $c->lottery_complete_cnt; ?></div>
            </div>
            <div class="clear"></div>
            <div class="lottery-history-btn" data-id="<?php echo $c->ID; ?>">
                <span>подробнее</span>
            </div>
        </div>
    </div>
    <div class="exit-form-back" data-id="<?php echo $c->ID; ?>">
        <div class="lottery-history-alert" data-id="<?php echo $c->ID; ?>">
            <img class="lottery-bg" src="<?php the_field('logo3', $c->ID); ?>" />
            <div class="lottery-history-alert-inner-1 fl">
                <div style="background:url('<?php the_field('logo4', $c->ID); ?>') 0 0 no-repeat scroll;">
                    <div>
                    <?php the_field('descr-ending', $c->ID); ?>
                    </div>
                </div>
            </div>
            <div data-id="<?php echo $c->ID; ?>" class="lottery-history-alert-inner-2 fl"><?php echo trim(get_field('yt-iframe-history', $c->ID)); ?></div>
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

