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
                                            <div class="pre-ready lottery-task-btn lottery-task-btn-start<?php if (!$is_user){ ?> demo-login<?php } ?>" <?php if ($is_user){ ?>style="display:none;"<?php } ?>>
                                                    <a title="Участвовать" href="<?php if ($is_user){ ?><?php echo $GLOBALS['wasd_domain']; ?>/soctask/user/starttask/id/<?php echo $t['id']; ?><?php } else { echo $GLOBALS['wasd_domain']; } ?>" <?php if ($is_user){ ?>target="_blank"<?php } ?> class="button">
                                                            <div class="ready pc">Участвовать</div>
                                                    </a>
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
                        </div>
                        <div class="description">
                                <h2><?php echo $t['header']; ?></h2>
                                <p><?php echo $t['text']; ?></p>
                        </div>
                                <div class="row">
                                    <div class="pre-ready lottery-task-btn lottery-task-btn-start<?php if (!$is_user){ ?> demo-login<?php } ?>"<?php if ($is_user){ ?>  style="display:none;"<?php } ?>>

                                <?php /* if ($t['need_vk_auth']){ ?>
                                    <a href="#" title="Участвовать" onclick="<?php if ($is_user){ ?>showAuthAlert('vk');return false;<?php } else { ?>showDemoLogin();return false;<?php } ?>" class="button">
                                        <div class="ready pc">Требуется авторизация</div>
                                    </a>
                                <?php } elseif ($t['need_fb_auth']) { ?>
                                    <a href="#" title="Участвовать" onclick="<?php if ($is_user){ ?>showAuthAlert('fb');return false;<?php } else { ?>showDemoLogin();return false;<?php } ?>" class="button">
                                        <div class="ready pc">Требуется авторизация</div>
                                    </a>
                                <?php } else { */?>
                                        <a title="Участвовать" href="<?php if ($is_user){ echo $GLOBALS['wasd_domain']; ?>/adv/index/jump/link/<?php echo $t['id']; } else { ?>#<?php } ?>" <?php if ($is_user){ ?>target="_blank"<?php } ?> class="button">
                                            <div class="ready pc">Участвовать</div>
                                        </a>
                                <?php  //} ?>
                                        
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
