<?php if (isset($t)){ ?>
<?php
    $is_user = isset($GLOBALS['user_data']['id']) && $GLOBALS['user_data']['id'];
?>
    <?php if ($t['task_type']=='social') { ?>
            <li class="task-c task-c-soc" data-task-id="<?php echo $t['id']; ?>" data-task-type="<?php echo $t['task_type']; ?>" data-adv-id="<?php echo $t['adv_camp']; ?>">
                        <div class="img-holder">
                                <img src="<?php echo $GLOBALS['wasd_domain']; ?>/public/images/soc_tasks/big_<?php echo $t['img']; ?>" alt="<?php echo $t['header']; ?>" />
                        </div>
                        <div class="description">
                                <h2><?php echo $t['header']; ?></h2>
                                <p><?php echo $t['text']; ?></p>
                        </div>
                                <div class="row">
                                            <div class="pre-ready lottery-task-btn lottery-task-btn-start" <?php if ($is_user){ ?>style="display:none;"<?php } ?>>
                                                    <a title="Участвовать" href="<?php if ($is_user){ ?><?php echo $GLOBALS['wasd_domain']; ?>/soctask/user/starttask/id/<?php echo $t['id']; ?><?php } else { echo $GLOBALS['wasd_domain']; } ?>" target="_blank" class="button">
                                                            <div class="ready pc">Участвовать</div>
                                                    </a>
                                                <!-- {$captcha|default:''} -->
                                            </div>
                                            <?php if ($is_user){ ?>
                                            <div class="pre-ready lottery-task-btn lottery-task-btn-loading">
                                                <a href="#" title="Загрузка" class="button button-loading">
                                                    <img src="/cms/public/images/loading.gif" />
                                                </a>
                                            </div>

                                            <div class="pre-ready lottery-task-btn lottery-task-btn-started" style="display:none;">
                                                    <a href="#" title="Выполняется" class="button progress">
                                                            <div class="ready time">
                                                                    <div class="time"></div>
                                                                    Выполняется
                                                            </div>
                                                    </a>
                                            </div>		
                                            <div class="pre-ready lottery-task-btn lottery-task-btn-finished" style="display:none;">
                                                    <a href="#" title="Выполнено" class="button button-complete">
                                                            <div class="ready checked">
                                                                    <div class="checked"></div>
                                                                    Выполнено
                                                            </div>
                                                    </a>
                                            </div>
                                            <?php } ?>
                                </div>
                </li>
    <?php } elseif ($t['task_type']=='cpa') { ?>
        <li class="task-c task-c-cpa" data-task-id="<?php echo $t['id']; ?>" data-task-type="<?php echo $t['task_type']; ?>" data-adv-id="<?php echo $t['adv_camp']; ?>" id="cpa_task_<?php echo $t['id']; ?>">
                        <div class="img-holder">
                                <img src="<?php echo $GLOBALS['wasd_domain']; ?>/public/jobs/big_<?php echo $t['img']; ?>" alt="<?php echo $t['header']; ?>">
                        <!--        
                        {if $t.pay_variant=='fix'}
                            {if $t.only_apple}
                            <div class="badge os">
                                <div>
                                    <img src="/site/skins/wasd2_sub/public/images/iOS.png">
                                    {if $t.platform_ios}iPhone {/if}{if $t.platform_ipod}iPod {/if}{if $t.platform_ipad}iPad{/if}
                                </div>
                            </div>
                            {elseif $t.only_android}
                            <div class="badge os">
                                <div>
                                    <img src="/site/skins/wasd2_sub/public/images/android.png">
                                    Android
                                </div>
                            </div>
                            {/if}
                            {if !$t.pay_refer}
                                <div class="badge os no_ref">
                                    <div>
                                        <img src="/site/skins/wasd2_sub/public/images/no_ref.png">
                                        Без реферальных выплат
                                    </div>
                                </div>
                            {/if}
                        {/if}
                        -->
                        </div>
                        <div class="description">
                                <h2><?php echo $t['header']; ?></h2>
                                <p><?php echo $t['text']; ?></p>
                        </div>
                                <div class="row">
                                    <div class="pre-ready lottery-task-btn lottery-task-btn-start"<?php if ($is_user){ ?>  style="display:none;"<?php } ?>>
                            <?php if ($t['jump_method']=='iframe'){ ?>
                                    <a title="Участвовать" href="#" target="_blank" onclick="<?php if ($is_user){ ?><?php if ($t['captcha']){ ?> showRecaptcha('publickey',startIframeTask,<?php echo $t['id']; ?>); <?php } else { ?> startIframeTask(<?php echo $t['id']; ?>);<?php } ?> return false;<?php } else { ?>showDemoLogin();return false;<?php } ?>" class="button">
                                        <div class="ready pc">Участвовать</div>
                                    </a>
                            <?php } elseif ($t['jump_method']=='youtube'){ ?>
                                    <a title="Участвовать" href="#" target="_blank" onclick="<?php if ($is_user){ ?><?php if ($t['captcha']){ ?> showRecaptcha('publickey',startYoutubeTask,<?php echo $t['id']; ?>); <?php } else { ?> startYoutubeTask(<?php echo $t['id']; ?>);<?php } ?> return false;<?php } else { ?>showDemoLogin();return false;<?php } ?>" class="button">
                                        <div class="ready pc">Участвовать</div>
                                    </a>
                            <?php } else { ?>
                                <?php if ($t['need_vk_auth']){ ?>
                                    <a href="#" title="Участвовать" onclick="<?php if ($is_user){ ?>showAuthAlert('vk');return false;<?php } else { ?>showDemoLogin();return false;<?php } ?>" class="button">
                                        <div class="ready pc">Требуется авторизация</div>
                                    </a>
                                <?php } elseif ($t['need_fb_auth']) { ?>
                                    <a href="#" title="Участвовать" onclick="<?php if ($is_user){ ?>showAuthAlert('fb');return false;<?php } else { ?>showDemoLogin();return false;<?php } ?>" class="button">
                                        <div class="ready pc">Требуется авторизация</div>
                                    </a>
                                <?php } else { ?>
                                    <!--
                                    {if $t.only_apple}
                                        {if isset($is_apple) && $is_apple === true}
                                            <a title="Участвовать" href="/adv/index/jump/link/{$t.id}" target="_blank" onclick="{if $is_user}{if $t.captcha} showRecaptcha('{$publickey}',startCpaTask,{$t.id},'/adv/index/jump/link/{$t.id}'); return false; {else} startCpaTask({$t.id}); {/if}{else}showDemoLogin();return false;{/if}" class="button">
                                                <div class="ready apple">Участвовать</div>
                                            </a>
                                        {else}
                                            <a title="Участвовать" href="#" onclick="{if $is_user}showOnlyAppleDialog(); return false;{else}showDemoLogin();return false;{/if}" class="button">
                                                <div class="ready apple">Участвовать</div>
                                            </a>
                                        {/if}
                                    {elseif $t.only_android}
                                        {if isset($is_android) && $is_android === true}
                                            <a title="Участвовать" href="/adv/index/jump/link/{$t.id}" target="_blank" onclick="{if $is_user}{if $t.captcha} showRecaptcha('{$publickey}',startCpaTask,{$t.id},'/adv/index/jump/link/{$t.id}'); return false; {else} startCpaTask({$t.id}); {/if}{else}showDemoLogin();return false;{/if}" class="button android">
                                                <div class="ready android">Участвовать</div>
                                            </a>
                                        {else}
                                            <a title="Участвовать" href="#" onclick="{if $is_user}showOnlyAndroidDialog(); return false;{else}showDemoLogin();return false;{/if}" class="button android">
                                                <div class="ready android">Участвовать</div>
                                            </a>
                                        {/if}
                                    {elseif $t.only_ipod}
                                        {if isset($is_ipod) && $is_ipod === true}
                                            <a title="Участвовать" href="/adv/index/jump/link/{$t.id}" target="_blank" onclick="{if $is_user}{if $t.captcha} showRecaptcha('{$publickey}',startCpaTask,{$t.id},'/adv/index/jump/link/{$t.id}'); return false; {else} startCpaTask({$t.id}); {/if}{else}showDemoLogin();return false;{/if}" class="button">
                                                <div class="ready apple">Участвовать</div>
                                            </a>
                                        {else}
                                            <a title="Участвовать" href="#" onclick="{if $is_user}showOnlyiPodDialog(); return false;{else}showDemoLogin();return false;{/if}" class="button">
                                                <div class="ready apple">Участвовать</div>
                                            </a>
                                        {/if}
                                    {else}
                                    -->
                                        <a title="Участвовать" href="<?php echo $GLOBALS['wasd_domain']; ?>/adv/index/jump/link/<?php echo $t['id']; ?>" target="_blank" onclick="<?php if ($is_user){ ?><?php if ($t['captcha']){ ?> showRecaptcha('publickey',startCpaTask,<?php echo $t['id']; ?>,'/adv/index/jump/link/<?php echo $t['id']; ?>'); return false; <?php } else { ?> startCpaTask(<?php echo $t['id']; ?>); <?php } } else { ?>showDemoLogin();return false;<?php } ?>" class="button">
                                            <div class="ready pc">Участвовать</div>
                                        </a>
                                    <!-- {/if} -->
                                <?php } ?>
                            <?php } ?>
                                                </div>
                                        <?php if ($is_user){ ?>
                                        <div class="pre-ready lottery-task-btn lottery-task-btn-loading">
                                            <a href="#" title="Загрузка" class="button button-loading">
                                                <img src="/cms/public/images/loading.gif" />
                                            </a>
                                        </div>

                                        <div class="pre-ready lottery-task-btn lottery-task-btn-started" style="display:none;">
                                                <a href="#" title="Выполняется" class="button progress">
                                                        <div class="ready time">
                                                                <div class="time"></div>
                                                                Выполняется
                                                        </div>
                                                </a>
                                        </div>

                                        <div class="pre-ready lottery-task-btn lottery-task-btn-finished" style="display:none;">
                                                <a href="#" title="Выполнено" class="button button-complete">
                                                        <div class="ready checked">
                                                                <div class="checked"></div>
                                                                Выполнено
                                                        </div>
                                                </a>
                                        </div>
                                        <?php } ?>
                                </div>
        </li>
    <?php } ?>
<?php } ?>

