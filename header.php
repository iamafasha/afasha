<!doctype html>


<html lang="en" class="no-js">




<head>

<title>
    <?php bloginfo('name');wp_title(); ?>
    </title>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <?php wp_head(); ?>
    <style>
    /* .inner-content {
        background: url(<?php echo get_template_directory_uri() ?>/upload/body-bg.jpg) center 0 repeat;
    }

    .inner-content2 {
        background: url(<?php echo get_template_directory_uri() ?>/upload/body-bg2.jpg) center 0 repeat;
    } */

    .meter>span {
        background: url('../images/skills-pattern.png');
    }
    </style>
</head>

<body data-url="<?php echo admin_url('admin-ajax.php'); ?>" <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- Container -->
    <div id="container">
        <!-- Header
		    ================================================== -->
        <header>
            <div class="logo-box">
                <?php if( function_exists( 'the_custom_logo' ) ):  if(has_custom_logo()): ?>
                <?php  the_custom_logo();  ?>
                <?php else:  ?>
                <h1> <?php bloginfo('name'); ?></h1>
                <?php endif; endif; ?>

            </div>
            <a class="elemadded responsive-link" href="#">Menu</a>

            <div class="menu-box">
                <?php wp_nav_menu(
                            array(
                            'theme_location' => 'main_menu',
                            'walker'=>new Walker_Main_Menu(),
                            'container'=>'ul'
                            )
                ); ?>
            </div>

            <div class="social-box">
              
              <?php wp_nav_menu(
                            array(
                            'theme_location' => 'social_menu',
                            'walker'=>new Walker_Social_Menu(),
                            'container'=>'ul',
                            'menu_class'=>'social-icons'
                            )
                 ); ?>
                <div class="info">
                    <a href="mailto::<?php echo get_option( 'admin_email', '' ); ?>" class="mail"><?php echo get_option( 'admin_email', '' ); ?><i class="fa fa-envelope-o"></i></a>
                    <p class="phone"> <a href="tel:<?php echo get_option( 'phone_number', '' ); ?><"><?php echo get_option( 'phone_number', '' ); ?></a><i class="fa fa-phone"></i></p>
                </div>
            </div>
        </header>
        <!-- End Header -->