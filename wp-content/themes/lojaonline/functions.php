<?php

// Activate Woocommerce on code
function cafe_add_commerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'cafe_add_commerce_support');

// Scripts & Css
add_action('wp_enqueue_scripts', 'register_code');

function register_code()
{
    // Enqueue Stylesheets
    wp_register_style(
        'register-style',
        get_stylesheet_uri(),
        [],
        '1.0.0',
        false
    );
    wp_enqueue_style('register-style');


    // Enqueue my scripts.

    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), null, true);

    wp_enqueue_script('jquery-countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array(), null, true);

    wp_enqueue_script('jquery-magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), null, true);

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), null, true);

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), null, true);

    wp_enqueue_script('counterup', get_template_directory_uri() . '/js/counterup.js', array(), null, true);

    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), null, true);

    wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), null, true);

    wp_enqueue_script('cookie', get_template_directory_uri() . '/js/js.cookie.js', array(), null, true);

    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), null, true);

    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), null, true);

    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js', array(), null, true);

    wp_enqueue_script('sal', get_template_directory_uri() . '/js/sal.js', array(), null, true);

    wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), null, true);

    wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array(), null, true);

    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/cd8a4ed1bd.js', array(), null, true);

    // wp_enqueue_script('add-to-cart', get_template_directory_uri() . '/js/add-to-cart.min.js', array(), '7.6.0', true);
}


// Registrar Menu
function register_my_menu()
{
    register_nav_menus(array(
        'menu_principal' => __('Menu Principal'),
        'informacao' => __('Informação'),
        'suporte' => __('Suporte')
    ));
}
add_action('init', 'register_my_menu');


// change image size
function cafe_custom_images()
{
    add_image_size('slide', 1030, 800, ['center', 'top']);
    update_option('medium_crop', 1);
}
add_action('after_setup_theme', 'cafe_custom_images');

// product shop per page
function cafe_loop_shop_per_page()
{
    return 6;
}
add_filter('loop_shop_per_page', 'cafe_loop_shop_per_page');
