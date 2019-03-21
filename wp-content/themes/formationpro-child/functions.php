<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/black.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/css/black.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

}


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since formationpro 1.0
 */
function formationpro_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'formationpro' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Secondary Sidebar', 'formationpro' ),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'formationpro' ),
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'formationpro' ),
		'id' => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar(array(
			'name' => 'Left Footer Column',
			'id'   => 'left_column',
			'description'   => 'Widget area for footer left column',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));
		register_sidebar(array(
			'name' => 'Center  Footer Column',
			'id'   => 'center_column',
			'description'   => 'Widget area for footer center column',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));
		register_sidebar(array(
			'name' => 'Right Footer Column',
			'id'   => 'right_column',
			'description'   => 'Widget area for footer right column',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));
		register_sidebar(array(
			'name' => 'bottom Footer',
			'id'   => 'bottom_footer',
			'description'   => 'Widget area for Bottom footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));

}
add_action( 'widgets_init', 'formationpro_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function formationpro_scripts_child() {

	wp_enqueue_script( 'customjs', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), '',  true );

}
add_action( 'wp_enqueue_scripts', 'formationpro_scripts_child' );


/* momo custom code start */
//adding header search form
add_filter( 'wp_nav_menu_items', function($items,$arg){
	if($arg->theme_location!='primary') return $items;
	$search_form_content = '<!-- search form -->
                        <li><form method="get" id="header_searchform" action="/" role="search">
                            <input type="text" class="field" name="s" value="" class="s" placeholder="Search …">
                        </form></li><li id="submit_header_search" class="fa fa-search"></li>
                        <!-- end search form -->';
	return $items.$search_form_content;

}, 1, 2 );


/************************
							Centro functions
											*********************/

function aw_centro_status() {

    global $wpdb;

    $sql = "SELECT requestor, week(curdate( )) as this_week, count(*) as total
		FROM ".$wpdb->prefix."centro
		WHERE date_entered >= DATE_SUB( CURDATE( ) , INTERVAL 6 WEEK )
		group BY requestor, week(CURDATE( ))";
    $results = $wpdb->get_results($sql) or die(mysql_error());

    $status = "";
    $i=0;

    foreach( $results as $result ) {

	$wk1 = $wpdb->get_row($wpdb->prepare("SELECT count(*) as total FROM ".$wpdb->prefix."centro WHERE week(date_entered) = %d and requestor = %s", $result->this_week, $result->requestor));

	$wk2 = $wpdb->get_row($wpdb->prepare("SELECT count(*) as total FROM ".$wpdb->prefix."centro WHERE week(date_entered) = %d and requestor = %s", ($result->this_week - 1), $result->requestor));

	$wk3 = $wpdb->get_row($wpdb->prepare("SELECT count(*) as total FROM ".$wpdb->prefix."centro WHERE week(date_entered) = %d and requestor = %s", ($result->this_week - 2), $result->requestor));

	$wk4 = $wpdb->get_row($wpdb->prepare("SELECT count(*) as total FROM ".$wpdb->prefix."centro WHERE week(date_entered) = %d and requestor = %s", ($result->this_week - 3), $result->requestor));

	$wk5 = $wpdb->get_row($wpdb->prepare("SELECT count(*) as total FROM ".$wpdb->prefix."centro WHERE week(date_entered) = %d and requestor = %s", ($result->this_week - 4), $result->requestor));

	$wk6 = $wpdb->get_row($wpdb->prepare("SELECT count(*) as total FROM ".$wpdb->prefix."centro WHERE week(date_entered) = %d and requestor = %s", ($result->this_week - 5), $result->requestor));

		$status .= '<tr class="d'.($i%2).'"><td class="td0">' .$result->requestor. '</td><td><center>' .$result->total. '</center></td><td><center>' .$wk1->total. '</center></td><td><center>' .$wk2->total . '</center></td><td><center>' .$wk3->total . '</center></td><td><center>' .$wk4->total . '</center></td><td><center>' .$wk5->total . '</center></td><td><center>' .$wk6->total . '</center></td></tr>';

		$i += 1;


    }

    return $status;
}

add_shortcode('aw_centro_status_sc', 'aw_centro_status');


function aw_centro_history() {

    global $wpdb;

    $sql = "SELECT DATE_ADD(date_entered, INTERVAL 2 HOUR) as date_entered, campaign_id, report_type, notes, requestor
		FROM ".$wpdb->prefix."centro
		WHERE date_entered >= DATE_SUB( CURDATE( ) , INTERVAL 8 DAY )
		ORDER BY requestor, campaign_id, date_entered";
    $results = $wpdb->get_results($sql) or die(mysql_error());

    $history = "";
    $i=0;

    foreach( $results as $result ) {

	$history .= '<tr class="d'.($i%2).'"><td class="td0">' .$result->requestor. '</td><td class="td0">' .$result->campaign_id. '</td><td><center>' .$result->report_type . '</center></td><td><center>' .$result->notes . '</center></td><td><center>' .$result->date_entered . '</center></td></tr>';

	$i += 1;
    }

    return $history;
}

add_shortcode('aw_centro_history_sc', 'aw_centro_history');



//centro form submit by momo
add_action( 'wp_ajax_centro_form_submit', 'centro_form_submit' );

function centro_form_submit() {

    global $wpdb;

    $i = 1;
	do {

		//need to limit strings here based on database field lengths
		$campaign = sanitize_text_field($_POST["campaign$i"]);
		$requestor = sanitize_email($_POST["requestor$i"]);
		$note = sanitize_text_field($_POST["note$i"]);

		$reports = array('launch', 'pacing', 'final');
		$report = $reports[$_POST["report$i"]];

		if (!empty($campaign)) {


$wpdb->insert(
	$wpdb->prefix.'centro',
	array(
		'campaign_id' => $campaign,
		'report_type' => $report,
		'requestor' => $requestor,
		'notes' => $note
	),
	array(
		'%s',
		'%s',
		'%s',
		'%s'
	)
);



		}

		$i += 1;

	} while ($i <= 20);

	die(1);
}



function login_form_submit() {

        global $email;
        $email      =   strtolower(sanitize_email( $_POST['login_email'] ));
        $exists = email_exists($email);

	if ( !$exists ) {

	   if (substr($email, -11) !== "@centro.net") {
	      wp_redirect( get_site_url() . '/invalid-login');
	      exit;
	   }

	   $user_id = wp_create_user($email, 'aw2015', $email);

	   //do not show Wordpress toolbar to logged in users
	   update_user_meta($user_id, 'show_admin_bar_front', false);

   	} else {
	   $user_id = $exists;
	}


	//log user in
	$user = get_user_by( 'id', $user_id );
	if( $user ) {
    	    wp_set_current_user( $user_id, $user->user_login );
	    wp_set_auth_cookie( $user_id );
	    do_action( 'wp_login', $user->user_login );
	}



	wp_safe_redirect( get_site_url() . '/menu');
	exit;

}


add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( home_url() );
  exit();
}


function login_redirect( $redirect_to, $request, $user ){
    return home_url('menu');
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );


function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Centro Client Portal';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


// Custom shortcode by momo
add_shortcode('start_task_button', 'start_task_button');
function start_task_button($atts, $content ){
	$ip = $_SERVER['REMOTE_ADDR'];
	$workflow_ip = get_option('workflow_ip','1');
	$restrict_workflow_ip = get_option('restrict_workflow_ip',false);
	$return = '';
	if($restrict_workflow_ip=='0') {
		//$return .="Your IP : $ip <br> Allowed ip : $workflow_ip <br>";
	}
	if(($workflow_ip and $ip and $ip == $workflow_ip) or $restrict_workflow_ip=='0') {
		$return .='<div id="start-Task" class="grey_btn">Start Task</div>';
	}
	return $return;
}
add_shortcode('portal_login_button', 'portal_login_button');
function portal_login_button($atts, $content = "Client Login" ){
	if(isset($atts['link'])) $link = $atts['link']; else $link = '/clients/portal';
	if(isset($atts['src'])) $link .= '?src='.$atts['src'];
	return '<a href="'.$link.'" ><div class="portal_login_button grey_btn">'.$content.'</div></a>';
}


//workflow functions by momo
add_action( 'wp_ajax_get_workflow', 'get_workflow' );
add_action( 'wp_ajax_on_call', 'on_call' );
add_action( 'wp_ajax_get_job', 'get_job' );
add_action( 'wp_ajax_end_job', 'end_job' );
add_action( 'wp_ajax_update_count', 'update_count' );

function get_workflow() {
	global $current_user;
	get_currentuserinfo();
	$user = $current_user->user_login ;
	$api_server = get_option('api_server');
	$api_key = get_option('api_key');
	$url = "http://".$api_server."/WorkFlowPortal.php?action=get_task&key=".$api_key."&user=".$user;
	$response =   wp_remote_get( $url );
	if(is_wp_error($response)) echo '0';
	else echo $response['body'];
	wp_die();
}

function on_call() {
	global $current_user;
	get_currentuserinfo();
	$user = $current_user->user_login ;
	$api_server = get_option('api_server');
	$api_key = get_option('api_key');
	$url = "http://".$api_server."/WorkFlowPortal.php?action=on_call&key=".$api_key."&user=".$user;
	$response =   wp_remote_get( $url );
	if(is_wp_error($response)) echo '0';
	else echo $response['body'];
	wp_die();
}

function get_job() {
	$jobid = htmlspecialchars(str_replace('\"', "", $_POST['jobId']));
	$api_server = get_option('api_server');
	$api_key = get_option('api_key');
	$url = "http://".$api_server."/WorkFlowPortal.php?action=start&key=".$api_key."&job=".$jobid;
	$response =   wp_remote_get( $url );
	$data = json_decode($response['body'],true);
	if(isset($data['estimated_start'])) {
		$datetime = new DateTime($data['estimated_start']);
		$la_time = new DateTimeZone('America/Chicago');
		$datetime->setTimezone($la_time);
		$data['estimated_start'] = $datetime->format('Y-m-d h:i A');
	}
	if(isset($data['estimated_finish'])) {
		$datetime = new DateTime($data['estimated_finish']);
		$la_time = new DateTimeZone('America/Chicago');
		$datetime->setTimezone($la_time);
		$data['estimated_finish'] = $datetime->format('Y-m-d h:i A');
	}
	if(is_wp_error($response)) echo '0';
	else echo json_encode($data);
	wp_die();
}

function end_job() {
	$jobid = htmlspecialchars($_POST['jobId']);
	$action_stop = urlencode($_POST['action_stop']);
	$action_info = urlencode($_POST['action_info']);
	$action_stopping_point = urlencode($_POST['action_stopping_point']);
	$api_server = get_option('api_server');
	$api_key = get_option('api_key');
	$url = "http://".$api_server."/WorkFlowPortal.php?action=stop&key=".$api_key."&job=".$jobid."&action_stop=".$action_stop."&action_info=".$action_info ."&action_stopping_point=".$action_stopping_point;
	$response =   wp_remote_get( $url );
	if(is_wp_error($response)) echo '0';
	else echo $response['body'];
	wp_die();
}

function update_count() {
	$jobid = htmlspecialchars($_POST['jobId']);
	$new_count = (int)($_POST['new_count']);
	$api_server = get_option('api_server');
	$api_key = get_option('api_key');
	$url = "http://".$api_server."/WorkFlowPortal.php?action=update&key=".$api_key."&job=".$jobid."&new_count=".$new_count ;
	$response =   wp_remote_get( $url );
	if(is_wp_error($response)) echo '0';
	else echo $response['body'];
	wp_die();
}

add_action( 'init', 'create_page' );

function create_page() {
    if(get_page_by_title('MediaIQ  Screenshots') == NULL ){
	    $page_id = wp_insert_post(array(
				'post_title' => 'MediaIQ  Screenshots',
				'post_type' =>'page',
				'post_name' => 'mediaiq-screenshots',
				'post_status' => 'publish',
				'post_excerpt' => '',
				'post_parent' => '1867'
			));
		add_post_meta( $page_id, '_wp_page_template', 'screenshots-media.php' );
	}
	if(get_page_by_title('MediaIQ  Screenshots Submissions') == NULL ){
	    $page_id = wp_insert_post(array(
				'post_title' => 'MediaIQ  Screenshots Submissions',
				'post_type' =>'page',
				'post_name' => 'mediaiq-screenshots-submission',
				'post_status' => 'publish',
				'post_excerpt' => '',
				'post_parent' => '1867'
			));
		add_post_meta( $page_id, '_wp_page_template', 'mediaiq-screenshots-submission.php' );
	}
}
/*add_action( 'init', 'change_pass' );
function change_pass(){
	if(isset($_POST['pass'])){
		global $wpc_client;
		$ID = $wpc_client->current_plugin_page['client_id'] ;
		 echo ' id : '.$ID ;
		if( is_numeric($ID) && $ID > 0 ) {
			$client_gps = $wpc_client->cc_get_client_groups_id($ID); //array of string
			$allowed_gps = array('3','4'); //allowed groups IDs
			$intersect = array_intersect( $client_gps , $allowed_gps ) ;
			if(!empty($intersect)) {
				$pass = $_POST['pass'] ;
				$userdata = array(
					'ID' => esc_attr($ID),
					'user_pass' => $pass
				);
				$res = $wpc_client->cc_client_update_func( $userdata );
				ob_clean ();
				if($res){
					die($res);
				} else die('0');
			}
		} else { die('0'); }
	}

}*/