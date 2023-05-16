<?php get_header(); ?>
<?php
function product_list_archive_product($products)
{ ?>
  <?php foreach ($products as $product) :  ?>
    <!-- Start Single Product  -->
    <div class="col-xl-3 col-lg-4 col-sm-6">
      <div class="axil-product product-style-one has-color-pick mt--40">
        <div class="thumbnail">
          <a href="<?= $product['link'] ?>">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
          </a>
          <div class="label-block label-right">
            <div class="product-badget">20% DESCONTO</div>
          </div>
          <div class="product-hover-action">
            <ul class="cart-action">
              <li class="wishlist"><a href="<?= $product['link'] ?>"><i class="fas fa-heart"></i></a></li>
              <li class="select-option"><a href="<?= $product['link'] ?>">Comprar</a></li>
              <li class="quickview"><a href="<?= $product['link'] ?>" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="fas fa-eye"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="product-content">
          <div class="inner">
            <h5 class="title"><a href="<?= $product['link'] ?>"><?= $product['name'] ?></a></h5>
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
      </div>
    </div>
    <!-- End Single Product  -->
  <?php endforeach; ?>
<?php } ?>

<?php
$products = [];
$data['products'] = [];
if (have_posts()) : while (have_posts()) : the_post();

    $products[] = wc_get_product(get_the_ID());

    $data['products'] = format_products_utils_homepage($products);
?>

<?php endwhile;
else : endif; ?>


<!-- Start Shop Area  -->
<div class="axil-shop-area axil-section-gap bg-color-white">
  <div class="container">
    <div class="container_breadcrumb">
      <?php woocommerce_breadcrumb(['delimiter' => '>']) ?>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="axil-shop-top">
          <div class="row">
            <div class="col-lg-9">
              <div class="category-select">

                <!-- Start Single Select  -->
                <select class="single-select">
                  <option>Categories</option>
                  <option>Fashion</option>
                  <option>Electronics</option>
                  <option>Furniture</option>
                  <option>Beauty</option>
                </select>
                <!-- End Single Select  -->

                <!-- Start Single Select  -->
                <select class="single-select">
                  <option>Color</option>
                  <option>Red</option>
                  <option>Blue</option>
                  <option>Green</option>
                  <option>Pink</option>
                </select>
                <!-- End Single Select  -->

                <!-- Start Single Select  -->
                <select class="single-select">
                  <option>Price Range</option>
                  <option>0 - 100</option>
                  <option>100 - 500</option>
                  <option>500 - 1000</option>
                  <option>1000 - 1500</option>
                </select>
                <!-- End Single Select  -->

              </div>
            </div>
            <div class="col-lg-3">
              <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                <!-- Start Single Select  -->
                <select class="single-select">
                  <option>Sort by Latest</option>
                  <option>Sort by Name</option>
                  <option>Sort by Price</option>
                  <option>Sort by Viewed</option>
                </select>
                <!-- End Single Select  -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row row--15">
      <?php if ($data['products'] != null) :
        product_list_archive_product($data['products']); ?>

        <?= get_the_posts_pagination() ?>
      <?php else : ?>
        <p>Nenhum resultado encontrado para sua busca.</p>
      <?php
      endif;
      ?>
    </div>
  </div>
  <!-- End .container -->
</div>
<!-- End Shop Area  -->



<?php get_footer(); ?>