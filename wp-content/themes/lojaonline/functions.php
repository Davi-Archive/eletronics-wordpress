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

    wp_enqueue_style('google-font-material', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0', [], '2.0.0', false);


    // Enqueue my scripts.

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', array(), null, true);

    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), null, true);

    wp_enqueue_script('jquery-countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array(), null, true);

    wp_enqueue_script('jquery-magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), null, true);

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), null, true);

    wp_enqueue_script('counterup', get_template_directory_uri() . '/js/counterup.js', array(), null, true);

    wp_enqueue_script('owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), null, true);

    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), null, true);

    wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), null, true);

    wp_enqueue_script('cookie', get_template_directory_uri() . '/js/js.cookie.js', array(), null, true);

    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), null, true);

    wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.min.js', array(), null, true);

    wp_enqueue_script('sal', get_template_directory_uri() . '/js/sal.js', array(), null, true);

    wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), null, true);

    wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array(), null, true);


    // variables for main
    wp_enqueue_script(
        'main',
        get_template_directory_uri() . '/js/main.js',
        array(),
        null,
        true
    );

    $home = get_page_by_title('home');
    $dynamic_date = get_field('promocao_acaba', $home);
    $promotion_end = array(
        'date' => $dynamic_date
    );

    wp_localize_script(
        'main',
        'promotionEnd',
        $promotion_end
    );
    // end main variables

    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/cd8a4ed1bd.js', array(), null, true);

    // wp_enqueue_script('add-to-cart', get_template_directory_uri() . '/js/add-to-cart.min.js', array(), '7.6.0', true);
}


// Registrar Menu
function register_my_menu()
{
    register_nav_menus(array(
        'menu_principal' => __('Menu Principal'),
        'pagina_topo' => __('Página Topo'),
        'contato' => __('Contato'),
        'categorias' => __('Categorias'),
        'links_rapidos' => __('Links Rápidos'),
        'categorias_internas' => __('Categorias Internas')
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


// PRODUCT UTILS
function format_products_utils_homepage($products, $img_size = 'medium')
{
    $products_final = [];
    foreach ($products as $product) {
        $product_id = $product->id;
        $product_image = $product->get_image();
        if ($img_size != null) {
            $product_image = wp_get_attachment_image_src($product->get_image_id(), $img_size)[0];
        }

        $products_final[] = [
            'id' => $product_id,
            'name' => $product->get_name(),
            'link' => $product->get_permalink(),
            'price' => $product->get_regular_price(),
            'sale_price' => $product->get_sale_price(),
            'image' => $product_image
        ];
    }
    return $products_final;
}

// Body class remove
function remove_some_body_class($classes)
{
    $woo_class = array_search('woocommerce', $classes);
    $woopage_class = array_search('woocommerce-page', $classes);
    $search = in_array('archive', $classes) ||
        in_array('product-template-default', $classes);

    if ($woo_class && $woopage_class && $search) {
        unset($classes[$woo_class]);
        unset($classes[$woopage_class]);
    }
    return $classes;
}
add_filter('body_class', 'remove_some_body_class');