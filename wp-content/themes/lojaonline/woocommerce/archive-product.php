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

    <div class="container-archive-product">
      <div class="produtos-container row row--15">
        <?php
        echo woocommerce_catalog_ordering();
        if ($data['products'] != null) :
          product_list_archive_product($data['products']);
          echo get_the_posts_pagination();
        ?>
        <?php else : ?>
          <p>Nenhum resultado encontrado para sua busca.</p>
        <?php
        endif;
        ?>
      </div>
      <nav class="filtros-container">
        <div class="filtro-menu-parte">
          <h3 class="filtro-titulo">Categorias</h3>
          <?php
          wp_nav_menu([
            'menu' => 'categorias_internas',
            'menu_class' => 'filtros-cat',
            'containet' => false,
          ]);
          ?>
        </div>
        <div class="filtro-menu-parte">
          <?php
          $attributes_taxonomies = wc_get_attribute_taxonomies();
          foreach ($attributes_taxonomies as $attribute) {
            the_widget('WC_Widget_Layered_Nav', [
              'title' => $attribute->attribute_label,
              'attribute' => $attribute->attribute_name,
            ]);
          }
          ?>
        </div>
        <div class="filtro-menu-parte">
          <h3 class="filtro-titulo">Filtrar por Preço</h3>
          <form>
            <div class="filtrar-precos-linha">
              <label class="margin-auto" for="min_price">De R$</label>
              <input type="number" required name="min_price" id="min_price" value="
             <?php
              echo isset(
                $_GET['min_price']
              ) ?
                $_GET['min_price'] : 0;
              ?>
              ">
            </div>
            <div class="filtrar-precos-linha">
              <label class="margin-auto" for="max_price">De R$</label>
              <input type="number" required name="max_price" id="max_price" value="
             <?php
              echo isset(
                $_GET['max_price']
              ) ?
                $_GET['max_price'] : 0;
              ?>
              ">
            </div>
            <button type="submit" class="">Filtrar</button>
          </form>
        </div>
      </nav>
    </div>
  </div>
  <!-- End .container -->
</div>
<!-- End Shop Area  -->



<?php get_footer(); ?>