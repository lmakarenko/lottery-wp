<?php

/*

$error_txt = null; 
$user_data = null;
$lottery_data = null;
$posts_data = null;

if(isset($_SESSION['user_data'])){
    $user_data = $_SESSION['user_data'];
}

$arg = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'active',// active
    'meta_query' => array(
        'relation' => 'AND',
        'sorder' => array(
                'key' => 'sorder',
                'type' => 'NUMERIC',
                'compare' => 'EXISTS',
        ),    
        'date_start' => array(
                'key' => 'date_start',
                'type' => 'DATETIME',
                'compare' => 'EXISTS',
        ),
    ),
    'orderby' => array(
        'sorder' => 'ASC',
        'date_start' => 'DESC',
    )
);
$posts_data = get_posts($arg);

if( 0 < count($posts_data) ){
    
    $error_txt .= 'Active posts loaded: ' . count($posts_data);
    $lottery_data['active'] = $posts_data;
    //initPG($error);
    
} else {
    
    $error_txt .= 'Future + Ending posts loaded';
    
    $arg = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => 'future+ending',// active
        'meta_query' => array(
            'relation' => 'AND',
            'sorder' => array(
                    'key' => 'sorder',
                    'type' => 'NUMERIC',
                    'compare' => 'EXISTS',
            ),
        ),
        'orderby' => array(
            'sorder' => 'ASC',
        )
    );
    $posts_data = get_posts($arg);
    $lottery_data['noactive'] = $posts_data;
}

function initPG(&$error = null){
    global $db_pg;
    $db_pg = pg_connect("host=db.wasdclub.com dbname=mr_alpha user=mr_alpha password=mr_alpha500f");
    if(false === $db_pg)
        $error .= 'Could not connect: ' . pg_last_error();
    return true;
}

function txt_a($d){
    echo '<textarea style="width:300px;height:300px;">'; print_r($d); echo '</textarea>';
}

function loadAdvTasks($ids = '', &$error = null){
    global $db_pg;
    if(empty($ids)){
        $error = 'ids empty';
        return false;
    }
    $sql = 'select * from adv_camps where id in (' . $ids . ');';
    $result = pg_query($sql);
    if(false === $result){
        $error = 'Ошибка запроса: ' . pg_last_error();
        return false;
    }
    $data = [];
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

        $data[] = $line;

    }
    pg_free_result($result);
    return $data;
}

*/

function txt_a($d){
    echo '<textarea style="width:300px;height:300px;">'; print_r($d); echo '</textarea>';
}