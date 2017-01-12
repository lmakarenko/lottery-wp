<script id="history-item-tpl" type="text/template">
    <div class="lottery-history-bg lottery-history-item">
        <div class="lottery-history-c">
            <img class="lottery-history-img" src="<%= logo1 %>" />
            <div class="lottery-history-c1">
                <div class="lottery-history-c11">спонсор</div>
                <div class="lottery-history-c12"><%= post_title %></div>
            </div>
            <div class="lottery-history-c2">
                <div class="lottery-history-c11">дата окончания</div>
                <div class="lottery-history-c12"><%= date_end %></div>
            </div>
            <div class="lottery-history-c2">
                <div class="lottery-history-c11">участников</div>
                <div class="lottery-history-c12"><%= lottery_complete_cnt %></div>
            </div>
            <div class="clear"></div>
            <div class="lottery-history-btn" data-id="<%= ID %>">
                <span>подробнее</span>
            </div>
        </div>
    </div>
    <div class="exit-form-back" data-id="<%= ID %>">
        <div class="lottery-history-alert" data-id="<%= ID %>">
            <img class="lottery-bg" src="<%= logo3 %>" />
            <div class="lottery-history-alert-inner-1 fl">
                <div style="background:url(<%= logo4 %>') 0 0 no-repeat scroll;">
                    <div><%= descr_ending %></div>
                </div>
            </div>
            <div data-id="<%= ID %>" class="lottery-history-alert-inner-2 fl"><%= yt_iframe_history %></div>
            <div class="clear"></div>
        </div>
    </div>
</script>
<input type="hidden" id="lottery-history-cnt" value="<?php echo $history_cnt; ?>" />
<div class="c-lottery">
<div id="lottery-history" class="endevent">
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
<div id="lottery-old"></div>
</div>
</div>
</div>