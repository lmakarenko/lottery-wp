<?php

if(is_admin()){
    die();
}

require_once( 'wp_content/plugins/lottery/class.lottery.php' );

lottery()->get_tasks_status_ajax();