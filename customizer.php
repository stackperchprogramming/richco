<?php
/**
 * RichCo Theme Customizer
 *
 * @package RichCo
 */
/**
 * 
 * Start main customizations
 * 
 */
require_once(__DIR__.'/../functions.php');
function is_front(){
    if(get_current_page() === 'front_page'){
        return true;
    }
    else{
        return false;
    }
}
function is_services(){
    if(get_current_page() === 'services'){
        return true;
    }
    else{
        return false;
    }
}
function is_about(){
    if(get_current_page() === 'about'){
        return true;
    }
    else{
        return false;
    }
}
function is_contact(){
    if(get_current_page() === 'contact'){
        return true;
    }
    else{
        return false;
    }
}
function is_clients(){
    if(get_current_page() === 'clients'){
        return true;
    }
    else{
        return false;
    }
}
function is_vendors(){
    if(get_current_page() === 'vendors'){
        return true;
    }
    else{
        return false;
    }
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
add_action( 'customize_preview_init', 'richco_customize_preview_js' );
function richco_customize_preview_js() {
    wp_register_script( 'richco_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery' ), '1.01', true );
    
    $translation_array = array(
       'home'   => get_template_directory_uri(),
        'is_front'=> is_front(),
        'page'=>'',
    );
    
    //add data to script
    wp_localize_script( 'richco_customizer', 'data', $translation_array );
    wp_enqueue_script( 'richco_customizer');    
}
add_action( 'wp_head', 'create_css' );
function create_css(){
    ?>
    <style type="text/css">
    </style>
    <?php
}

//customize register for the front page
add_action('customize_register', 'richco_customize_sections');
function richco_customize_sections($wp_customize){
     /**
     * add section "front page"
     */
    $wp_customize->add_section( 'richco_frontpage' , array(
        'title'      => __( 'Front Page', 'richco' ),
        'priority'   => 31,
        'active_callback' => 'is_front',
    ) );
     /**
     * add section "front page"
     */
    $wp_customize->add_section( 'richco_services' , array(
        'title'      => __( 'Services Page', 'richco' ),
        'priority'   => 32,
        'active_callback' => 'is_services',
    ) );
     /**
     * add section "front page"
     */
    $wp_customize->add_section( 'richco_about' , array(
        'title'      => __( 'About Us Page', 'richco' ),
        'priority'   => 33,
        'active_callback' => 'is_about',
    ) );
     /**
     * add section "contact page"
     */
    $wp_customize->add_section( 'richco_contact' , array(
        'title'      => __( 'Contact Us Page', 'richco' ),
        'priority'   => 34,
        'active_callback' => 'is_contact',
    ) );
     /**
     * add section "clients page"
     */
    $wp_customize->add_section( 'richco_clients' , array(
        'title'      => __( 'Clients Page', 'richco' ),
        'priority'   => 35,
        'active_callback' => 'is_clients',
    ) );
     /**
     * add section "vendors page"
     */
    $wp_customize->add_section( 'richco_vendors' , array(
        'title'      => __( 'Vendors Page', 'richco' ),
        'priority'   => 36,
        'active_callback' => 'is_vendors',
    ) );
    
}

//customize register for the front page
add_action('customize_register', 'richco_customize_vendors');
function richco_customize_vendors($wp_customize){
    //hero img
    $wp_customize->add_setting( 'vendors_hero', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/vendor-hero.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'vendors_hero', 
	array(
        'label' =>  'Hero Image',
        'section' => 'richco_vendors',
        'settings'   => 'vendors_hero',
        'priority' => '0',
    )));
    //title
    $wp_customize->add_setting( 'vendors_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Working to make a difference',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_title', 
	array(
        'label' => __('Catch Phrase', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_title',
        'type'     => 'textbox',
        'priority' => '1',
    ));
    //title
    $wp_customize->add_setting( 'vendors_subtitle', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Go further than youve ever gone before!',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_subtitle', 
	array(
        'label' => __('Section 1 quotes', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_subtitle',
        'type'     => 'textbox',
        'priority' => '1',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_section_title_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'MAKE YOUR COMPANY PART OF AN ELITE TEAM THAT INSPECTS, MAINTAINS, AND PRESERVES HOMES ACROSS THE NATION.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_section_title_1', 
	array(
        'label' => __('Section 1 title', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_section_title_1',
        'type'     => 'textbox',
        'priority' => '2',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_section_text_1_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_section_text_1_1', 
	array(
        'label' => __('Section 1 text paragraph 1', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_section_text_1_1',
        'type'     => 'textbox',
        'priority' => '3',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_section_text_2_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_section_text_2_1', 
	array(
        'label' => __('Section 1 text paragraph 2', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_section_text_2_1',
        'type'     => 'textbox',
        'priority' => '4',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_section_text_3_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_section_text_3_1', 
	array(
        'label' => __('Section 1 text paragraph 3', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_section_text_3_1',
        'type'     => 'textbox',
        'priority' => '5',
    ) );
    $wp_customize->add_setting( 'vendors_section_vid', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() .'/images/vendor-vid.mp4',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 
        'vendors_section_vid', 
        array(
        'label' => __( 'video','richco' ),
        'section' => 'richco_vendors',
        'settings'=>'vendors_section_vid',
        'mime_type' => 'video',
        'priority' => '10',
    ) ) );
    //hero img
    $wp_customize->add_setting( 'vendors_vid_poster', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/video-bg.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'vendors_vid_poster', 
	array(
        'label' =>  'Video poster',
        'section' => 'richco_vendors',
        'settings'   => 'vendors_vid_poster',
        'priority' => '11',
    )));
    
    //title
    $wp_customize->add_setting( 'vendors_signup_section_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'SIGN UP TO BECOME A VENDOR',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_signup_section_title', 
	array(
        'label' => __('Signup section title', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_signup_section_title',
        'type'     => 'textbox',
        'priority' => '13',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_signup_section_text', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Sign up now, Make your own hours and let us handle the rest!',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_signup_section_text', 
	array(
        'label' => __('Signup section text', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_signup_section_text',
        'type'     => 'textbox',
        'priority' => '14',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_signup_section_final_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'WHAT IS MORTGAGE FIELD SERVICES?',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_signup_section_final_title', 
	array(
        'label' => __('final section title', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_signup_section_final_title',
        'type'     => 'textbox',
        'priority' => '14',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_signup_section_final_title_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'INSPECTIONS',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_signup_section_final_title_1', 
	array(
        'label' => __('final section part 1 title', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_signup_section_final_title_1',
        'type'     => 'textbox',
        'priority' => '16',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_signup_section_final_text_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Property inspections identify issues and damages that threaten the value, condition and safety of properties',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_signup_section_final_text_1', 
	array(
        'label' => __('final section part 1 text', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_signup_section_final_text_1',
        'type'     => 'textbox',
        'priority' => '15',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_signup_section_final_title_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'PRESERVATION, MAINTENANCE & REPAIR',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_signup_section_final_title_2', 
	array(
        'label' => __('final section part 2 title', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_signup_section_final_title_2',
        'type'     => 'textbox',
        'priority' => '19',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_signup_section_final_text_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Protect and preserve vacant properties while keeping them maintained and secure.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_signup_section_final_text_2', 
	array(
        'label' => __('final section part 2 text', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_signup_section_final_text_2',
        'type'     => 'textbox',
        'priority' => '21',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_signup_section_final_title_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'SEASONAL MAINTENANCE',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_signup_section_final_title_3', 
	array(
        'label' => __('final section part 3 title', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_signup_section_final_title_3',
        'type'     => 'textbox',
        'priority' => '25',
    ) );
    //title
    $wp_customize->add_setting( 'vendors_signup_section_final_text_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Proper exterior maintenance improves curb appeal, maintains a safe environment, and assures compliance with local ordinances.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'vendors_signup_section_final_text_3', 
	array(
        'label' => __('final section part 3 text', 'richco'),
        'section' => 'richco_vendors',
        'settings'   => 'vendors_signup_section_final_text_3',
        'type'     => 'textbox',
        'priority' => '26',
    ) );
}
//customize register for the front page
add_action('customize_register', 'richco_customize_clients');
function richco_customize_clients($wp_customize){
    //hero img
    $wp_customize->add_setting( 'client_hero', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/clients-hero.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'client_hero', 
	array(
        'label' =>  'Hero Image',
        'section' => 'richco_clients',
        'settings'   => 'client_hero',
        'priority' => '0',
    )));
    //title
    $wp_customize->add_setting( 'client_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Clients',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'client_title', 
	array(
        'label' => __('Title', 'richco'),
        'section' => 'richco_clients',
        'settings'   => 'client_title',
        'type'     => 'textbox',
        'priority' => '1',
    ));
    //title
    $wp_customize->add_setting( 'client_subtitle', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Always Improving',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'client_subtitle', 
	array(
        'label' => __('Subtitle', 'richco'),
        'section' => 'richco_clients',
        'settings'   => 'client_subtitle',
        'type'     => 'textbox',
        'priority' => '2',
    ));
    //bullet point 1
    $wp_customize->add_setting( 'client_bullet_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Client Satisfaction',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'client_bullet_1', 
	array(
        'label' => __('Bullet point 1', 'richco'),
        'section' => 'richco_clients',
        'settings'   => 'client_bullet_1',
        'type'     => 'textbox',
        'priority' => '3',
    ));
    //bullet point 2
    $wp_customize->add_setting( 'client_bullet__text_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Our client portal offers easy solutions to even the most convoluted of projects. Easily upload large job requests and contact us instantly without ever leaving your desk.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'client_bullet__text_1', 
	array(
        'label' => __('Bullet point 1 text', 'richco'),
        'section' => 'richco_clients',
        'settings'   => 'client_bullet__text_1',
        'type'     => 'textbox',
        'priority' => '5',
    ));
    //bullet point 2
    $wp_customize->add_setting( 'client_bullet_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Property Experts',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'client_bullet_2', 
	array(
        'label' => __('Bullet point 2', 'richco'),
        'section' => 'richco_clients',
        'settings'   => 'client_bullet_2',
        'type'     => 'textbox',
        'priority' => '6',
    ));
    //bullet point 2
    $wp_customize->add_setting( 'client_bullet__text_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'With over 20 years of experience in property management, we offer our clients the most comprehensive coverage and the fastest results guaranteed so you can focus on marketing your property in the least amount of time possible.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'client_bullet__text_2', 
	array(
        'label' => __('Bullet point 2 text', 'richco'),
        'section' => 'richco_clients',
        'settings'   => 'client_bullet__text_2',
        'type'     => 'textbox',
        'priority' => '7',
    ));
    
    
    
    //hero img
    $wp_customize->add_setting( 'clients_slideshow_img_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/slideshow-1.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'clients_slideshow_img_1', 
	array(
        'label' =>  'Slideshow Image 1',
        'section' => 'richco_clients',
        'settings'   => 'clients_slideshow_img_1',
        'priority' => '20',
    )));
    
    
    
    //hero img
    $wp_customize->add_setting( 'clients_slideshow_img_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/slideshow-2.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'clients_slideshow_img_2', 
	array(
        'label' =>  'Slideshow Image 2',
        'section' => 'richco_clients',
        'settings'   => 'clients_slideshow_img_2',
        'priority' => '21',
    )));
    
    //img
    $wp_customize->add_setting( 'clients_slideshow_img_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/slideshow-3.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'clients_slideshow_img_3', 
	array(
        'label' =>  'Slideshow Image 3',
        'section' => 'richco_clients',
        'settings'   => 'clients_slideshow_img_3',
        'priority' => '22',
    )));
    
    
    $wp_customize->add_setting( 'client_slideshow_overlay_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Over 2 Decades',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'client_slideshow_overlay_title', 
	array(
        'label' => __('Slideshow overlay title', 'richco'),
        'section' => 'richco_clients',
        'settings'   => 'client_slideshow_overlay_title',
        'type'     => 'textbox',
        'priority' => '25',
    ));
    
    
    $wp_customize->add_setting( 'client_slideshow_overlay_text', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'For over 2 decades weve seen every type of blighted property you can imagine. We get your property back to marketable condition faster than any other company on the coast and keep it that way. From Yard maintenance to Complete remodeling, theres nothing we havent seen and nothing we cant handle.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'client_slideshow_overlay_text', 
	array(
        'label' => __('Slideshow overlay text', 'richco'),
        'section' => 'richco_clients',
        'settings'   => 'client_slideshow_overlay_text',
        'type'     => 'textbox',
        'priority' => '26',
    ));
    
    
    $wp_customize->add_setting( 'client_signup_text', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Need access to our clients portal? Fill out this request form and well shoot you over your login information right away!',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'client_signup_text', 
	array(
        'label' => __('Slideshow overlay text', 'richco'),
        'section' => 'richco_clients',
        'settings'   => 'client_signup_text',
        'type'     => 'textbox',
        'priority' => '27',
    ));
    $wp_customize->add_setting( 'client_signup_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Client Portal',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'client_signup_title', 
	array(
        'label' => __('Slideshow overlay text', 'richco'),
        'section' => 'richco_clients',
        'settings'   => 'client_signup_title',
        'type'     => 'textbox',
        'priority' => '26.5',
    ));
    //Client_Portal
}
//customize register for the front page
add_action('customize_register', 'richco_customize_contact');
function richco_customize_contact($wp_customize){
    //hero img
    $wp_customize->add_setting( 'contact_hero', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/contact.png",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'contact_hero', 
	array(
        'label' =>  'Hero Image',
        'section' => 'richco_contact',
        'settings'   => 'contact_hero',
        'priority' => '0',
    )));
    //title
    $wp_customize->add_setting( 'contact_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Contact Us',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'contact_title', 
	array(
        'label' => __('Title', 'richco'),
        'section' => 'richco_contact',
        'settings'   => 'contact_title',
        'type'     => 'textbox',
        'priority' => '1',
    ));
    //subtitle
    $wp_customize->add_setting( 'contact_subtitle', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Available 24 hours a day.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'contact_subtitle', 
	array(
        'label' => __('Subtitle', 'richco'),
        'section' => 'richco_contact',
        'settings'   => 'contact_subtitle',
        'type'     => 'textbox',
        'priority' => '2',
    ));
    //hero img
    $wp_customize->add_setting( 'contact_picture', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/contact-side.png",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'contact_picture', 
	array(
        'label' =>  'section 2 Image',
        'section' => 'richco_contact',
        'settings'   => 'contact_picture',
        'priority' => '2.5',
    )));
    //bus name
    $wp_customize->add_setting( 'contact_bus_name', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'RichCo Property Solutions',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'contact_bus_name', 
	array(
        'label' => __('Contact Form business name', 'richco'),
        'section' => 'richco_contact',
        'settings'   => 'contact_bus_name',
        'type'     => 'textbox',
        'priority' => '3',
    ));
    //bus name
    $wp_customize->add_setting( 'contact_address', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Pass Christian, MS',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'contact_address', 
	array(
        'label' => __('Address', 'richco'),
        'section' => 'richco_contact',
        'settings'   => 'contact_address',
        'type'     => 'textbox',
        'priority' => '4',
    ));
    //bus name
    $wp_customize->add_setting( 'contact_phone', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Phone: 512-793-6714',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'contact_phone', 
	array(
        'label' => __('phone number', 'richco'),
        'section' => 'richco_contact',
        'settings'   => 'contact_phone',
        'type'     => 'textbox',
        'priority' => '5',
    ));
    //bus name
    $wp_customize->add_setting( 'contact_message_form_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Get In Touch',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'contact_message_form_title', 
	array(
        'label' => __('Message form title', 'richco'),
        'section' => 'richco_contact',
        'settings'   => 'contact_message_form_title',
        'type'     => 'textbox',
        'priority' => '6',
    ));
    
}
//customize register for the front page
add_action('customize_register', 'richco_customize_about');
function richco_customize_about($wp_customize){
    //hero img
    $wp_customize->add_setting( 'about_hero', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/about.png",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'about_hero', 
	array(
        'label' =>  'Hero Image',
        'section' => 'richco_about',
        'settings'   => 'about_hero',
        'priority' => '0',
    )));
    //title
    $wp_customize->add_setting( 'about_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'About Us',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_title', 
	array(
        'label' => __('Title', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_title',
        'type'     => 'textbox',
        'priority' => '1',
    ));
    //hero img
    $wp_customize->add_setting( 'about_img_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/happy.png",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'about_img_1', 
	array(
        'label' =>  'Section 1 Image',
        'section' => 'richco_about',
        'settings'   => 'about_img_1',
        'priority' => '2',
    )));
    // section 1 title
    $wp_customize->add_setting( 'about_title_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Synergy',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_title_1', 
	array(
        'label' => __('section 1 title', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_title_1',
        'type'     => 'textbox',
        'priority' => '2.1',
    ));
    //section 1 text
    $wp_customize->add_setting( 'about_text_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_text_1', 
	array(
        'label' => __('section 1 text', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_text_1',
        'type'     => 'textbox',
        'priority' => '2.2',
    ));
    
    
    
    
    
    
    
    
    //hero img
    $wp_customize->add_setting( 'about_img_1_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/happy.png",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'about_img_1_2', 
	array(
        'label' =>  'Section 2 Image',
        'section' => 'richco_about',
        'settings'   => 'about_img_1_2',
        'priority' => '2.3',
    )));
    // section 1 title
    $wp_customize->add_setting( 'about_title_1_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Innovation',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_title_1_2', 
	array(
        'label' => __('section 2 title', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_title_1_2',
        'type'     => 'textbox',
        'priority' => '2.4',
    ));
    //section 1 text
    $wp_customize->add_setting( 'about_text_1_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_text_1_2', 
	array(
        'label' => __('section 2 text', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_text_1_2',
        'type'     => 'textbox',
        'priority' => '2.5',
    ));
    
    
    
    
    
    
    
    
    //hero img
    $wp_customize->add_setting( 'about_img_1_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/happy.png",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'about_img_1_3', 
	array(
        'label' =>  'Section 3 Image',
        'section' => 'richco_about',
        'settings'   => 'about_img_1_3',
        'priority' => '2.6',
    )));
    // section 1 title
    $wp_customize->add_setting( 'about_title_1_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Commitment',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_title_1_3', 
	array(
        'label' => __('section 3 title', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_title_1_3',
        'type'     => 'textbox',
        'priority' => '3',
    ));
    //section 1 text
    $wp_customize->add_setting( 'about_text_1_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_text_1_3', 
	array(
        'label' => __('section 3 text', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_text_1_3',
        'type'     => 'textbox',
        'priority' => '3.5',
    ));
    
    
    
    
    
    
    
    
    
    //section 2 img
    $wp_customize->add_setting( 'about_img_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/accordion.png",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'about_img_2', 
	array(
        'label' =>  'Section 2 Image',
        'section' => 'richco_about',
        'settings'   => 'about_img_2',
        'priority' => '10',
    )));
    //section 2 title
    $wp_customize->add_setting( 'about_title_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Frequently asked Questions',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_title_2', 
	array(
        'label' => __('section 2 title', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_title_2',
        'type'     => 'textbox',
        'priority' => '21',
    ));
    //section 2 accordion question 1
    $wp_customize->add_setting( 'about_accordian_question_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Adieus who direct esteem. It esteems?',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_accordian_question_1', 
	array(
        'label' => __('section 2 accordion question 1', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_accordian_question_1',
        'type'     => 'textbox',
        'priority' => '22',
    ));
    //section 2 accordion answer 1
    $wp_customize->add_setting( 'about_accordian_answer_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_accordian_answer_1', 
	array(
        'label' => __('section 2 accordion answer 1', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_accordian_answer_1',
        'type'     => 'textbox',
        'priority' => '23',
    ));
    //section 2 accordion question 2
    $wp_customize->add_setting( 'about_accordian_question_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Adieus who direct esteem. It esteems?',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_accordian_question_2', 
	array(
        'label' => __('section 2 accordion question 2', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_accordian_question_2',
        'type'     => 'textbox',
        'priority' => '25',
    ));
    //section 2 accordion answer 2
    $wp_customize->add_setting( 'about_accordian_answer_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_accordian_answer_2', 
	array(
        'label' => __('section 2 accordion answer 2', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_accordian_answer_2',
        'type'     => 'textbox',
        'priority' => '26',
    ));
    //section 2 accordion question 3
    $wp_customize->add_setting( 'about_accordian_question_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Adieus who direct esteem. It esteems?',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_accordian_question_3', 
	array(
        'label' => __('section 2 accordion question 3', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_accordian_question_3',
        'type'     => 'textbox',
        'priority' => '28',
    ));
    //section 2 accordion answer 2
    $wp_customize->add_setting( 'about_accordian_answer_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_accordian_answer_3', 
	array(
        'label' => __('section 2 accordion answer 3', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_accordian_answer_3',
        'type'     => 'textbox',
        'priority' => '29',
    ));
    //section 3 img
    $wp_customize->add_setting( 'about_img_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/vendors01.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'about_img_3', 
	array(
        'label' =>  'Section 3 background Image',
        'section' => 'richco_about',
        'settings'   => 'about_img_3',
        'priority' => '30',
    )));
    //section 3 text
    $wp_customize->add_setting( 'about_title_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Call today for a free in-person evaluation!',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_title_3', 
	array(
        'label' => __('section 2 accordion answer 3', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_title_3',
        'type'     => 'textbox',
        'priority' => '31',
    ));
    //section 3 text
    $wp_customize->add_setting( 'about_phone', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => '512-793-6714',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_phone', 
	array(
        'label' => __('section 3 phone number', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_phone',
        'type'     => 'textbox',
        'priority' => '32',
    ));
    //about_btn_text
    $wp_customize->add_setting( 'about_btn_text', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Contact Us',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'about_btn_text', 
	array(
        'label' => __('section 3 Button text', 'richco'),
        'section' => 'richco_about',
            //'active_callback' => 'is_front',
        'settings'   => 'about_btn_text',
        'type'     => 'textbox',
        'priority' => '33',
    ));
}
//customize register for the front page
add_action('customize_register', 'richco_customize_services');
function richco_customize_services($wp_customize){
    //hero img
    $wp_customize->add_setting( 'services_hero', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/hero.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'services_hero', 
	array(
        'label' =>  'Hero Image',
        'section' => 'richco_services',
        'settings'   => 'services_hero',
        'priority' => '0',
    )));
    //title
    $wp_customize->add_setting( 'services_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Services',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_title', 
	array(
        'label' => __('Title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_title',
        'type'     => 'textbox',
        'priority' => '1',
    ));
    //title
    $wp_customize->add_setting( 'services_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Services',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_title', 
	array(
        'label' => __('Title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_title',
        'type'     => 'textbox',
        'priority' => '1',
    ));
    //intro title
    $wp_customize->add_setting( 'services_intro_phrase', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'RichCo leads the industry in managing a full scope of mortgage field services on vacant, defaulted, and foreclosed properties.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_intro_phrase', 
	array(
        'label' => __('Intro phrase', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_intro_phrase',
        'type'     => 'textbox',
        'priority' => '2',
    ));
    
    /**
     * section 1
     */
    $wp_customize->add_setting( 'services_section_title_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Inspections',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_title_1', 
	array(
        'label' => __('Section 1 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_title_1',
        'type'     => 'textbox',
        'priority' => '3.9',
    ));
    $wp_customize->add_setting( 'services_section_image_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/inspections.gif",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'services_section_image_1', 
	array(
        'label' =>  'Section 1 Image',
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_image_1',
        'priority' => '3.5',
    )));
    $wp_customize->add_setting( 'services_section_subtitle_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Property Inspections',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_subtitle_1', 
	array(
        'label' => __('Section 1 subtitle', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_subtitle_1',
        'type'     => 'textbox',
        'priority' => '4',
    ));
    $wp_customize->add_setting( 'services_section_intro_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Timely and accurate reporting of the condition and occupancy status of a property.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_intro_1', 
	array(
        'label' => __('Section 1 intro phrase', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_intro_1',
        'type'     => 'textbox',
        'priority' => '4.5',
    ));
    /*
    $wp_customize->add_setting( 'services_section_dropdown_1_title_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Exterior Inspections',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_title_1', 
	array(
        'label' => __('Section 1 accordian 1 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_title_1',
        'type'     => 'textbox',
        'priority' => '5',
    ));
    /*
    $wp_customize->add_setting( 'services_section_dropdown_1_answer_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Our inspectors verify the occupancy status, in addition to providing a detailed description of the exterior condition of the property.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_answer_1', 
	array(
        'label' => __('Section 1 accordian 1 answer', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_answer_1',
        'type'     => 'textbox',
        'priority' => '6',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_title_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Interior Inspections',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_title_2', 
	array(
        'label' => __('Section 1 accordian 2 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_title_2',
        'type'     => 'textbox',
        'priority' => '7',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_answer_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Interior inspections reduce the severity and cost of damages hidden inside a property, like mold, water intrusion and pest infestations.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_answer_2', 
	array(
        'label' => __('Section 1 accordian 2 answer', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_answer_2',
        'type'     => 'textbox',
        'priority' => '8',
    ));
    
    
    $wp_customize->add_setting( 'services_section_dropdown_1_title_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Interior Inspections',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_title_2', 
	array(
        'label' => __('Section 1 accordian 2 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_title_2',
        'type'     => 'textbox',
        'priority' => '7',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_answer_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Interior inspections reduce the severity and cost of damages hidden inside a property, like mold, water intrusion and pest infestations.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_answer_2', 
	array(
        'label' => __('Section 1 accordian 2 answer', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_answer_2',
        'type'     => 'textbox',
        'priority' => '8',
    ));
    
    
    $wp_customize->add_setting( 'services_section_dropdown_1_title_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Interior Inspections',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_title_2', 
	array(
        'label' => __('Section 1 accordian 2 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_title_2',
        'type'     => 'textbox',
        'priority' => '7',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_answer_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Interior inspections reduce the severity and cost of damages hidden inside a property, like mold, water intrusion and pest infestations.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_answer_2', 
	array(
        'label' => __('Section 1 accordian 2 answer', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_answer_2',
        'type'     => 'textbox',
        'priority' => '8',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_title_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Insurance Loss Inspection',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_title_3', 
	array(
        'label' => __('Section 1 accordian 3 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_title_3',
        'type'     => 'textbox',
        'priority' => '9',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_answer_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Inspectors verify to an insurance company that repairs and rehab work are successfully completed prior to the release of insurance funds.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_answer_3', 
	array(
        'label' => __('Section 1 accordian 3 answer', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_answer_3',
        'type'     => 'textbox',
        'priority' => '10',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_title_4', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Contact Attempt Inspection',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_title_4', 
	array(
        'label' => __('Section 1 accordian 3 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_title_4',
        'type'     => 'textbox',
        'priority' => '11',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_answer_4', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Inspectors attempt to provide contact information to delinquent borrowers on behalf of mortgage servicers and lenders.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_answer_4', 
	array(
        'label' => __('Section 1 accordian 2 answer', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_answer_4',
        'type'     => 'textbox',
        'priority' => '12',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_title_5', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'FEMA Inspections',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_title_5', 
	array(
        'label' => __('Section 1 accordian 5 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_title_5',
        'type'     => 'textbox',
        'priority' => '13',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_answer_5', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'After a disaster, inspections are performed to assess damages on all types of properties – occupied or vacant, current or delinquent loans.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_answer_5', 
	array(
        'label' => __('Section 1 accordian 5 answer', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_answer_5',
        'type'     => 'textbox',
        'priority' => '14',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_title_6', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Broker Check Inspections',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_title_6', 
	array(
        'label' => __('Section 1 accordian 6 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_title_6',
        'type'     => 'textbox',
        'priority' => '7',
    ));
    $wp_customize->add_setting( 'services_section_dropdown_1_answer_6', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'When properties are for sale, inspectors report on the effectiveness of the broker’s efforts to market the property and verify its condition.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_dropdown_1_answer_6', 
	array(
        'label' => __('Section 1 accordian 6 answer', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_dropdown_1_title_6',
        'type'     => 'textbox',
        'priority' => '15',
    ));
    
    /**
     * section 2
     */
    $wp_customize->add_setting( 'services_section_image_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/images/preservation.gif',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'services_section_image_2', 
	array(
        'label' =>  'Section 2 Image',
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_image_2',
        'priority' => '20',
    )));
    $wp_customize->add_setting( 'services_section_title_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Protection',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_title_2', 
	array(
        'label' => __('Section 2 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_title_2',
        'type'     => 'textbox',
        'priority' => '21',
    ));
    $wp_customize->add_setting( 'services_section_subtitle_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Property Preservation',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_subtitle_2', 
	array(
        'label' => __('Section 1 accordian 6 answer', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_subtitle_2',
        'type'     => 'textbox',
        'priority' => '22',
    ));
    $wp_customize->add_setting( 'services_section_intro_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Keeping vacant properties secure, safe, and well-maintained.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_intro_2', 
	array(
        'label' => __('Section 1 accordian 6 answer', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_intro_2',
        'type'     => 'textbox',
        'priority' => '23',
    ));
    
    /**
     * section 3
     */
    $wp_customize->add_setting( 'services_section_image_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/images/maintenance.gif',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'services_section_image_3', 
	array(
        'label' =>  'Section 3 Image',
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_image_3',
        'priority' => '30',
    )));
    $wp_customize->add_setting( 'services_section_title_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Real Estate Maintenance',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_title_3', 
	array(
        'label' => __('Section 3 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_title_3',
        'type'     => 'textbox',
        'priority' => '31',
    ));
    $wp_customize->add_setting( 'services_section_subtitle_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Maintaining Value',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_subtitle_3', 
	array(
        'label' => __('Section 3 subtitle', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_subtitle_3',
        'type'     => 'textbox',
        'priority' => '32',
    ));
    $wp_customize->add_setting( 'services_section_intro_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Maintaining the real estate assets of our clients to protect value and improve marketability.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_intro_3', 
	array(
        'label' => __('Section 3 intro', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_intro_3',
        'type'     => 'textbox',
        'priority' => '33',
    ));
    
    
    
    /**
     * section 4
     */
    $wp_customize->add_setting( 'services_section_image_4', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/images/landscaping.gif',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'services_section_image_4', 
	array(
        'label' =>  'Section 4 Image',
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_image_4',
        'priority' => '40',
    )));
    $wp_customize->add_setting( 'services_section_title_4', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Landscaping',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_title_4', 
	array(
        'label' => __('Section 4 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_title_4',
        'type'     => 'textbox',
        'priority' => '41',
    ));
    $wp_customize->add_setting( 'services_section_subtitle_4', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Maintaining Value',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_subtitle_4', 
	array(
        'label' => __('Section 4 subtitle', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_subtitle_4',
        'type'     => 'textbox',
        'priority' => '42',
    ));
    $wp_customize->add_setting( 'services_section_intro_4', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Improving curb appeal, safety, and compliance with yard maintenance and flood prevention.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_intro_4', 
	array(
        'label' => __('Section 4 intro', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_intro_4',
        'type'     => 'textbox',
        'priority' => '43',
    ));
    
    
    
    
    /**
     * section 4
     */
    $wp_customize->add_setting( 'services_section_image_5', array(
        'type' => 'theme_mod', // or 'opservices_section_image_5tion'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/images/fha.gif',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'services_section_image_5', 
	array(
        'label' =>  'Section 5 Image',
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_image_5',
        'priority' => '50',
    )));
    $wp_customize->add_setting( 'services_section_title_5', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'FHA Conveyance',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_title_5', 
	array(
        'label' => __('Section 5 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_title_5',
        'type'     => 'textbox',
        'priority' => '51',
    ));
    $wp_customize->add_setting( 'services_section_subtitle_5', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Reconveyance Prevention',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_subtitle_5', 
	array(
        'label' => __('Section 5 subtitle', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_subtitle_5',
        'type'     => 'textbox',
        'priority' => '52',
    ));
    $wp_customize->add_setting( 'services_section_intro_5', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Properly managing the FHA post-sale process to avoid reconveyances.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_intro_5', 
	array(
        'label' => __('Section 5 intro', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_intro_5',
        'type'     => 'textbox',
        'priority' => '53',
    ));
    
    
    
    
    /**
     * section 6
     */
    $wp_customize->add_setting( 'services_section_image_6', array(
        'type' => 'theme_mod', // or 'opservices_section_image_5tion'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/images/vacant.gif',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'services_section_image_6', 
	array(
        'label' =>  'Section 6 Image',
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_image_6',
        'priority' => '60',
    )));
    $wp_customize->add_setting( 'services_section_title_6', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Property Registration',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_title_6', 
	array(
        'label' => __('Section 6 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_title_6',
        'type'     => 'textbox',
        'priority' => '61',
    ));
    $wp_customize->add_setting( 'services_section_subtitle_6', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Vacancy Registration',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_subtitle_6', 
	array(
        'label' => __('Section 6 subtitle', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_subtitle_6',
        'type'     => 'textbox',
        'priority' => '62',
    ));
    $wp_customize->add_setting( 'services_section_intro_6', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Staying ahead of local property registrations nationwide to ensure client compliance.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_intro_6', 
	array(
        'label' => __('Section 6 intro', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_intro_6',
        'type'     => 'textbox',
        'priority' => '63',
    ));
    
    
    
    
    /**
     * section 7
     */
    $wp_customize->add_setting( 'services_section_image_7', array(
        'type' => 'theme_mod', // or 'opservices_section_image_5tion'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/images/est.gif',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'services_section_image_7', 
	array(
        'label' =>  'Section 7 Image',
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_image_7',
        'priority' => '70',
    )));
    $wp_customize->add_setting( 'services_section_title_7', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Estimates & Repairs',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_title_7', 
	array(
        'label' => __('Section 7 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_title_7',
        'type'     => 'textbox',
        'priority' => '71',
    ));
    $wp_customize->add_setting( 'services_section_subtitle_7', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Retaining Value',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_subtitle_7', 
	array(
        'label' => __('Section 5 subtitle', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_subtitle_7',
        'type'     => 'textbox',
        'priority' => '72',
    ));
    $wp_customize->add_setting( 'services_section_intro_7', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Stepping in when the worst-case scenario of damage to a property becomes a reality.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_intro_7', 
	array(
        'label' => __('Section 7 intro', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_intro_7',
        'type'     => 'textbox',
        'priority' => '73',
    ));
    
    
    
    
    /**
     * section 8
     */
    $wp_customize->add_setting( 'services_section_image_8', array(
        'type' => 'theme_mod', // or 'opservices_section_image_5tion'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/images/party.gif',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'services_section_image_8', 
	array(
        'label' =>  'Section 8 Image',
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_image_8',
        'priority' => '80',
    )));
    $wp_customize->add_setting( 'services_section_title_8', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'High Risk Code Enforcement',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_title_8', 
	array(
        'label' => __('Section 8 title', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_title_8',
        'type'     => 'textbox',
        'priority' => '81',
    ));
    $wp_customize->add_setting( 'services_section_subtitle_8', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Code Enforcement',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_subtitle_8', 
	array(
        'label' => __('Section 8 subtitle', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_subtitle_8',
        'type'     => 'textbox',
        'priority' => '82',
    ));
    $wp_customize->add_setting( 'services_section_intro_8', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Preventing code compliance issues while maintaining communication with local officials.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'services_section_intro_8', 
	array(
        'label' => __('Section 8 intro', 'richco'),
        'section' => 'richco_services',
            //'active_callback' => 'is_front',
        'settings'   => 'services_section_intro_8',
        'type'     => 'textbox',
        'priority' => '83',
    ));
    
    
}
//customize register for the front page
add_action('customize_register', 'richco_customize_frontpage');
function richco_customize_frontpage($wp_customize){
    /**
     * settings/controls for for page
     */
    //hero img
    $wp_customize->add_setting( 'front_page_hero', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/hero.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'front_page_hero', 
	array(
        'label' =>  'Hero Image',
        'section' => 'richco_frontpage',
        'settings'   => 'front_page_hero',
        'priority' => '0',
    )));
    //title
    $wp_customize->add_setting( 'front_page_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Mortgage Field <br> Services',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_title', 
	array(
        'label' => __('Title', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_title',
        'type'     => 'textbox',
        'priority' => '1',
    ));
    
    //subtitle
    $wp_customize->add_setting( 'front_page_subtitle', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Setting a New Standard of Excellence',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_subtitle', 
	array(
        'label' => __('SubTitle', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_subtitle',
        'type'     => 'textbox',
        'priority' => '2',
    ));
    
    //hero btn
    $wp_customize->add_setting( 'front_page_btntitle', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Request Services',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_btntitle', 
	array(
        'label' => __('Hero Btn Text', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_btntitle',
        'type'     => 'textbox',
        'priority' => '3',
    ));
    
     /**
     * card 1
     */
    //title
    $wp_customize->add_setting( 'inspection_card_image_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/inspect.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'inspection_card_image_1', 
	array(
        'label' =>  'Inpection Card 1 Image',
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'inspection_card_image_1',
        'priority' => '4',
    )));
    $wp_customize->add_setting( 'front_page_inspect_card_title_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Property Inspections',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_title_1', 
	array(
        'label' => __('Inpection Card 1 Title', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_title_1',
        'type'     => 'textbox',
        'priority' => '5',
    ));
    //card - inspections
    $wp_customize->add_setting( 'front_page_inspect_card_subtitle_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'On Time. Every Time.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_subtitle_1', 
	array(
        'label' => __('Inpection Card subtitle 1', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_subtitle_1',
        'type'     => 'textbox',
        'priority' => '6',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_desc_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Timely and accurate reporting of the condition and occupancy status of a property.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_desc_1', 
	array(
        'label' => __('Inpection Card Description 1', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_desc_1',
        'type'     => 'textbox',
        'priority' => '7',
    ));
    
     /**
     * card 2
     */
    //title
    $wp_customize->add_setting( 'inspection_card_image_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/preservation.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'inspection_card_image_2', 
	array(
        'label' =>  'Inpection Card 2 Image',
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'inspection_card_image_2',
        'priority' => '10',
    )));
    $wp_customize->add_setting( 'front_page_inspect_card_title_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Property Preservation',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_title_2', 
	array(
        'label' => __('Inpection Card 2 Title', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_title_2',
        'type'     => 'textbox',
        'priority' => '11',
    ));
    //card - inspections
    $wp_customize->add_setting( 'front_page_inspect_card_subtitle_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Industry Leading Experts.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_subtitle_2', 
	array(
        'label' => __('Inpection Card subtitle 2', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_subtitle_2',
        'type'     => 'textbox',
        'priority' => '12',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_desc_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Keeping vacant properties secure, safe, and well-maintained.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_desc_2', 
	array(
        'label' => __('Inpection Card Description', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_desc_2',
        'type'     => 'textbox',
        'priority' => '13',
    ));
    
     /**
     * card 3
     */
    //title
    $wp_customize->add_setting( 'inspection_card_image_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/maintenance.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'inspection_card_image_3', 
	array(
        'label' =>  'Inpection Card 3 Image',
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'inspection_card_image_3',
        'priority' => '30',
    )));
    $wp_customize->add_setting( 'front_page_inspect_card_title_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Property Maintenance',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_title_3', 
	array(
        'label' => __('Inpection Card 3 Title', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_title_3',
        'type'     => 'textbox',
        'priority' => '31',
    ));
    //card - inspections
    $wp_customize->add_setting( 'front_page_inspect_card_subtitle_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'We Guarantee Clients Satisfaction.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_subtitle_3', 
	array(
        'label' => __('Inpection Card subtitle 3', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_subtitle_3',
        'type'     => 'textbox',
        'priority' => '32',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_desc_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Maintaining the real estate assets of our clients to protect value and improve marketability.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_desc_3', 
	array(
        'label' => __('Inpection Card Description', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_desc_3',
        'type'     => 'textbox',
        'priority' => '33',
    ));
    
     /**
     * card 4
     */
    //title
    $wp_customize->add_setting( 'inspection_card_image_4', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/reo.jpeg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'inspection_card_image_4', 
	array(
        'label' =>  'Inpection Card 4 Image',
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'inspection_card_image_4',
        'priority' => '40',
    )));
    $wp_customize->add_setting( 'front_page_inspect_card_title_4', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'REO',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_title_4', 
	array(
        'label' => __('Inpection Card 4 Title', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_title_4',
        'type'     => 'textbox',
        'priority' => '41',
    ));
    //card - inspections
    $wp_customize->add_setting( 'front_page_inspect_card_subtitle_4', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Secure and Marketable.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_subtitle_4', 
	array(
        'label' => __('Inpection Card subtitle 4', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_subtitle_4',
        'type'     => 'textbox',
        'priority' => '42',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_desc_4', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'When a property moves to REO, the focus shifts from simply protecting and maintaining it, to marketing and selling the property as quickly as possible.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_desc_4', 
	array(
        'label' => __('Inpection Card Description 4', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_desc_4',
        'type'     => 'textbox',
        'priority' => '43',
    ));
    
     /**
     * card 5
     */
    //title
    $wp_customize->add_setting( 'inspection_card_image_5', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/landscaping.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'inspection_card_image_5', 
	array(
        'label' =>  'Inpection Card 5 Image',
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'inspection_card_image_5',
        'priority' => '50',
    )));
    $wp_customize->add_setting( 'front_page_inspect_card_subtitle_5', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Preserving curb appeal.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_subtitle_5', 
	array(
        'label' => __('Inpection Card subtitle 5', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_subtitle_5',
        'type'     => 'textbox',
        'priority' => '52',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_title_5', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Landscaping',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_title_5', 
	array(
        'label' => __('Inpection Card 5 Title', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_title_5',
        'type'     => 'textbox',
        'priority' => '51',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_desc_5', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'When a property moves to REO, the focus shifts from simply protecting and maintaining it, to marketing and selling the property as quickly as possible.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_desc_5', 
	array(
        'label' => __('Inpection Card Description 5', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_desc_5',
        'type'     => 'textbox',
        'priority' => '43',
    ));
    
     /**
     * card 6
     */
    //title
    $wp_customize->add_setting( 'inspection_card_image_6', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/fha.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'inspection_card_image_6', 
	array(
        'label' =>  'Inpection Card 6 Image',
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'inspection_card_image_6',
        'priority' => '60',
    )));
    $wp_customize->add_setting( 'front_page_inspect_card_subtitle_6', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => '20 Years Experience.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_subtitle_6', 
	array(
        'label' => __('Inpection Card subtitle 6', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_subtitle_6',
        'type'     => 'textbox',
        'priority' => '62',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_title_6', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'FHA Conveyance',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_title_6', 
	array(
        'label' => __('Inpection Card 6 Title', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_title_6',
        'type'     => 'textbox',
        'priority' => '61',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_desc_6', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Properly managing the FHA post-sale process to avoid reconveyances.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_desc_6', 
	array(
        'label' => __('Inpection Card Description 6', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_desc_6',
        'type'     => 'textbox',
        'priority' => '63',
    ));
    
     /**
     * card 7
     */
    //title
    $wp_customize->add_setting( 'inspection_card_image_7', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/reg.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'inspection_card_image_7', 
	array(
        'label' =>  'Inpection Card 7 Image',
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'inspection_card_image_7',
        'priority' => '70',
    )));
    $wp_customize->add_setting( 'front_page_inspect_card_subtitle_7', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Field Management For The 21st Century.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_subtitle_7', 
	array(
        'label' => __('Inpection Card subtitle 7', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_subtitle_7',
        'type'     => 'textbox',
        'priority' => '72',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_title_7', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Property Registration',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_title_7', 
	array(
        'label' => __('Inpection Card 7 Title', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_title_7',
        'type'     => 'textbox',
        'priority' => '71',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_desc_7', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Staying ahead of local property registrations nationwide to ensure client compliance.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_desc_7',
	array(
        'label' => __('Inpection Card Description 7', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_desc_7',
        'type'     => 'textbox',
        'priority' => '73',
    ));
    
     /**
     * card 8
     */
    //title
    $wp_customize->add_setting( 'inspection_card_image_8', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri()."/images/repairs.jpg",
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'inspection_card_image_8', 
	array(
        'label' =>  'Inpection Card 8 Image',
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'inspection_card_image_8',
        'priority' => '80',
    )));
    $wp_customize->add_setting( 'front_page_inspect_card_subtitle_8', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Setting The Standard.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_subtitle_8', 
	array(
        'label' => __('Inpection Card subtitle 8', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_subtitle_8',
        'type'     => 'textbox',
        'priority' => '82',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_title_8', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Estimates &amp; Repairs',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_title_8', 
	array(
        'label' => __('Inpection Card 5 Title', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_title_8',
        'type'     => 'textbox',
        'priority' => '81',
    ));
    $wp_customize->add_setting( 'front_page_inspect_card_desc_8', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Stepping in when the worst-case scenario of damage to a property becomes a reality.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_inspect_card_desc_8', 
	array(
        'label' => __('Inpection Card Description 8', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_inspect_card_desc_8',
        'type'     => 'textbox',
        'priority' => '83',
    ));
    
    
    $wp_customize->add_setting( 'front_page_vendor_phrase', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Join our elite vendor network.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_vendor_phrase', 
	array(
        'label' => __('Inpection Card Description 8', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_vendor_phrase',
        'type'     => 'textbox',
        'priority' => '85',
    ));
    
    
    $wp_customize->add_setting( 'front_page_posts_title', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Industry Alerts',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'front_page_posts_title', 
	array(
        'label' => __('Final section posts spinner title', 'richco'),
        'section' => 'richco_frontpage',
            //'active_callback' => 'is_front',
        'settings'   => 'front_page_posts_title',
        'type'     => 'textbox',
        'priority' => '86',
    ));
}

//customize register for the front page
add_action('customize_register', 'richco_customize_footer');
function richco_customize_footer($wp_customize){
     /**
     * add section "front page"
     */
    $wp_customize->add_section( 'richco_footer' , array(
        'title'      => __( 'Footer', 'richco' ),
        'priority'   => 33,
        //'active_callback' => 'is_front',
    ) );
    
    /**
     * settings/controls for for page
     */
    //title
    $wp_customize->add_setting( 'footer_logo', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => get_template_directory_uri() . '/images/logo_wide_footer.png',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 
        'footer_logo', 
	array(
        'label' =>  'Footer Logo',
        'section' => 'richco_footer',
            //'active_callback' => 'is_front',
        'settings'   => 'footer_logo',
        'priority' => '1',
    )));
        
    $wp_customize->add_setting( 'footer_catch_phrase', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Setting the standard.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'footer_catch_phrase', 
	array(
        'label' => __('footer catch phrase', 'richco'),
        'section' => 'richco_footer',
        'settings'   => 'footer_catch_phrase',
        'type'     => 'textbox',
        'priority' => '2',
    ));
        
    $wp_customize->add_setting( 'footer_catch_phrase', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Setting the standard.',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'footer_catch_phrase', 
	array(
        'label' => __('footer catch phrase', 'richco'),
        'section' => 'richco_footer',
        'settings'   => 'footer_catch_phrase',
        'type'     => 'textbox',
        'priority' => '3',
    ));
        
    $wp_customize->add_setting( 'footer_title_1', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Community',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'footer_title_1', 
	array(
        'label' => __('Center title 1', 'richco'),
        'section' => 'richco_footer',
        'settings'   => 'footer_title_1',
        'type'     => 'textbox',
        'priority' => '4',
    ));
        
    $wp_customize->add_setting( 'footer_title_2', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'About Us',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'footer_title_2', 
	array(
        'label' => __('Center title 2', 'richco'),
        'section' => 'richco_footer',
        'settings'   => 'footer_title_2',
        'type'     => 'textbox',
        'priority' => '4',
    ));
        
    $wp_customize->add_setting( 'footer_title_3', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Company',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'footer_title_3', 
	array(
        'label' => __('Center title 3', 'richco'),
        'section' => 'richco_footer',
        'settings'   => 'footer_title_3',
        'type'     => 'textbox',
        'priority' => '5',
    ));
        
    $wp_customize->add_setting( 'footer_phone', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => '512-793-6714',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'footer_phone', 
	array(
        'label' => __('Phone Number', 'richco'),
        'section' => 'richco_footer',
        'settings'   => 'footer_phone',
        'type'     => 'textbox',
        'priority' => '6',
    ));
        
    $wp_customize->add_setting( 'footer_email', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'Richcoproperty@gmail.com',
        'transport' => 'postMessage', // or refresh
    ) );
    $wp_customize->add_control(
	'footer_email', 
	array(
        'label' => __('Email', 'richco'),
        'section' => 'richco_footer',
        'settings'   => 'footer_email',
        'type'     => 'textbox',
        'priority' => '7',
    ));
}
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
add_action( 'customize_register', 'richco_customize_register' );
function richco_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'richco_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'richco_customize_partial_blogdescription',
		) );
	}
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function richco_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function richco_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


//@return string/bool - title of current page or false if not set
// '404' if 404 page
// 'front_page' if front page
function get_current_page_front(){
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