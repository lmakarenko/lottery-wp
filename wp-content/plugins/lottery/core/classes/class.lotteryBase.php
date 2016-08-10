<?php

if( !class_exists('lotteryBase') ):
    
class lotteryBase {

    protected $error = null;
    protected $db_pg = null;
    
    function __construct(){
        if(!$this->pg_init()){
            $this->error = 'Ошибка подключения к БД: ' . pg_last_error();
        }
    }
    
    function __destruct() {
        $this->pg_deinit();
    }
    
    protected function pg_init(){
        if($this->db_pg){
            return true;
        }
        $dsn = "host=db.wasdclub.com dbname=mediareach user=mediareach password=jshnzoSh82nsni";
        /*
        if(false !== mb_strpos(str_replace('www.', '', $_SERVER['SERVER_NAME']), 'wasdclub.com')){
            $dsn = "host=db.wasdclub.com dbname=mediareach user=mediareach password=jshnzoSh82nsni";
        } else {
            $dsn = "host=db.wasdclub.com dbname=mr_alpha user=mr_alpha password=mr_alpha500f";
        }*/
        try {
            $this->db_pg = pg_connect($dsn);
            return true;
        } catch(Exception $e) {
            return false;
        }
    }
    
    protected function pg_deinit(){
        if(!$this->db_pg){
            return;
        }
        pg_close($this->db_pg);
    }
    
}

endif; // class_exists check