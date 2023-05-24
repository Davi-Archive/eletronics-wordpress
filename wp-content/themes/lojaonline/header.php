<!DOCTYPE html>
<html lang="pt-BR" class="js sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        <?php bloginfo('name'); ?>
        <?php wp_title('-'); ?>
        <?php echo get_field('titulo_seo') != null ? ' - ' . get_field('titulo_seo') : '';  ?>
    </title>
    <meta name="description" content="
    <?php bloginfo('name'); ?> <?php wp_title('-') ?>
    <?php the_field('descricao_seo') ?>">

    <meta property="og:type" content="website" />
    <meta property="og:title" content="
    <?php bloginfo('name'); ?>
    <?php wp_title('-') ?> <?php the_field('titulo_seo') ?>" />
    <meta property="og:description" content="
    <?php bloginfo('name'); ?>
    <?php wp_title('-') ?>
    <?php the_field('descricao_seo') ?>" />
    <meta property="og:url" content="<?php bloginfo('url') ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/banner.webp" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?= get_template_directory_uri(); ?>/img/favicon.png">

    <!-- Header Scripts Start -->
    <?php wp_head() ?>
    <!-- Header Scripts End -->
</head>

<?php
$cart_count = WC()->cart->get_cart_contents_count();

// Pegar produtos e formatar
$products_topo = wc_get_products([
    'limit' => 6,
    'tag' => ('menu-topo')
]);

function format_products($products)
{
    $products_final = [];
    foreach ($products as $product) {
        $products_final[] = [
            'name' => $product->get_name(),
            'link' => $product->get_permalink()
        ];
    }
    return $products_final;
}

$product_top_menu = format_products($products_topo);

// Pegar posts do blog
$args_posts = [
    'numberposts' => 6
];
$blog_posts = get_posts($args_posts);

function format_post($posts)
{
    $posts_final = [];
    foreach ($posts as $post) {
        $posts_final[] = [
            'title' => $post->post_title,
            'link' => $post->guid
        ];
    }
    return $posts_final;
}

// Retornar todos os dados

$data['blog_posts'] = format_post($blog_posts);
$data['product_top_menu'] = format_products($products_topo);
?>

<body class="sticky-header newsletter-popup-modal" <?php body_class() ?>>

    <?php include(TEMPLATEPATH . './inc/search-modal.php') ?>

    <?php include(TEMPLATEPATH . '/inc/cart-dropdown.php') ?>

    <a href="#top" class="back-to-top" id="backto-top"><i class="fas fa-arrow-up"></i></a>
    <header class="header axil-header header-style-1">
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="header-top-dropdown">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="header-top-link">
                            <ul class="quick-link">
                                <li><a href="/ajuda/">Ajuda</a></li>
                                <li><a href="/minha-conta/">Minha Conta</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder" style="height: 0px;"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="/" class="logo logo-dark">
                            <img src="<?= get_template_directory_uri() ?>/img/logo.png" alt="Site Logo">
                        </a>
                        <a href="/" class="logo logo-light">
                            <img src="<?= get_template_directory_uri() ?>/img/logo-light.png" alt="Site Logo">
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="/" class="logo">
                                    <img src="<?= get_template_directory_uri() ?>/img/logo.png" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li class="menu-item-has-children">
                                    <a href="/">Home</a>
                                    <ul class="axil-submenu">
                                        <?php
                                        wp_nav_menu([
                                            'menu' => 'categorias',
                                            'theme_location' => 'categorias',
                                            'container' => false
                                        ]);
                                        ?>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="/loja/">Loja</a>
                                    <ul class="axil-submenu">
                                        <?php foreach ($data['product_top_menu'] as $product) { ?>
                                            <li><a href="<?= $product['link'] ?>"><?= $product['name'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="/paginas/">Páginas</a>
                                    <ul class="axil-submenu">
                                        <?php
                                        $args = array(
                                            'menu' => 'pagina_topo',
                                            'theme_location' => 'pagina_topo',
                                            'container' => false
                                        );
                                        wp_nav_menu($args);
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="/sobre/">Sobre</a></li>
                                <li class="menu-item-has-children">
                                    <a href="/blog/">Blog</a>
                                    <ul class="axil-submenu">
                                        <?php foreach ($data['blog_posts'] as $post) { ?>
                                            <li><a href="<?= $post['link'] ?>"><?= $post['title'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="/contato/">Contato</a></li>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="wishlist">
                                <a href="/">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </li>
                            <li class="shopping-cart">
                                <a href="/carrinho/" class="cart-dropdown-btn">

                                    <?php if ($cart_count) : ?>
                                        <span class="cart-count">
                                            <?= $cart_count ?>
                                        </span>
                                    <?php endif ?>
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    <span class="title">Usuário</span>
                                    <ul>
                                        <li>
                                            <a href="/minha-conta/">Minha Conta</a>
                                        </li>
                                        <li>
                                            <a href="/contato/">Suporte</a>
                                        </li>
                                        <li>
                                            <a href="/linguagem/">Linguagem</a>
                                        </li>
                                    </ul>
                                    <div class="login-btn">
                                        <a href="/wp-login.php" class="axil-btn btn-bg-primary">Login</a>
                                    </div>
                                    <div class="reg-footer text-center">Não tem conta? <a href="/wp-login.php?action=register" class="btn-link">REGISTRAR AQUI.</a></div>
                                </div>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="fa-solid fa-bars"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>