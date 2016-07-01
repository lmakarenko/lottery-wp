<?php

function lottery_get_posts( $post_id = false ){
    return lottery()->get_posts_data( $post_id );
}

function lottery_get_tasks_data(){
    return lottery()->get_tasks_data();
}

function lottery_get_tasks_status(){
    return lottery()->get_tasks_status();
}

function lottery_get_history_data(){
    return lottery()->get_history_data();
}

function lottery_get_status(){
    return lottery()->get_status();
}

function lottery_get_complete_cnt($post_id, $c = false){
    return lottery()->get_complete_cnt($post_id, $c);
}

function lottery_is_complete($c = false){
    global $user_data;
    $post_id = get_the_ID();
    $user_id = $user_data['id'];
    return lottery()->is_complete($post_id, $user_id, $c);
}

function lottery_end_date($post_id = false){
    if(!$post_id){
        $post_id = get_the_ID();
    }
    $date_end = get_field('date_end', $post_id);
    return $date_end;
}

function lottery_get_adv_ids_s(){
    return lottery()->get_adv_ids_s();
}

function lottery_get_posts_ids_s(){
    return lottery()->get_posts_ids_s();
}

function lottery_get_tasks_ids_s(){
    return lottery()->get_tasks_ids_s();
}

function lottery_print_tasks(){
    lottery()->print_tasks();
}

function lottery_print_history(){
    lottery()->print_history();
}