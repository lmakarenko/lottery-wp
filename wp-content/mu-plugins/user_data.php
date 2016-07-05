<?php

$GLOBALS['wasd_domain'] = 'http://wasdclub.com';

if(isset($_SESSION['user_data'])){
    $GLOBALS['user_data'] = $_SESSION['user_data'];
} else {
    $GLOBALS['user_data'] = false;
}

function lottery_clear_cache(){
    //if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    echo 'Clearing cache';
    apc_clear_cache('user');
    wp_mail( 'lev.makarenko.1987@gmail.com', 'test', 'on post_save' );
}

add_action( 'post_save', 'lottery_clear_cache' );