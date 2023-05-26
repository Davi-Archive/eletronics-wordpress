<?php
// product list
$args = array(
  'post_type' => 'product',
  'posts_per_page' => 3,
);
$product_list = wc_get_products($args);
$data['products'] = format_products_utils_homepage($product_list);

// post list sidebar
$args = array('posts_per_page' => 3); // Change the number of posts as per your requirement
$postslist = get_posts($args);
$data['posts'] = $postslist;
?>

<div class="col-lg-4">
  <!-- Start Sidebar Area  -->
  <aside class="axil-sidebar-area">

    <!-- Start Single Widget  -->
    <div class="axil-single-widget mt--40">
      <h6 class="widget-title">Posts Recentes</h6>

      <?php foreach ($data['posts'] as $post) :
        setup_postdata($post); ?>
        <!-- Start Single Post List  -->
        <div class="content-blog post-list-view mb--20">
          <div class="thumbnail">
            <a href="<?= the_permalink() ?>">
              <img src="<?= get_template_directory_uri() ?>/img/about-01.webp" alt="Blog Images">
            </a>
          </div>
          <div class="content">
            <h6 class="title"><a href="<?= the_permalink() ?>">
                <?= get_the_title() ?>
              </a>
            </h6>
            <div class="axil-post-meta">
              <div class="post-meta-content">
                <ul class="post-meta-list">
                  <li><?= get_the_date() ?></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- End Single Post List  -->
      <?php endforeach; ?>



    </div>
    <!-- End Single Widget  -->
    <!-- Start Single Widget  -->
    <div class="axil-single-widget mt--40">
      <h6 class="widget-title">Produtos Recentes</h6>
      <ul class="product_list_widget recent-viewed-product">
        <?php foreach ($data['products'] as $product) : ?>
          <li>
            <div class="thumbnail">
              <a href="<?= $product['link'] ?>">
                <img src="<?= $product['image'] ?>" alt="Blog Images">
              </a>
            </div>
            <div class="content">
              <h6 class="title"><a href="<?= $product['link'] ?>"><?= $product['name'] ?></a></h6>
              <div class="product-meta-content">
                <span class="woocommerce-Price-amount amount">
                  <?php if (!empty($product['sale_price'])) : ?>
                    <del>R$<?= $product['price'] ?></del>
                    R$<?= $product['sale_price'] ?>
                  <?php else : ?>
                    R$<?= $product['price'] ?>
                  <?php endif; ?>
                </span>
              </div>
            </div>
          </li>
        <? endforeach; ?>
        <!-- End Single product_list  -->
      </ul>

    </div>
    <!-- End Single Widget  -->

    <!-- Start Single Widget  -->


    <div class="axil-single-widget mt--40 widget_archive">
      <h6 class="widget-title">Arquivo</h6>
      <ul>
        <?php
        $args = array(
          'type' => 'monthly',
          'show_post_count' => true
        );
        wp_get_archives($args);
        ?>
      </ul>
    </div>
    <!-- End Single Widget  -->

    <!-- Start Single Widget  -->
    <div class="axil-single-widget mt--40 widget_tag_cloud">
      <h6 class="widget-title">Tags</h6>
      <div class="tagcloud">
        <?php
        $tags = get_tags();
        foreach ($tags as $tag) {
          echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
        }
        ?>
      </div>
    </div>
    <!-- End Single Widget  -->

  </aside>
  <!-- End Sidebar Area -->
</div>