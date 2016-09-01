<?php

if( !class_exists('lotteryAdmin') ):

class lotteryAdmin extends lotteryBase {
    
    function __construct(){
        
        parent::__construct();
        
        // ONLY WORDPRESS DEFAULT POSTS
        add_filter('manage_post_posts_columns', array( $this, 'admin_column_head'), 10);
        add_action('manage_post_posts_custom_column', array( $this, 'admin_column_content'), 10, 2);
        
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue') );
        
        add_action( 'wp_ajax_nopriv_get_report', array( $this, 'get_report_ajax' ) );
        add_action( 'wp_ajax_get_report' , array( $this, 'get_report_ajax' ) );
        /*
        add_action( 'wp_ajax_nopriv_rest_get_report', array( $this, 'rest_get_report_ajax' ) );
        add_action( 'wp_ajax_rest_get_report' , array( $this, 'rest_get_report_ajax' ) );
        
        add_action( 'wp_ajax_nopriv_get_promo', array( $this, 'get_promo_ajax' ) );
        add_action( 'wp_ajax_get_promo' , array( $this, 'get_promo_ajax' ) );
        */
        add_action( 'wp_ajax_nopriv_create_report', array( $this, 'create_report_ajax' ) );
        add_action( 'wp_ajax_create_report' , array( $this, 'create_report_ajax' ) );
    }
    
    function __destruct() {
        parent::__destruct();
    }
    
    function admin_enqueue($hook) {
        if ( 'edit.php' != $hook ) {
            return;
        }
        
        $template_dir_uri = get_template_directory_uri();
        /*
        wp_enqueue_script( 'jquery.min.js', $template_dir_uri . '/js/jquery.min.js' );
        wp_enqueue_script( 'underscore-min.js', $template_dir_uri . '/js/underscore-min.js' );
        wp_enqueue_script( 'backbone-min.js', $template_dir_uri . '/js/backbone-min.js' );
        
        wp_enqueue_script( 'models.js', $template_dir_uri . '/js/admin/models.js' );
        wp_enqueue_script( 'views.js', $template_dir_uri . '/js/admin/views.js' );
        wp_enqueue_script( 'router.js', $template_dir_uri . '/js/admin/router.js' );
        */
        wp_enqueue_style( 'lottery-admin-css', $template_dir_uri . '/css/lottery-admin.css' );
        wp_enqueue_script( 'jquery.fileDownload.js', $template_dir_uri . '/js/jquery.fileDownload.js' );
        wp_enqueue_script( 'lottery-admin-js', $template_dir_uri . '/js/lottery-admin.js' );
    }   
    
    // ADD NEW COLUMN
    function admin_column_head($defaults) {
        $defaults['lottery_ctrl'] = 'Элементы управления';
        return $defaults;
    }
 
    // SHOW THE FEATURED IMAGE
    function admin_column_content($column_name, $post_ID) {
        if ($column_name == 'lottery_ctrl') {
            echo '<input title="Отчет по выполнившим пользователям" class="lottery-btn lottery-report-btn" type="button" name="lottery_report" data-id="', $post_ID, '" />';
            //,'<input title="Редактор промокодов" class="lottery-btn lottery-promo-btn" type="button" name="lottery_promo" data-id="', $post_ID, '" />';
        }
    }
    /*
    function get_promo_ajax(){
        
        try {
            
            $data = array();
        
            if(!isset($_POST['post_id'])
                    || empty($_POST['post_id'])){
                throw new Exception('empty post id');
            }
            
            $data['promo_cnt'] = $this->get_promo_cnt($post_id);
            if(false === $data['promo_cnt']){
                throw new Exception($this->error);
            }

            if(0 == $data['promo_cnt']){
                throw new Exception('Нет записей');
            }

            $offset = isset($_POST['offset']) && 0 < (int)$_POST['offset'] ? (int)$_POST['offset'] : 0;
            $limit = isset($_POST['limit']) && 0 < (int)$_POST['limit'] ? (int)$_POST['limit'] : 10;

            $data['promo'] = $this->get_promo();

            if(false === $data['promo']){
                throw new Exception($this->error);
            }

            foreach($data['promo'] as &$v){

                //$this->filter_row_data_promo($v);

            }
        
        } catch(Exception $e){
            
            $data['error'] = $e->getMessage();
            
        }
        wp_send_json($data);
        
    }
    
    private function get_promo_cnt(){
       
        $sql = "select count(user_id) cnt from ( 
        select distinct on (u.id) user_id
        from users u
        inner join adv_soc_tasks_taken tt on tt.user_id = u.id
        inner join adv_soc_tasks t on t.id = tt.task_id
        where 
        t.adv_camp = ANY('{" . $adv_id . "}'::INT[]) and 1 = lottery_user_completed(u.id, '{" . $adv_id . "}'::INT[])
        order by u.id
        ) t_";
        
        $result = pg_query($this->db_pg, $sql);
        if(false === $result){
            $this->error = 'Ошибка запроса: ' . pg_last_error($this->db_pg);
            return false;
        }
        $row = pg_fetch_array($result, null, PGSQL_ASSOC);
        pg_free_result($result);
        return (int)$row['cnt'];

    }
    
    private function get_promo(){
        
        $sql = "select user_id id, email, vk_id from ( 
        select distinct on (u.id) user_id, u.email, COALESCE(u.vk_id::text, tt.auth_data::text) vk_id, tt.start_time
        from users u
        inner join adv_soc_tasks_taken tt on tt.user_id = u.id
        inner join adv_soc_tasks t on t.id = tt.task_id
        where 
        t.adv_camp = ANY('{" . $adv_id . "}'::INT[]) and 1 = lottery_user_completed(u.id, '{" . $adv_id . "}'::INT[])
        order by u.id
        ) t_
        order by t_.start_time
        limit " . $limit . " offset " . $offset;

        $result = pg_query($this->db_pg, $sql);
        if(false === $result){
            $this->error = 'Ошибка запроса: ' . pg_last_error($this->db_pg);
            return false;
        }
        $data = array();
        while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $data[] = $row;
        }
        pg_free_result($result);
        return $data;
        
    }
    
    function rest_get_report_ajax(){
        try {
            
            $data = array();
        
            if(!isset($_REQUEST['post_id'])
                    || empty($_REQUEST['post_id'])){
                throw new Exception('empty post id');
            }

            $adv_id = get_field('id_adv', $_REQUEST['post_id']);
            if(empty($adv_id)){
                throw new Exception('empty post field adv_id');
            }

            $offset = isset($_REQUEST['offset']) && 0 < (int)$_REQUEST['offset'] ? (int)$_REQUEST['offset'] : 0;
            $limit = isset($_REQUEST['limit']) && 0 < (int)$_REQUEST['limit'] ? (int)$_REQUEST['limit'] : 10;

            $data = $this->get_report($adv_id, $offset, $limit);

            if(false === $data){
                throw new Exception($this->error);
            }

            foreach($data as &$v){

                $this->filter_row_data($v);

            }
            
            wp_send_json($data);
        
        } catch(Exception $e){
            
            wp_send_json_error($e->getMessage());
            
        }
    }
    */
    function get_report_ajax(){
       
        try {
            
            $data = array();
        
            if(!isset($_REQUEST['post_id'])
                    || empty($_REQUEST['post_id'])){
                throw new Exception('empty post id');
            }

            $adv_id = get_field('id_adv', $_REQUEST['post_id']);
            if(empty($adv_id)){
                throw new Exception('empty post field adv_id');
            }
            
            $data['report_cnt'] = $this->get_report_cnt($adv_id);
            if(false === $data['report_cnt']){
                throw new Exception($this->error);
            }

            if(0 == $data['report_cnt']){
                throw new Exception('Нет выполнивших');
            }

            $offset = isset($_REQUEST['offset']) && 0 < (int)$_REQUEST['offset'] ? (int)$_REQUEST['offset'] : 0;
            $limit = isset($_REQUEST['limit']) && 0 < (int)$_REQUEST['limit'] ? (int)$_REQUEST['limit'] : 10;

            $data['report'] = $this->get_report($adv_id, $offset, $limit);

            if(false === $data['report']){
                throw new Exception($this->error);
            }

            foreach($data['report'] as &$v){

                $this->filter_row_data($v);

            }
        
        } catch(Exception $e){
            
            $data['error'] = $e->getMessage();
            
        }
        wp_send_json($data);
    }
    
    function create_report_ajax(){
        
        try {
            
            $data = array();
        
            if(!isset($_POST['post_id'])
                    || empty($_POST['post_id'])){
                throw new Exception('empty post id');
            }

            $adv_id = get_field('id_adv', $_POST['post_id']);
            if(empty($adv_id)){
                throw new Exception('empty post field adv_id');
            }
                
            $dir = 'data/';
            $dir_ = LOTTERY__PLUGIN_DIR . $dir;
            if(!is_dir($dir_)){
                if(!mkdir($dir_)){
                    throw new Exception('error creating directory ' . $dir_);
                }
                /*$processUser = posix_getpwuid(posix_geteuid());
                if(!chown($dir_, $processUser['name'])){
                    throw new Exception('error chown ' . $processUser['name'] . ' for directory ' . $dir_);
                }
                if(!chmod($dir_, 0777)){
                    throw new Exception('error chmod 0777 for directory ' . $dir_);
                }*/
            }
            
            $fname = 'report_' . $_POST['post_id'] . '.csv';
            $fname_ = $dir_ . $fname;
            
            if((isset($_POST['no_cache']) && $_POST['no_cache'])
                    || !file_exists($fname_)){
                $fname = $this->create_report($adv_id, $_POST['post_id'], $dir_);
            }
            
            if(!$fname){
                throw new Exception($this->error);
            }

            $data['url'] = plugins_url('lottery') . '/' . $dir . $fname;
            
        } catch(Exception $e){
            
            $data['error'] = $e->getMessage();
            
        }
        wp_send_json($data);
    }
    
    private function get_report_cnt($adv_id){
               
        $sql = "select count(user_id) cnt from ( 
        select distinct on (u.id) user_id
        from users u
        inner join adv_soc_tasks_taken tt on tt.user_id = u.id
        inner join adv_soc_tasks t on t.id = tt.task_id
        where 
        t.adv_camp = ANY('{" . $adv_id . "}'::INT[]) and 1 = lottery_user_completed(u.id, '{" . $adv_id . "}'::INT[])
        order by u.id
        ) t_";
        
        $result = pg_query($this->db_pg, $sql);
        if(false === $result){
            $this->error = 'Ошибка запроса: ' . pg_last_error($this->db_pg);
            return false;
        }
        $row = pg_fetch_array($result, null, PGSQL_ASSOC);
        pg_free_result($result);
        return (int)$row['cnt'];
    }
    
    private function get_report($adv_id, $offset = 0, $limit = 10){
               
        $sql = "select user_id id, email, vk_id from ( 
        select distinct on (u.id) user_id, u.email, COALESCE(u.vk_id::text, tt.auth_data::text) vk_id, tt.start_time
        from users u
        inner join adv_soc_tasks_taken tt on tt.user_id = u.id
        inner join adv_soc_tasks t on t.id = tt.task_id
        where 
        t.adv_camp = ANY('{" . $adv_id . "}'::INT[]) and 1 = lottery_user_completed(u.id, '{" . $adv_id . "}'::INT[])
        order by u.id
        ) t_
        order by t_.start_time
        limit " . $limit . " offset " . $offset;

        $result = pg_query($this->db_pg, $sql);
        if(false === $result){
            $this->error = 'Ошибка запроса: ' . pg_last_error($this->db_pg);
            return false;
        }
        $data = array();
        while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $data[] = $row;
        }
        pg_free_result($result);
        return $data;
    }
    
    private function create_report($adv_id, $post_id, $dir){
              
        $sql = "select user_id id, email, vk_id, last_ip from ( 
        select distinct on (u.id) user_id, u.email, COALESCE(u.vk_id::text, tt.auth_data::text) vk_id, tt.start_time, u.last_ip
        from users u
        inner join adv_soc_tasks_taken tt on tt.user_id = u.id
        inner join adv_soc_tasks t on t.id = tt.task_id
        where 
        t.adv_camp = ANY('{" . $adv_id . "}'::INT[]) and 1 = lottery_user_completed(u.id, '{" . $adv_id . "}'::INT[])
        order by u.id
        ) t_
        order by t_.start_time";
        
        $result = pg_query($this->db_pg, $sql);
        if(false === $result){
            $this->error = 'Ошибка запроса: ' . pg_last_error($this->db_pg);
            return false;
        }
        
        $fname = 'report_' . $post_id . '.csv';
        $fname_ = $dir . $fname;
        
        $fp = fopen($fname_, 'w');
        if(false === $fp){
            $this->error = 'Ошибка создания файла ' . $fname_;
            return false;
        }
        
        while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $this->filter_row_data($row, array(
                'vk_id' => 'http://vk.com/id{vk_id}'
            ));
            fputcsv($fp, $row, ';');
        }
        
        fclose($fp);
        pg_free_result($result);
        
        return $fname;
        
    }
    
    private function filter_row_data(&$row, $patterns = null){
        if(isset($row['vk_id']) && is_string($row['vk_id'])){
            $auth_data = json_decode($row['vk_id'], true);
            if(json_last_error() == JSON_ERROR_NONE){
                if(isset($auth_data['uid'])){
                    unset($row['vk_id']);
                    $row['vk_id'] = $auth_data['uid'];
                }
            }
            if(isset($patterns['vk_id'])){
                $row['vk_id'] = str_replace('{vk_id}', $row['vk_id'], $patterns['vk_id']);
            }
        }
        if(isset($row['email'])){
            if(isset($patterns['email'])){
                $row['email'] = str_replace('{email}', $row['email'], $patterns['email']);
            }
        }
    }
    
}

function lotteryAdmin()
{
    if( !isset($GLOBALS['lotteryAdmin']) )
    {
        $GLOBALS['lotteryAdmin'] = new lotteryAdmin();
    }	
    return $GLOBALS['lotteryAdmin'];
}

// initialize
lotteryAdmin();

endif;

