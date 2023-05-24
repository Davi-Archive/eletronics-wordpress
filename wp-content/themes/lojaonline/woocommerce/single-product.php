<?php get_header() ?>

<?php

$data = [];

function format_single_product($id, $img_size = 'medium')
{
    $product = wc_get_product($id);

    $gallery_ids = $product->get_gallery_image_ids();
    $gallery = [];
    if ($gallery_ids) {
        $count = 0;
        foreach ($gallery_ids as $image_id) {
            if ($count < 2) {
                $gallery[] = wp_get_attachment_image_src($image_id, $img_size)[0];
                $count++;
            }
        }
    }


    return [
        'id' => $id,
        'name' => $product->get_name(),
        'price' => $product->get_price(),
        'sale_price' => $product->get_sale_price(),
        'link' => $product->get_permalink(),
        'sku' => $product->get_sku(),
        'description' => $product->get_description(),
        'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size)[0],
        'gallery' => $gallery
    ];
}
?>


<?php
if (have_posts()) : while (have_posts()) : the_post();
        $data['product'] = format_single_product(get_the_ID());
        $single_product = $data['product'];
?>

        <main class="main-wrapper container">
            <div class="container_breadcrumb">
                <?php woocommerce_breadcrumb(['delimiter' => ' > ']); ?>
            </div>

            <div class="container notification">
                <?php wc_print_notices(); ?>
            </div>

            <!-- Start Shop Area  -->
            <div class="axil-single-product-area bg-color-white">
                <div class="single-product-thumb axil-section-gap pb--20 pb_sm--0 bg-vista-white">
                    <div class="container">
                        <div class="row row--25" style="display:flex;flex-direction:row">
                            <div class="col-lg-6 mb--40">
                                <div class="h-100">
                                    <div class="position-sticky sticky-top">
                                        <div class="row row--10">
                                            <!-- start gallery -->
                                            <div class="col-12 mb--20">
                                                <div class="single-product-thumbnail axil-product thumbnail-grid">
                                                    <div class="thumbnail">
                                                        <img class="img-fluid" src="<?= $single_product['img'] ?>" alt="Product Images">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End .col gallery -->

                                            <?php if ($single_product['gallery']) {
                                                foreach ($single_product['gallery'] as $product_img) { ?>
                                                    <!-- start gallery -->
                                                    <div class="col-6 mb--20">
                                                        <div class="single-product-thumbnail axil-product thumbnail-grid">
                                                            <div class="thumbnail">
                                                                <img class="img-fluid" src="<?= $product_img ?>" alt="Product Images">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End .col gallery -->

                                            <?php }
                                            } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb--40">
                                <div class="h-100">
                                    <div class="position-sticky sticky-top">
                                        <div class="single-product-content">
                                            <div class="inner">
                                                <h2 class="product-title"><?= $single_product['name'] ?></h2>
                                                <span class="price-amount">
                                                    R$<?= $single_product['price'] ?> -
                                                    R$<?= $single_product['sale_price'] ?>
                                                </span>
                                                <div class="product-rating">
                                                    <div class="star-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                    <div class="review-link">
                                                        <a href="#">(<span>2</span> avaliações)</a>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li><i class="fas fa-check"></i>Em estoque</li>
                                                    <li><i class="fas fa-check"></i>Entrega grátis disponível</li>
                                                    <li><i class="fas fa-check"></i>Para ter 30% de desconto utilize o código: MOTIVE30</li>
                                                </ul>
                                                <p class="description"><?= $single_product['description'] ?></p>


                                                <!-- Start Product Action Wrapper  -->
                                                <div class="product-action-wrapper d-flex-center">

                                                    <!-- Start Product Action  -->
                                                    <div class="product-action d-flex-center mb--0">
                                                        <?php woocommerce_template_single_add_to_cart() ?>


                                                    </div>
                                                    <!-- End Product Action  -->

                                                </div>
                                                <!-- End Product Action Wrapper  -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .single-product-thumb -->

            </div>
            <!-- End Shop Area  -->

            <?php
            $related_ids = wc_get_related_products($single_product['id'], 6);
            $related_products = [];
            foreach ($related_ids as $product_id) {
                $related_products[] = wc_get_product($product_id);
            }
            ?>

            <?php
            $formatted_products = format_products_utils_homepage($related_products);
            ?>

            <!-- Start Recently Viewed Product Area  -->
            <div class="axil-product-area bg-color-white axil-section-gap pb--10 pb_sm--10">
                <div class="container">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"><i class="fas fa-shopping-basket"></i> Vistos Recente</span>
                        <h2 class="title">Itens Parecidos</h2>
                    </div>
                    <div class="owl-carousel product-new-arrival-single container-itens-recentes">

                        <?php foreach ($formatted_products as $product) : ?>
                            <!-- Single Product Start -->
                            <div class="axil-product product-style-two" style="text-align: center;">
                                <div class="thumbnail" style="display:flex; align-item:center; justify-content:center; ">
                                    <a href="<?= $product['link'] ?>" tabindex="-1">
                                        <div class="sal-animate" style="width:190px;">
                                            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" />
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
            <!-- End Recently Viewed Product Area  -->




            <?php get_template_part('/inc/newsletter') ?>

        </main>

        <?php get_template_part('/inc/home/service-garanteed') ?>


<?php endwhile;
endif; ?>
<?php get_footer() ?>