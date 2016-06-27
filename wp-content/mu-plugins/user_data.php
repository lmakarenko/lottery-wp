<?php

$GLOBALS['wasd_domain'] = 'http://mediareach.local';

if(isset($_SESSION['user_data'])){
    $GLOBALS['user_data'] = $_SESSION['user_data'];
} else {
    $GLOBALS['user_data'] = false;
}
