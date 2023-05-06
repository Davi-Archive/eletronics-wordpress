<?php
get_header();
$home = get_page_by_title('home');

// Categories

$retrieved_categories = get_terms(['taxonomy' => 'product_cat']);

function format_categories_section($categories)
{
    $categories_final = [];
    foreach ($categories as $category) {
        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $image        = wp_get_attachment_url($thumbnail_id);
        $category_link = get_term_link($category->term_id, $category->taxonomy); //

        $categories_final[] = [
            'name' => $category->name,
            'slug' => $category->slug,
            'image' => $image,
            'link' => $category_link
        ];
    }
    return $categories_final;
}

$categories_formatted = format_categories_section($retrieved_categories);


// PRODUCT UTILS
function format_products_utils_homepage($products)
{
    $products_final = [];
    foreach ($products as $product) {
        $product_id = $product->id;
        $product_image = $product->get_image();

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

// Product banner


$product_banner = wc_get_products([
    'limit' => 1,
    'tag' => ('banner-topo-home')
]);


$banner_product = format_products_utils_homepage($product_banner);


// Products Explore
$products_explore = wc_get_products([
    'limit' => 10,
    'orderby' => 'DESC'
]);

$products_explore_formatted = format_products_utils_homepage($products_explore);

// New Products from store
$products_new = wc_get_products([
    'limit' => 10,
    'orderby' => 'date',
    'order' => 'DESC',
]);

$products_new_formatted = format_products_utils_homepage($products_new);

// Most sold products from store

$products_sold = wc_get_products([
    'limit' => 10,
    'orderby' => 'rand'
]);

$products_most_sold_formatted = format_products_utils_homepage($products_sold);
// Send data

$data['banner'] = $banner_product;
$data['products_explore'] = $products_explore_formatted;
$data['products_new'] = $products_new_formatted;
$data['products_most_sold'] = $products_most_sold_formatted;
$data['categories'] = $categories_formatted;

?>



<main class="main-wrapper">
    <!-- Banner Header Start-->
    <?php foreach ($data['banner'] as $product) : ?>
        <div class="axil-main-slider-area main-slider-style-1">
            <div class="container">
                <div class="row align-items-center" style="flex-wrap: nowrap;">
                    <div class="col-lg-5 col-sm-6">
                        <div class="main-slider-content">
                            <div class="slider-content-activation-one slick-initialized slick-slider">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 2020px;">

                                        <div class="single-slide slick-slide slick-current slick-active sal-animate">
                                            <span class="subtitle">
                                                <i class="fa-solid fa-fire"></i> Oferta Quente da Semana</span>
                                            <h1 class="title">Roco Wireless</h1>
                                            <div class="slide-action">
                                                <div class="shop-btn">
                                                    <a href="<?= $product['link'] ?>" class="axil-btn btn-bg-white" tabindex="0">
                                                        <i class="fa-solid fa-cart-shopping-fast fa-2xs"></i>
                                                        Comprar Agora</a>
                                                </div>
                                                <!-- <div class="item-rating">
                                                <div class="thumb">
                                                    <ul>
                                                        <li><img src="<?= get_template_directory_uri() ?>/img/author1.png" alt="Author"></li>
                                                        <li><img src="<?= get_template_directory_uri() ?>/img/author2.png" alt="Author"></li>
                                                        <li><img src="<?= get_template_directory_uri() ?>/img/author3.png" alt="Author"></li>
                                                        <li><img src="<?= get_template_directory_uri() ?>/img/author4.png" alt="Author"></li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <span class="rating-icon">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </span>
                                                    <span class="review-text">
                                                        <span>100+</span> Reviews
                                                    </span>
                                                </div>
                                            </div> -->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Banner Header End-->

                    <div class="main-slider-large-thumb">
                        <div class="single-slide">
                            <img src="<?php the_field('imagem_banner_topo', $home) ?>" alt="<?= $product['name'] ?>">
                            <div class="product-price">
                                <span class="text">Por</span>
                                <span class="price-amount"><?= $product['price'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="shape-group">
                <li class="shape-1">
                    <img src="<?= get_template_directory_uri() ?>/img/shape-1.png" alt="Shape">
                </li>
                <li class="shape-2"><img src="<?= get_template_directory_uri() ?>/img/shape-2.png" alt="Shape"></li>
            </ul>
        </div>
    <?php endforeach; ?>

    <!-- Start Categorie Area  -->
    <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-secondary"> <i class="fas fa-tags"></i> Categorias</span>
                <h2 class="title">Procurar por Categoria</h2>
            </div>
            <div class="owl-carousel">

                <?php foreach ($data['categories'] as $category) : ?>
                    <div style="width: 163px;">
                        <div class="categrie-product sal-animate">
                            <a href="<?= $category['link'] ?>" tabindex="-1">
                                <img class="img-fluid" src="<?= $category['image'] ?>" alt="product categorie">
                                <h6 class="cat-title"><?= $category['name'] ?></h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- End Categorie Area  -->

        <?php get_template_part('/inc/home/countdown', '') ?>

        <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"> <i class="fas fa-shopping-basket"></i> Nossos Produtos</span>
                    <h2 class="title">Veja nossos produtos</h2>
                </div>
                <div class="owl-carousel">

                    <?php foreach ($data['products_explore'] as $product) :  ?>

                        <div class="product-explore">
                            <a href="<?= $product['link'] ?>">
                                <div class="axil-product thumbnail">
                                    <a href="<?= $product['link'] ?>" tabindex="-1">
                                        <?= $product['image'] ?>
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="<?= $product['link'] ?>" tabindex="-1"><?= $product['name'] ?></a></h5>
                                        <div class="product-price-variant">
                                            <?php
                                            if ($product['sale_price']) : ?>
                                                <span class="price old-price">R$<?= $product['price'] ?></span>
                                                <span class="price current-price">
                                                    R$<?= $product['sale_price'] ?>
                                                </span>
                                            <?php else : ?>
                                                <span class="price current-price">
                                                    R$<?= $product['price'] ?>
                                                </span>
                                            <?php endif ?>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>



                    <!-- End .slick-single-layout -->


                </div>
                <!-- End .slick-single-layout -->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center mt--20 mt_sm--0">
                    <a href="/loja/" class="axil-btn btn-bg-lighter btn-load-more">Ver todos os produtos</a>
                </div>


            </div>
        </div>
    </div>
    <!-- End Expolre Product Area  -->

    <!-- Start New Arrivals Product Area  -->
    <div class="new-arrivals-product-area">
        <div class="container">
            <div class="product-area">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="fas fa-shopping-basket"></i>Novos Produtos</span>
                    <h2 class="title">Chegaram agora na Loja!</h2>
                </div>
                <div class="container-new-arrivals">
                    <div class="owl-carousel product-new-arrival-single">

                        <?php foreach ($data['products_new'] as $product) : ?>
                            <!-- Single Product Start -->
                            <div class="axil-product product-style-two" style="text-align: center;">
                                <div class="thumbnail" style="display:flex; align-item:center; justify-content:center; ">
                                    <a href="<?= $product['link'] ?>" tabindex="-1">
                                        <div class="sal-animate" style="width:190px;">
                                            <?= $product['image'] ?>
                                        </div>
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="<?= $product['link'] ?>" tabindex="-1"><?= $product['name'] ?></a></h5>
                                        <div class="product-price-variant">
                                            <?php
                                            if ($product['sale_price']) : ?>
                                                <span class="price old-price">R$<?= $product['price'] ?></span>
                                                <span class="price current-price">
                                                    R$<?= $product['sale_price'] ?>
                                                </span>
                                            <?php else : ?>
                                                <span class="price current-price">
                                                    R$<?= $product['price'] ?>
                                                </span>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="<?= $product['link'] ?>" data-bs-toggle="modal" data-bs-target="#quick-view-modal" tabindex="-1"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="<?= $product['link'] ?>">Selecionar</a></li>
                                            <li class="wishlist"><a href="<?= $product['link'] ?>" tabindex="-1"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    </div>
    </div>
    <!-- End New Arrivals Product Area  -->

    <!-- Start Most Sold Product Area  -->
    <div class="axil-most-sold-product axil-section-gap">
        <div class="container">
            <div class="product-area pb--50">
                <div class="section-title-wrapper section-title-center">
                    <span class="title-highlighter highlighter-primary"><i class="fas fa-star"></i> Mais Vendidos</span>
                    <h2 class="title">Mais vendidos na loja</h2>
                </div>
                <div class="row row-cols-xl-2 row-cols-1 row--15">
                    <?php foreach ($data['products_most_sold'] as $product) : ?>
                        <div class="col">
                            <div class="axil-product-list">
                                <div class="thumbnail">
                                    <a href="<?= $product['link'] ?>">
                                        <div class="sal-animate most-sold-product-image">
                                            <?= $product['image'] ?>
                                        </div>
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-rating">
                                        <span class="rating-icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="rating-number"><span>100+</span> Avaliações</span>
                                    </div>
                                    <h6 class="product-title"><a href="<?= $product['link'] ?>"><?= $product['name'] ?></a></h6>
                                    <div class="product-price-variant">
                                        <?php
                                        if ($product['sale_price']) : ?>
                                            <span class="price old-price">R$<?= $product['price'] ?></span>
                                            <span class="price current-price">
                                                R$<?= $product['sale_price'] ?>
                                            </span>
                                        <?php else : ?>
                                            <span class="price current-price">
                                                R$<?= $product['price'] ?>
                                            </span>
                                        <?php endif ?>
                                    </div>
                                    <div class="product-cart">
                                        <a href="<?= $product['link'] ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="<?= $product['link'] ?>" class="cart-btn"><i class="fa-solid fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Sold Product Area  -->

    <?php get_template_part('/inc/home/why-choose', '') ?>

    <?php get_template_part('/inc/home/product-poster', '') ?>

    <!-- Start Axil Newsletter Area  -->
    <?php if (get_field('mostrar_newsletter')) : ?>
        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                    <div class="newsletter-content">
                        <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                        <h2 class="title mb--40 mb_sm--30">Receba atualizações semanais</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="exemplo@gmail.com" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Receber Notícias</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
    <?php endif; ?>
    <!-- End Axil Newsletter Area  -->

</main>

<?php include(TEMPLATEPATH . '/inc/home/service-garanteed.php'); ?>

<!-- MODALS -->

<?php include(TEMPLATEPATH . './inc/quickview-modal.php') ?>

<?php include(TEMPLATEPATH . '/inc/offer-modal.php') ?>

<div class="closeMask"></div>

<?php get_footer(); ?>

</body>

</html>