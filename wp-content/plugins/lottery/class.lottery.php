<?php

if( !class_exists('lottery') ):

class lottery {
    
    private $status = null;
    private $db_pg = null;
    private $error = null;
    private $posts_data = null;
    private $tasks_data = null;
    private $history_data = null;
    private $tasks_status_data = null;
    
    function __construct(){
        if(!$this->pg_init()){
            $this->error = 'Ошибка подключения к БД: ' . pg_last_error();
            return false;
        }
        add_action( 'template_redirect', array( $this, 'init_before_theme' ), 1 );
        add_action( 'wp_ajax_nopriv_get_tasks_status', array( $this, 'get_tasks_status_ajax' ) );
        add_action( 'wp_ajax_get_tasks_status' , array( $this, 'get_tasks_status_ajax' ) );
    }
    
    public function __destruct() {
        $this->pg_deinit();
    }
    
    public function init_before_theme() {
        // includes
        $this->include_before_theme();
        if(is_home() ||
                is_category('active')){
            //echo 'List';
            $this->load_posts_data();
            $this->load_tasks_status_all();
            $this->load_complete_cnt_all();
        } else if(is_single()){
            //echo 'Single';
            $post_id = get_the_ID();
            $adv_ids = get_field('id_adv', $post_id);
            $this->load_tasks_data($post_id);
            $this->load_tasks_status($GLOBALS['user_data']['id'], $adv_ids);
            $this->load_complete_cnt($adv_ids);
        }
    }
    
    private function load_history_data($max_rows = 30){
        $arg = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'history',
            'ignore_sticky_posts' => true,
            'meta_query' => array(
                'relation' => 'AND',
                'sorder' => array(
                        'key' => 'sorder',
                        'type' => 'NUMERIC',
                        'compare' => 'EXISTS',
                ),    
                'date_end' => array(
                        'key' => 'date_end',
                        'type' => 'DATETIME',
                        'compare' => 'EXISTS',
                ),
            ),
            'orderby' => array(
                'sorder' => 'ASC',
                'date_end' => 'DESC',
            )
        );
        $this->history_data = get_posts($arg);
    }
    
    private function load_active_posts(){
        $arg = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'active',// active
            'ignore_sticky_posts' => true,
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
        return get_posts($arg);
    }
    
    private function load_noactive_posts(){
        $arg = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => 'ending,future',
            'ignore_sticky_posts' => true,
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
        return get_posts($arg);
    }
    
    private function pg_init(){
        if($this->db_pg){
            return true;
        }
        $this->db_pg = pg_connect("host=db.wasdclub.com dbname=mr_alpha user=mr_alpha password=mr_alpha500f");
        return (false !== $this->db_pg);
    }
    
    private function pg_deinit(){
        if(!$this->db_pg){
            return;
        }
        pg_close($this->db_pg);
    }
    
    private function load_tasks_data($post_id = false){
        global $user_data;
        if($post_id){
            $adv_ids = get_field('id_adv', $post_id);
        } else {
            $adv_ids = $this->get_adv_ids_s();
        }
        if(empty($adv_ids)){
            return false;
        }
        $sql = "(select
                a.id,
                '' as url,
                a.adv_camp,
                st.abbr as soc_type,
                'social' as task_type,
                a.ru_header as header,
                a.ru_text as text,
                false as need_auth,
                a.type,
                a.link,
                a.cost,
                a.timeout,
                a.deleted,
                a.img,
                a.img1,
                a.created,
                false as multi_jump,
                '' as jump_method,
                false as vk_id_send,
                false as vk_link,
                false as captcha,
                null as cost_rate,
                null as pay_variant,
                null as only_apple,
                null as show_cost_rate,
                null as only_android,
                null as only_ipod,
                true as pay_refer,
                null as platform_ios,
                null as platform_ipad,
                null as platform_ipod,
                a.position
        from
                adv_soc_tasks a
        inner join
                adv_soc_types st on st.id=a.soc_type
        inner join
                adv_camps c on c.id=a.adv_camp
        where
            c.type='social' and a.adv_camp in (" . $adv_ids . ")
        )
        UNION ALL
        (
        select
                cu.id,
                cu.url,
                cu.camp_id as adv_camp,
                null as soc_type,
                'cpa' as task_type,
                cu.ru_header as header,
                cu.ru_text as text,
                false as need_auth,
                null as type,
                null as link,
                cu.price as cost,
                null as timeout,
                null as deleted,
                cu.pic as img,
                null as img1,
                cu.created,
                cu.multi_jump,
                cu.jump_method,
                cu.vk_id_send,
                cu.vk_link,
                cu.captcha,
                cu.cost_rate,
                cu.pay_variant,
                cu.only_apple,
                cu.show_cost_rate,
                cu.only_android,
                cu.only_ipod,
                cu.pay_refer,
                cu.platform_ios,
                cu.platform_ipad,
                cu.platform_ipod,
                cu.position
        from
                client_urls cu
        inner join
                adv_camps ac ON (cu.camp_id = ac.id)
        where
            ac.type = 'cpa' and cu.camp_id in (" . $adv_ids . ")
        )
        order by position  asc, created desc";
        $result = pg_query($sql);
        if(false === $result){
            $this->error = 'Ошибка запроса: ' . pg_last_error();
            return false;
        }
        $data = array();
        while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            
            if ($row['task_type'] == 'social') {
                $param = $row['soc_type'] . '_id';
                if (!$user_data[$param]) {
                    $row['need_auth'] = true;
                }
            } else {
                $row['need_vk_auth'] = (($row['vk_id_send'] || $row['vk_link']) && !$user_data['vk_id']) ? true : false;
                $row['need_fb_auth'] = false;
                //$row['need_fb_auth'] = ($row['fb_link'] && !$user_data['fb_id']) ? true : false;
            }
            
            $data[ $row['adv_camp'] ][ $row['id'] ] = $row;
        }
        pg_free_result($result);       
        $this->tasks_data = $data;
    }
    
    private function load_posts_data( $post_id = false ){
        if(empty($post_id)){
            //echo 'posts';
            $d = $this->load_active_posts();
            if(0 < count($d)){
                $this->status = 'ACTIVE';
            } else {
                $this->status = 'NOACTIVE';
                $d = $this->load_noactive_posts();
            }
        } else {
            //echo 'posts by id, ', $post_id;
            $d = $this->load_posts_by_id( $post_id );
        }
        $this->posts_data = $d;
    }
    
    private function load_complete_cnt($adv_ids){
        $sql = "SELECT lottery_participants_cnt_new('{" . $adv_ids . "}'::INT[]) cnt;";
        //echo $sql;
        $result = pg_query($sql);
        if(false === $result){
            $this->error = 'Ошибка запроса: ' . pg_last_error();
            return false;
        }
        $row = pg_fetch_array($result, null, PGSQL_ASSOC);
        return $row['cnt'];
    }
    
    private function load_complete_cnt_all(){
        foreach($this->posts_data as &$post){
            $post->lottery_complete_cnt = $this->get_complete_cnt($post->ID);
        }
    }
    
    private function load_posts_by_id($post_id){
        $arg = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__in' => (array)$post_id,
            'ignore_sticky_posts' => true,
        );
        return get_posts($arg);
    }
    
    public function get_post_by_id($post_id){
        if(empty($this->posts_data)){
            return false;
        }
        foreach($this->posts_data as $post){
            if($post->ID == $post_id){
                return $post;
            }
        }
        return false;
    }
    
    public function get_posts_data( $post_id = false ){
        if(empty($this->posts_data)){
            $this->load_posts_data( $post_id );
            $this->load_complete_cnt_all();
        }
        return $this->posts_data;
    }
    
    public function get_history_data( $max_rows = 30 ){
        if(empty($this->history_data)){
            $this->load_history_data( $max_rows );
        }
        return $this->history_data;
    }
    
    public function get_tasks_data(){
        if(null === $this->tasks_data
                && null !== $this->posts_data){
            $this->load_tasks_data();
        }
        return $this->tasks_data;
    }
    
    public function get_tasks_status(){
        return $this->tasks_status_data;      
    }
    
    public function get_tasks_status_ajax(){
        session_start();
        $data = array();
        //$data['session'] = $_SESSION;
        if(!isset($_SESSION['user_data']['id'])
                || empty($_SESSION['user_data']['id'])){
            $data['error'][] = 'empty user id';
        }
        if(!isset($_POST['id_adv'])
                || empty($_POST['id_adv'])){
            $data['error'][] = 'empty camp ids';
        }
        if(isset($data['error'])){
            wp_send_json($data);
            return false;
        }
        $data['statuses'] = $this->load_tasks_status($_SESSION['user_data']['id'], $_POST['id_adv']);
        if(!empty($this->error)){
            $data['error'][] = $this->error;
        }
        wp_send_json($data);
    }
    
    public function is_complete_ajax($post_id){
        session_start();
        if(!isset($_SESSION['user_data']['id'])
                || empty($_SESSION['user_data']['id'])){
            $data['error'][] = 'empty user id';
        }
        if(isset($data['error'])){
            wp_send_json($data);
            return false;
        }
        $data['status'] = $this->is_complete($post_id, $_SESSION['user_data']['id']);
        if(!empty($this->error)){
            $data['error'][] = $this->error;
        }
        wp_send_json($data);
    }
    
    public function get_status(){
        return $this->status;
    }
    
    private function load_tasks_status($user_id, $adv_ids){
        $sql = "select * from lottery_tasks_status(" . $user_id . ", '{" . $adv_ids . "}'::INT[]);";
        //echo $sql;
        $result = pg_query($sql);
        if(false === $result){
            $this->error = 'Ошибка запроса: ' . pg_last_error();
            return false;
        }
        $data = array();
        while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $data[ $row['task_id'] ] = $row;
        }
        pg_free_result($result);
        $this->tasks_status_data = $data;
    }
    
    private function load_tasks_status_all(){
        if(!isset($GLOBALS['user_data']['id']) || empty($GLOBALS['user_data']['id'])){
            return false;
        }
        $this->load_tasks_status($GLOBALS['user_data']['id'], $this->get_adv_ids_s());
        foreach($this->posts_data as &$post){
            $post->lottery_complete_status = $this->is_complete($post->ID, $GLOBALS['user_data']['id']);
        }
    }
    
    public function get_adv_ids_s(){
        if(empty($this->posts_data)){
            return false;
        }
        if(!empty($this->tasks_data)){
            return implode(',', array_keys($this->tasks_data));
        }
        $adv_ids = '';
        foreach($this->posts_data as $post){
            $adv_ids .= (empty($adv_ids) ? '' : ',') . get_field('id_adv', $post->ID);
        }
        return $adv_ids;
    }
    
    public function get_complete_cnt($post_id, $c = false){
        if($c){
            $post = $this->get_post_by_id($post_id);
            if($post){
                return $post->lottery_complete_cnt;
            }
        } else {
            $adv_ids = get_field('id_adv', $post_id);
            if($adv_ids){
                return $this->load_complete_cnt($adv_ids);
            } else {
                return false;
            }
        }
    }
    
    public function is_complete($post_id, $user_id, $c = false){
        if(empty($this->tasks_status_data)){
            return false;
        }
        if($c){
            $s = false;
            $post = $this->get_post_by_id($post_id);
            if($post){
                $s = $post->lottery_complete_status;
            }
            return $s;
        } else {
            $adv_ids = explode(',', get_field('id_adv', $post_id));
            if(0 == count($adv_ids)){
                return false;
            }
            $s = true;
            foreach($adv_ids as $adv_id){
                $s = (isset($this->tasks_status_data[ $adv_id ])
                    && in_array($this->tasks_status_data[ $adv_id ]['task_status'], array('paid','finish')));
                if(!$s){
                    break;
                }
            }
            return $s;
        }
    }
    
    public function print_tasks(){
        if(empty($this->tasks_data)){
            return;
        }
        $is_user = isset($user_data) && !empty($user_data);
        foreach($this->tasks_data as $id_adv => $tasks){
            foreach($tasks as $id_task => $t){
                include(locate_template( 'template-parts/lottery-task.php' ));
            }
        }
    }
    
    public function print_history(){
        if(empty($this->history_data)){
            return;
        }
        $old = $this->get_history_data();
        include(locate_template( 'template-parts/lottery-history.php' ));
    }
    
    public function include_before_theme(){
        // incudes
        include_once('core/api.php');
    }
    
}

function lottery()
{
	global $lottery;
	
	if( !isset($lottery) )
	{
		$lottery = new lottery();
	}
	
	return $lottery;
}


// initialize
lottery();

endif; // class_exists check

