<?php

$GLOBALS['wasd_domain'] = 'http://www.wasdclub.com';
$GLOBALS['wasd_domain_'] = 'www.wasdclub.com';

if(isset($_SESSION['user_data'])){
    $GLOBALS['user_data'] = $_SESSION['user_data'];
} else {
    $GLOBALS['user_data'] = false;
}

function lottery_clear_cache(){
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    apc_clear_cache('user');
}

add_action( 'save_post', 'lottery_clear_cache' );
add_action( 'edit_post', 'lottery_clear_cache' );