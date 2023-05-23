<?php get_header() ?>

<?php
function format_single_product($id, $img_size = 'medium')
{
    $product = wc_get_product($id);

    $gallery_ids = $product->get_gallery_image_ids();
    $gallery = [];
    if ($gallery_ids) {
        foreach ($gallery_ids as $image_id) {
            $gallery[] = wp_get_attachment_image_src($image_id, $img_size)[0];
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

<div class="container breadcumb">
    <?php woocommerce_breadcrumb(['delimiter' => ' > ']); ?>
</div>

<div class="container notification">
    <?php wc_print_notices(); ?>
</div>

<?php
if (have_posts()) : while (have_posts()) : the_post();
        $data['product'] = format_single_product(get_the_ID());
        $single_product = $data['product'];
?>

        <main class="main-wrapper">
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

                                                <div class="product-variations-wrapper">

                                                    <!-- Start Product Variation  -->
                                                    <!-- <div class="product-variation">
                                                <h6 class="title">Colors:</h6>
                                                <div class="color-variant-wrapper">
                                                    <ul class="color-variant">
                                                        <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-02"><span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-03"><span><span class="color"></span></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                                    <!-- End Product Variation  -->

                                                    <!-- Start Product Variation  -->
                                                    <div class="product-variation product-size-variation">
                                                        <h6 class="title">Size:</h6>
                                                        <ul class="range-variant">
                                                            <li>xs</li>
                                                            <li>s</li>
                                                            <li>m</li>
                                                            <li>l</li>
                                                            <li>xl</li>
                                                        </ul>
                                                    </div>
                                                    <!-- End Product Variation  -->

                                                </div>

                                                <!-- Start Product Action Wrapper  -->
                                                <div class="product-action-wrapper d-flex-center">
                                                    <!-- Start Quentity Action  -->
                                                    <div class="pro-qty mr--20"><span class="dec qtybtn">-</span><input type="text" value="1"><span class="inc qtybtn">+</span></div>
                                                    <!-- End Quentity Action  -->

                                                    <!-- Start Product Action  -->
                                                    <ul class="product-action d-flex-center mb--0">
                                                        <li class="add-to-cart"><a href="https://new.axilthemes.com/demo/template/etrade/cart.html" class="axil-btn btn-bg-primary">Adicionar ao Carrinho</a></li>
                                                        <li class="wishlist"><a href="https://new.axilthemes.com/demo/template/etrade/wishlist.html" class="axil-btn wishlist-btn"><i class="fas fa-heart"></i></a></li>
                                                    </ul>
                                                    <!-- End Product Action  -->

                                                </div>
                                                <!-- End Product Action Wrapper  -->

                                                <div class="product-desc-wrapper pt--80 pt_sm--60">
                                                    <h4 class="primary-color mb--40 desc-heading">Description</h4>
                                                    <div class="single-desc mb--30">
                                                        <h5 class="title">Specifications:</h5>
                                                        <p>We’ve created a full-stack structure for our working workflow processes, were from the funny the century initial all the made, have spare to negatives. But the structure was from the funny the century rather,
                                                            initial all the made, have spare to negatives.</p>
                                                    </div>
                                                    <div class="single-desc mb--5">
                                                        <h5 class="title">Care &amp; Maintenance:</h5>
                                                        <p>Use warm water to describe us as a product team that creates amazing UI/UX experiences, by crafting top-notch user experience.</p>
                                                    </div>
                                                    <ul class="pro-des-features pro-desc-style-two">
                                                        <li class="single-features">
                                                            <div class="icon">
                                                                <img src="<?= get_template_directory_uri() ?>/img/icon-3.png" alt="icon">
                                                            </div>
                                                            Easy Returns
                                                        </li>
                                                        <li class="single-features">
                                                            <div class="icon">
                                                                <img src="<?= get_template_directory_uri() ?>/img/icon-2.png" alt="icon">
                                                            </div>
                                                            Quality Service
                                                        </li>
                                                        <li class="single-features">
                                                            <div class="icon">
                                                                <img src="<?= get_template_directory_uri() ?>/img/icon-1.png" alt="icon">
                                                            </div>
                                                            Original Product
                                                        </li>
                                                    </ul>
                                                    <!-- End .pro-des-features -->
                                                </div>
                                                <!-- End .product-desc-wrapper -->
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

            <?php get_template_part('/inc/single-product/recently-view') ?>
            <?php get_template_part('/inc/single-product/newsletter') ?>

        </main>

        <?php get_template_part('/inc/home/service-garanteed') ?>


<?php endwhile;
endif; ?>
<?php get_footer() ?>