<?php if( session_status() == PHP_SESSION_NONE ){ session_start(); }
/**
 * RichCo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RichCo
 */
require_once __DIR__ . '/widgets/richco_recent_posts_widget.php';
require_once(__DIR__  . '/classes/Database.php');//get DB connection

//initialize classes
if(!isset($database)){$database = new Database();}//initialize database class

//go to https
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}

/*******************************************************************************
 * setup - get page urls
 ******************************************************************************/
function get_services_url(){
    if(is_numeric(get_page_by_title('services')->ID )) {
        return (stripslashes(get_permalink( get_page_by_title('services')->ID )));
    }else{
        return '#';
    }
}
function get_resources_url(){
    if(is_numeric(get_page_by_title('resources')->ID )) {
        return (stripslashes(get_permalink( get_page_by_title('resources')->ID )));
    }else{
        return '#';
    }
}
function get_about_url(){
    if(is_numeric(get_page_by_title('about')->ID )) {
        return stripslashes(get_permalink( get_page_by_title('about')->ID ));
    }else{
        return '#';
    }
}
function get_clients_url(){
    if( is_numeric(get_page_by_title('clients')->ID )) {
        return (stripslashes(get_permalink( get_page_by_title('clients')->ID )));
    }else{
        return '#';
    }
}
function get_contact_url(){
    if( is_numeric(get_page_by_title('contact')->ID )) {
        return (stripslashes(get_permalink( get_page_by_title('contact')->ID )));
    }else{
        return '#';
    }
}
function get_vendors_url(){
    if( is_numeric(get_page_by_title('vendors')->ID )) {
        return (stripslashes(get_permalink( get_page_by_title('vendors')->ID )));
    }else{
        return '/';
    }
}
function get_admin_page_url(){
    if( is_numeric(get_page_by_title('admin')->ID )) {
        return (stripslashes(get_permalink( get_page_by_title('admin')->ID )));
    }else{
        return '/';
    }
}
//@return string/bool - title of current page or false if not set
// '404' if 404 page
// 'front_page' if front page
function get_current_page(){
     global $wp_query;
    //we're on a page or post?
    if(isset($wp_query->queried_object)){
        if(isset($wp_query->queried_object->post_name)){
            $current_url = ($wp_query->queried_object->post_name);
        }else
        if(is_404()){$current_url = '404';}
        else if(is_front_page()){$current_url = 'front_page';}
        else {$current_url = false;}
    }else if(is_front_page()){$current_url = 'front_page';}
        else {$current_url = false;}
    return $current_url;
}
/*******************************************************************************
 * setup - customized menu
 ******************************************************************************/

//create the menu with the pages above added
add_action( 'after_setup_theme', 'richco_create_menu' );
function richco_create_menu(){
    $menuname = 'RichCo Menu';// Does the menu exist already?
    $menu_exists = wp_get_nav_menu_object( $menuname );
    if( !$menu_exists ){// Does the menu exist already?
        $menu_id = wp_create_nav_menu($menuname);
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Home'),
            //'menu-item-classes' => '',
            'menu-item-url' => home_url( '/' ), 
            'menu-item-status' => 'publish'));
        wp_update_nav_menu_item($menu_id, 0, 
            ['menu-item-title' =>  __('Services'),
            'menu-item-url' => get_services_url(), 
            'menu-item-status' => 'publish']);
        wp_update_nav_menu_item($menu_id, 0, 
            ['menu-item-title' =>  __('About Us'),
            'menu-item-url' => get_about_url(), 
            'menu-item-status' => 'publish']);
        wp_update_nav_menu_item($menu_id, 0, 
            ['menu-item-title' =>  __('Contact'),
            'menu-item-url' => get_contact_url(), 
            'menu-item-status' => 'publish']);
        wp_update_nav_menu_item($menu_id, 0, 
            ['menu-item-title' =>  __('Clients'),
            'menu-item-url' => get_clients_url(), 
            'menu-item-status' => 'publish']);
        wp_update_nav_menu_item($menu_id, 0, 
            ['menu-item-title' =>  __('Vendors'),
            'menu-item-url' => get_vendors_url(), 
            'menu-item-status' => 'publish']);
        if( !has_nav_menu( 'Hamburger' ) ){
            $locations = get_theme_mod('nav_menu_locations');
            $locations['Hamburger'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }
}
/******************************************************************************
 * - end menu setup
 ****************************************************************************/

/******************************************************************************
 * - scripts - define script/style locations
 ****************************************************************************/
add_action( 'wp_enqueue_scripts', 'richco_register_scripts' );
function richco_register_scripts() {
    //required everywhere - ui js scripts
    wp_deregister_script('jquery');
    //wp_register_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', NULL, '3.4.1', true);
    wp_register_script('jquery',get_template_directory_uri() . '/js/jquery-3.3.1.min.js', NULL, '3.1.1', true);
    wp_register_script('kill_spinner',get_template_directory_uri() . '/js/kill_spinner.js', array( 'aos'), '', true);
    wp_register_script('bootstrap_4','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), '4.4.1', true);
    wp_register_script('bootstrap_3','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7', true);
    wp_register_script('font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js', array('jquery'), '5.13.0', true);
    wp_register_script('aos', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array('jquery'), '2.3.4', true);
    wp_register_script('materialize','https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js', array('jquery'), '2.3.4', true);
    wp_register_script('admin_main',get_template_directory_uri() . '/js/admin.js', array('jquery'), '1', true);
    wp_register_script('owl','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('aos'), '2.3.4', true);
    wp_register_script('richco_main_js',get_template_directory_uri() . '/js/main.js', array( 'owl'), '1', true);

    //required everywhere - ui css styles
    //wp_register_style('bootstrap_4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
    wp_register_style('bootstrap_4', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_register_style('bootstrap_3', get_template_directory_uri() . '/CSS/bootstrap.min.css' );
    wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' , null, '5.13.0');
    wp_register_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css' );
    wp_register_style('aos',  'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css' );
    wp_register_style('owl',  'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );
    wp_register_style('owl-theme',  'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css' );
    wp_register_style('material_design',  'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css' );
    wp_register_style('material_design_icons',  'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff' );
    wp_register_style('richco_main_css', get_template_directory_uri() . '/css/style.css',[],'4' );
    wp_register_style('navbar',  get_template_directory_uri() . '/css/navbar.css',[],'1' );
    wp_register_style('footer',  get_template_directory_uri() . '/css/footer.css',[],'1' ); 
    wp_register_style('about-page',  get_template_directory_uri() . '/css/about.css',[],'1' ); 
    wp_register_style('services-page',  get_template_directory_uri() . '/css/services.css',[],'1' ); 
    wp_register_style('contact-page',  get_template_directory_uri() . '/css/contact.css',[],'1' ); 
    wp_register_style('clients-page',  get_template_directory_uri() . '/css/clients.css',[],'1' ); 
    wp_register_style('vendors-page',  get_template_directory_uri() . '/css/vendors.css',[],'1' ); 
    wp_register_style('careers-page',  get_template_directory_uri() . '/css/careers.css',[],'1' ); 
    wp_register_style('news-page',  get_template_directory_uri() . '/css/news.css',[],'1' ); 
    wp_register_style('admin-page',  get_template_directory_uri() . '/css/admin.css',[],'1' ); 
    wp_register_style('message-section',  get_template_directory_uri() . '/css/messaging.css',[],'1' ); 
    wp_register_style('documents-section',  get_template_directory_uri() . '/css/documents.css',[],'1' ); 
}
//then, load scripts
add_action( 'wp_enqueue_scripts', 'richco_load_scripts' );
function richco_load_scripts() {

    //first add data to main script
    $richco_data_array_settings = array(
        'page' => get_current_page(),
        'register_vendors'=> get_template_directory_uri().'/workers/register_vendors.php',
        'register_clients'=> get_template_directory_uri().'/workers/register_clients.php',
        'contact_form'=> get_template_directory_uri().'/workers/contact_form.php',
        'admin_url'=> get_admin_page_url(),
        'home'=>get_template_directory_uri(),
    );
    wp_localize_script( 'richco_main_js', 'data', $richco_data_array_settings );
    
    //load css
    wp_enqueue_style('normalize');
    wp_enqueue_style('bootstrap_4');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('aos');
    wp_enqueue_style('owl');
    wp_enqueue_style('owl-theme');
    wp_enqueue_style('navbar');
    wp_enqueue_style('footer');
    
    //load js
    wp_enqueue_script('jquery');
    wp_enqueue_script('aos');
    wp_enqueue_script('kill_spinner');
    wp_enqueue_script('bootstrap_4');
    wp_enqueue_script('font-awesome');
    wp_enqueue_script('owl');
    wp_enqueue_script('richco_main_js');
}
//then, load page specific scripts
add_action( 'wp_enqueue_scripts', 'richco_load_page_scripts' );
function richco_load_page_scripts() {
    if(!isset($database)){$database = new Database();}//initialize database class
    //first add data to main script
    //$richco_data_array_settings = array('page' => get_current_page(),);
    //wp_localize_script( 'richco_main_js', 'data', $richco_data_array_settings );
    
    //load css
    if(get_current_page() == 'about'){wp_enqueue_style('about-page');}
    if(get_current_page() == 'services'){wp_enqueue_style('services-page');}
    if(get_current_page() == 'contact'){wp_enqueue_style('contact-page');}
    if(get_current_page() == 'clients'){wp_enqueue_style('clients-page');}
    if(get_current_page() == 'careers'){wp_enqueue_style('careers-page');}
    if(get_current_page() == 'vendors'){wp_enqueue_style('vendors-page');}  
    if(get_current_page() == 'news'){wp_enqueue_style('news-page');}  
    if(get_current_page() == 'admin'){
            //get user info
    if(isset($_SESSION['type'])){
        $type = $_SESSION['type'];
        $name = $_SESSION['name'];
        $id = $_SESSION['id'];
        $pic = $_SESSION['pic'];
        $phone = $_SESSION['phone'];
        $email = $_SESSION['email'];
        $address = $_SESSION['address'];
        $company = $_SESSION['company'];
        $date = $_SESSION['date'];
    }else{
        $type = '';
        $name = '';
        $pic = '';
        $id = '';
        $phone = '';
        $email = '';
        $address = '';
        $company = '';
        $date = '';
    }
    //first add data to main script
    if(isset($_SESSION['type'])){
        $email_data = $database->get_all_emails();
        $users_data = $database->get_all_users();
        $message_data = $database->get_all_messages();
        $work_orders = $database->get_all_work_orders();
    }
    else{$email_data = null;$users_data = null;$message_data = null;$work_orders = null;}
    $admin_array = [
        'login_url'=> get_template_directory_uri().'/workers/login.php',
        'admin_url'=> get_admin_page_url(),
        'home'=> get_template_directory_uri(),
        'type'=> $type,
        'name'=> $name,
        'id'=> $id,
        'pic'=> $pic,
        'phone'=> $phone,
        'email'=> $email,
        'address'=> $address,
        'company'=> $company,
        'reg_date'=> $date,
        'add_email_url'=>'../wp-content/themes/richco/workers/add_email.php',
        'add_user_url'=>'../wp-content/themes/richco/workers/add_user.php',
        'get_email_url'=>'../wp-content/themes/richco/workers/get_all_emails.php',
        'get_user_url'=>'../wp-content/themes/richco/workers/get_all_users.php',
        'get_messges_url'=>'../wp-content/themes/richco/workers/get_all_messages.php',
        'remove_email'=>'../wp-content/themes/richco/workers/remove_email.php',
        'remove_user'=>'../wp-content/themes/richco/workers/remove_user.php',
        'update_email'=>'../wp-content/themes/richco/workers/update_email.php',
        'update_user'=>'../wp-content/themes/richco/workers/update_users.php',
        'send_message'=>'../wp-content/themes/richco/workers/send_message.php',
        'signout_url'=>'../wp-content/themes/richco/workers/signout.php',
        'login_url'=>'../wp-content/themes/richco/workers/login.php',
        'signup_url'=>'../wp-content/themes/richco/workers/signup.php',
        'upload_file_url'=>'../wp-content/themes/richco/workers/file_upload.php',
        'add_work_url'=>'../wp-content/themes/richco/workers/add_work.php',
        'get_work'=>'../wp-content/themes/richco/workers/get_work.php',
        'emails'=>$email_data,
        'users'=>$users_data,
        'all_work_orders'=>$work_orders,
        //'messages'=>$message_data,
        ];
        wp_localize_script( 'admin_main', 'data', $admin_array );
        wp_enqueue_script('admin_main');
        wp_enqueue_style('admin-page');
        wp_enqueue_style('message-section');
        wp_enqueue_style('documents-section');
        //wp_enqueue_script('bootstrap_3');
    }

    if(get_current_page() == 'front_page'){wp_enqueue_style('richco_main_css');}
    //load js
    //wp_enqueue_script('jquery');
}
/******************************************************************************
 * - end scripts
 ****************************************************************************/
/******************************************************************************
 * - pages
 *****************************************************************************/


//about page
add_action( 'after_setup_theme', 'quick_cart_page_about' );
function quick_cart_page_about(){
    $title = 'about';
    $page_check = get_page_by_title($title);
        //$new_page_content = '/pages/about.php';
        $template = '/pages/about.php';
    if ( is_admin() ){
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'page_template'  => $template,
        );
        if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            update_post_meta($new_page_id, '_wp_page_template', $template);
        }
    }
}
//about page
add_action( 'after_setup_theme', 'quick_cart_page_services' );
function quick_cart_page_services(){
    $title = 'services';
    $page_check = get_page_by_title($title);
        //$new_page_content = '/pages/services.php';
        $template = '/pages/services.php';
    if ( is_admin() ){
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'page_template'  => $template,
        );
        if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            update_post_meta($new_page_id, '_wp_page_template', $template);
        }
    }
}
//contact page
add_action( 'after_setup_theme', 'quick_cart_page_contact' );
function quick_cart_page_contact(){
    $title = 'contact';
    $page_check = get_page_by_title($title);
        //$new_page_content = '/pages/services.php';
        $template = '/pages/contact.php';
    if ( is_admin() ){
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'page_template'  => $template,
        );
        if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            update_post_meta($new_page_id, '_wp_page_template', $template);
        }
    }
}
//clients page
add_action( 'after_setup_theme', 'quick_cart_page_clients' );
function quick_cart_page_clients(){
    $title = 'clients';
    $page_check = get_page_by_title($title);
        //$new_page_content = '/pages/services.php';
        $template = '/pages/clients.php';
    if ( is_admin() ){
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'page_template'  => $template,
        );
        if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            update_post_meta($new_page_id, '_wp_page_template', $template);
        }
    }
}
//vendors page
add_action( 'after_setup_theme', 'quick_cart_page_vendors' );
function quick_cart_page_vendors(){
    $title = 'vendors';
    $page_check = get_page_by_title($title);
        //$new_page_content = '/pages/services.php';
        $template = '/pages/vendors.php';
    if ( is_admin() ){
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'page_template'  => $template,
        );
        if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            update_post_meta($new_page_id, '_wp_page_template', $template);
        }
    }
}
//admin page
add_action( 'after_setup_theme', 'quick_cart_page_admin' );
function quick_cart_page_admin(){
    $title = 'admin';
    $page_check = get_page_by_title($title);
        //$new_page_content = '/pages/services.php';
        $template = '/pages/admin.php';
    if ( is_admin() ){
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'page_template'  => $template,
        );
        if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            update_post_meta($new_page_id, '_wp_page_template', $template);
        }
    }
}
//admin page
add_action( 'after_setup_theme', 'quick_cart_page_news' );
function quick_cart_page_news(){
    $title = 'news';
    $page_check = get_page_by_title($title);
        //$new_page_content = '/pages/services.php';
        $template = '/pages/news.php';
    if ( is_admin() ){
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'page_template'  => $template,
        );
        if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            update_post_meta($new_page_id, '_wp_page_template', $template);
        }
    }
}
//admin page
add_action( 'after_setup_theme', 'quick_cart_page_posts' );
function quick_cart_page_posts(){
    $title = 'posts';
    $page_check = get_page_by_title($title);
        //$new_page_content = '/pages/services.php';
        $template = '/pages/posts.php';
    if ( is_admin() ){
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'page_template'  => $template,
        );
        if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            update_post_meta($new_page_id, '_wp_page_template', $template);
        }
    }
}
//admin page
add_action( 'after_setup_theme', 'quick_cart_page_tools' );
function quick_cart_page_tools(){
    $title = 'tools';
    $page_check = get_page_by_title($title);
        //$new_page_content = '/pages/services.php';
        $template = '/pages/tools/index.php';
    if ( is_admin() ){
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'page_template'  => $template,
        );
        if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            update_post_meta($new_page_id, '_wp_page_template', $template);
        }
    }
}
/******************************************************************************
 * - end pages 
 ****************************************************************************/
/******************************************************************************
 * - special customizations
 ****************************************************************************/
//replaces class .custom-logo with .logo_img
add_filter( 'get_custom_logo', 'change_logo_class' );
function change_logo_class( $html ) {
    $html = str_replace( 'custom-logo', 'logo_img', $html );
    //$html = str_replace( 'custom-logo-link', 'logo_img', $html );
    return $html;
}
/******************************************************************************
 * - end special customizations
 ****************************************************************************/
/*****************************************************************************
 * admin additions
 ****************************************************************************/

/**
 * load sales summary page
 */
function show_admin_page_summary(){
    include( __DIR__ . '/pages/admin_summary.php');
}
add_action( 'admin_menu', 'admin_menu' );
function admin_menu() {
    //comments for authors convienience (parameter descriptions in order)
    
        //@param - the title tag; it is shown in the tab title, not on screen
        //@param -  title that shows up in the menu.
        //@param -  capability required to access the menu
        //@param -  the menu slug, which is essentially used as the URL of the page
        //@param -  the function, which will handle the content of the page
        //@param -  the icon url
        //@param -  where the menu will be placed
	//add_menu_page( 'RichCo Admin', 'RichCo Admin Email', 'manage_options', 'richco_admin', 'show_admin_page_summary', 'dashicons-admin-home', 6  );

        //@param - parent_slug: Slug of the parent menu item
        //@param - page_title: The page title.
        //@param - menu_title: The submenu title displayed on dashboard.
        //@param - capability: Minimum capability to view the submenu.
        //@param - menu_slug: Unique name used as a slug for submenu item.
        //@param - function: A callback function used to display page content.
        //add_submenu_page( 'quickcart_admin', 'Quick Cart Inventory', 'Inventory', 'manage_options', 'quickcart_inventory', 'show_admin_page_inventory' ); 
        //add_submenu_page( 'quickcart_admin', 'Quick Cart Payments', 'Payments', 'manage_options', 'quickcart_payments', 'show_admin_page_payments' ); 
        //add_submenu_page( 'quickcart_admin', 'Quick Cart Reviews', 'Product Reviews', 'manage_options', 'quickcart_reviews', 'show_admin_page_reviews' ); 
        //add_submenu_page( 'quickcart_admin', 'Quick Cart Settings', 'Settings', 'manage_options', 'quickcart_settings', 'show_admin_page_settings' ); 
}
/*****************************************************************************
 * DEFAULT  BELOW
 *****************************************************************************/
if ( ! function_exists( 'richco_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function richco_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on RichCo, use a find and replace
		 * to change 'richco' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'richco', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'Header' => esc_html__( 'Header', 'richco' ),
                        'Hamburger' => esc_html__( 'Hamburger', 'richco' ),
		) );
      
		 /* Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'richco_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 315,
			'width'       => 744,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'richco_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function richco_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'richco_content_width', 640 );
}
add_action( 'after_setup_theme', 'richco_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function richco_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'richco' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'richco' ),
		//'before_widget' => '<section id="%1$s" class="widget %2$s">',
		//'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        register_widget('Richco_Widget_Recent_Posts');
}
add_action( 'widgets_init', 'richco_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function richco_scripts() {
	wp_enqueue_style( 'richco-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'richco_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*****************************************************************************
 * - helper functions
 ****************************************************************************/
/**
 * 
 * @param string $string_to_search
 * @return string the url with a ? instead of a /
 */
function replace_last_forward_slash($string_to_search){
        if($string_to_search[strlen($string_to_search)-1] === '/'){
            $string_to_search[strlen($string_to_search)-1] = '?';
        }
        return str_replace(' ', '',$string_to_search);
}
