<?php if(session_status() == PHP_SESSION_NONE){ session_start(); }
include(__DIR__. '/config.php');//get config
/**
 * @package RichCo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="shortcut icon" type="image/png" href="<?php print get_template_directory_uri(). '/favicon.ico'?>">
    <?php 
        $now = date('c').date('m/d/Y');
        print('<time style="display:none" datetime="'.$now.'">This page is being accessed at exactly: '.$now.'</time>');
        //var_dump($_SESSION);
       // if(isset($_SESSION)){
            //print '<type style="display:none">' . $_SESSION . '</type>'; 
       // }
        wp_head(); 
    ?>
</head>
<body <?php body_class(); ?>>
    <!-- loader -->
    <div id="ftco-loader" class="fullscreen show"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    <!-- nav -->
    <nav class="navbar navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?php print get_home_url() ?>">
            <?php
		if(has_custom_logo()){
                    the_custom_logo();
                }else{
                    print '<img src="'.get_template_directory_uri(). '/images/logo_wide.png" class="logo_img"/>';
                }
            ?><span class="accent"></span>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-bars"></i> Menu
            </button>
            <!-- start burger menu -->
            <?php
                wp_nav_menu(array(
                    'theme_location'    => 'Hamburger',
                    'menu'              => 'RichCo Menu',
                    'menu_class'        =>  'navbar-nav ml-auto',
                    'menu_id'           =>  'hamburger_menu',
                    'container'           =>  'div',
                    'container_class'           =>  'collapse navbar-collapse',
                    'container_id'           =>  'ftco-nav',
                ) );
            ?>
            <!-- end burger menu -->
            
        </div>
    </nav><!-- end nav -->
    <!--div id='login' class="">
        <div class="login-triangle"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="login-header">Log in</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form class="login-container">
                        <p><input type="email" placeholder="Email"></p>
                        <p><input type="password" placeholder="Password"></p>
                        <p><input type="submit" value="Log in"></p>
                        <a href="https://propertypreswizard.com/control.php" target="_blank"><p>Go To Property Press Wizard <i class="fa fa-arrow-right"></i></p></a>
                    </form>
                </div>
            </div>
        </div>
    </div-->
    <!-- content start -->
    <div id="content_start">
