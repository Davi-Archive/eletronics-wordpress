<?php get_header(); ?>
<?php
function product_list_archive_product($products)
{ ?>
  <?php foreach ($products as $product) :  ?>
    <div class="product-explore-list">
      <a href="<?= $product['link'] ?>">
        <div class="axil-product thumbnail">
          <a href="<?= $product['link'] ?>" tabindex="-1">
            <img src="<?= $product['image'] ?>" alt="<?php $product['name'] ?>" />
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
<div class="container_breadcrumb">
  <?php woocommerce_breadcrumb(['delimiter' => '>']) ?>
</div>

<article class="container products-archive">
  <nav class="filtros">
    <h2>Filtros</h2>
  </nav>
  <main>
    <?php if ($data['products'] != null) :
      product_list_archive_product($data['products']);
      get_the_posts_pagination();
    else : ?>
      <p>Nenhum resultado encontrado para sua busca.</p>
    <?php
    endif;
    ?>
  </main>
</article>

<?php get_footer(); ?>