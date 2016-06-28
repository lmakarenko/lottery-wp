<div class="ad" style="height: 120px;">
    <?php /*
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Wasd Bottom -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:900px;height:120px"
         data-ad-client="ca-pub-4161231456128054"
         data-ad-slot="4022376128"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    */ ?>
</div>
<div id="footer">
        <ul class="footer-nav">
                <li><a href="/courses.html">КУРСЫ ВЫВОДА РИЧИКОВ</a></li>

                <li><a href="/charity.html">БЛАГОТВОРИТЕЛЬНОСТЬ</a></li>
                <li><a href="/advguest/index/index">РЕКЛАМОДАТЕЛЯМ</a></li>
                <li><a href="/developers.html">РАЗРАБОТЧИКАМ</a></li>
                <li><a href="/agreement.html">ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ</a></li>
                <li><a href="/policy.html">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a></li>
        </ul>
        <div class="support-block">
                <span class="title">Остались вопросы? Пиши в поддержку!</span>
                <a href="/support" class="button">ЗАДАТЬ ВОПРОС</a>
                <!--<a href="mailto:support@wasdclub.com">support@wasdclub.com</a>-->
        </div>
        <div class="column">
                <ul id="lang">
                    <li title='ru'>
                        <img id="arrow" src="/site/skins/wasd2_main/public/images/arrow.png" />
                        <ul id='langs'>
                            <li id="ru">
                                <img class='flag' src="/site/skins/wasd2_main/public/images/ru.png"/>
                                <a href="/translate/index/set/lng/ru">Русский</a>
                            </li>
                            <li id="en">
                                <img class='flag' src="/site/skins/wasd2_main/public/images/en.png"/>
                                <a href="/translate/index/set/lng/en">English</a>
                            </li>
                            <li id="ua">
                                <img class='flag' src="/site/skins/wasd2_main/public/images/ua.png"/>
                                <a href="/translate/index/set/lng/ua">Українська</a>
                            </li>
                        </ul>
                            <img class='flag' src="/site/skins/wasd2_main/public/images/ru.png"/>
                            <a href="/translate/index/set/lng/ru">Русский</a>
                    </li>
                </ul>
                    <script>
                    var lang = $('#lang>li').attr('title');
                    $('#' + lang).remove();
                    </script>
                <div class="social">
                        <span class="title">Мы в соцсетях:</span>
                        <ul>
                                <li><a href="http://vk.com/wasdclub"><img src="/site/skins/wasd2_sub/public/images/ico-vk.gif" width="28" height="28" alt="image description" /></a></li>
                                <li><a href="http://facebook.com/wasdclub"><img src="/site/skins/wasd2_sub/public/images/ico-facebook.gif" width="28" height="28" alt="image description" /></a></li>

                        </ul>
                </div>
                <span class="copy">&copy; 2010-2016 MediaReach LLC</span>
        </div>
        <div class="download-block">
        <a href="/apps.html">Скачать WasdAgent</a>
        </div>
        <div>Доступно для:
                <img src="/site/plugins/coins/public/images/pcandr.png"/>
        </div>
</div>
        </div>

</div>

<div class="iframe_job" id="iframe_job">
    <div class="ifr_job_close" onclick="closeIframeJob();"></div>
    <div id="ifr_job_content"></div>
</div>

<script>
    /*$(document).ready(function(){
    	updateBalance();
    	$('.tt').tooltip();
    });*/
    
    
    /*function openHelp(){
        $("#helpbox").fadeToggle("fast");
    };
    function closeHelp(){
        $("#helpbox").fadeToggle("fast");
    };*/
</script>

<a id="to_top" href='#'>
<div class="to_top_arrows"></div>
<div class="to_top_arrows"></div>
</a>

<input type="hidden" id="id-posts" name="id_posts" value="<?php echo lottery_get_posts_ids_s(); ?>" />

<script type="text/javascript">
$(function(){
    
    var taskTimeoutId, tasks_statuses, posts_statuses = {}, posts_id, post_status_q = [];
    
    (function init(){
        posts_id = $('#id-posts').val().split(',');
        for(var i=0;i<posts_id.length;++i){
            post_status_q.push(posts_id[i]);
        }
        status_updater();
    })();
    
    function status_updater(){
        
        if (taskTimeoutId) {
            clearTimeout(taskTimeoutId);
	}
        
        $.ajax({
            type:'post',
            url:'/wp-admin/admin-ajax.php',
            data: {
                action: 'get_tasks_status',
                id_adv: '<?php echo lottery_get_adv_ids_s(); ?>',
            },
            dataType: 'json',
            success: function(d){
                if(d.statuses){
                  tasks_statuses = d.statuses;
                  check_statuses();
                  update_statuses();
                  console.log(posts_statuses);
                  console.log(post_status_q);
                  if(0 < post_status_q.length){
                    taskTimeoutId = setTimeout(status_updater, 6000);
                  }
                }
            }
        });
    }
    
    function set_status_active(post_id){
        var e = $('.newPost[data-id="' + post_id + '"]').first();
        e.removeClass('noactive').addClass('active');
        var i = $.inArray(post_id, post_status_q);
        if(-1 < i){
            post_status_q.splice(i,1);
        }
    }
    
    function set_status_noactive(post_id){
        var e = $('.newPost[data-id="' + post_id + '"]').first();
        e.removeClass('active').addClass('noactive');
        if(-1 == $.inArray(post_id, post_status_q)){
            post_status_q.push(post_id);
        }
    }
    
    function update_statuses(){
        for(var i=0;i<posts_id.length;++i){
            var post_id = posts_id[i];
            if(typeof posts_statuses[post_id] !== 'undefined'
                    && posts_statuses[post_id]){
                set_status_active(post_id);
            } else {
                set_status_noactive(post_id);
            }
        }
    }
    
    function check_statuses(){
        for(var k=0;k<posts_id.length;++k){
            var post_id = posts_id[k],
                id_adv_a = $('.newPost[data-id="' + post_id + '"]').attr('data-adv').split(','),
                i, task_id, task_type;
            for(i=0;i<id_adv_a.length;++i){
                if(typeof tasks_statuses['soc'] !== 'undefined'
                        && tasks_statuses['soc'][ id_adv_a[i] ]){                   
                    task_type = 'soc';
                } else if(typeof tasks_statuses['cpa'] !== 'undefined'
                        && tasks_statuses['cpa'][ id_adv_a[i] ]){
                    task_type = 'cpa';
                } else {
                    posts_statuses[post_id] = false;
                    continue;
                }
                for(task_id in tasks_statuses[task_type][ id_adv_a[i] ]){
                    if('paid' == tasks_statuses[task_type][ id_adv_a[i] ][task_id]['task_status'] ||
                        'finish' == tasks_statuses[task_type][ id_adv_a[i] ][task_id]['task_status']){
                        posts_statuses[post_id] = true;
                    } else {
                        posts_statuses[post_id] = false;
                    }
                }
            }
        }
    }
    
});
</script>

</body>
</html>

