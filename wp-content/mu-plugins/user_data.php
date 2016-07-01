<?php

$GLOBALS['wasd_domain'] = 'http://wasdclub.com';

if(isset($_SESSION['user_data'])){
    $GLOBALS['user_data'] = $_SESSION['user_data'];
} else {
    $GLOBALS['user_data'] = false;
}
