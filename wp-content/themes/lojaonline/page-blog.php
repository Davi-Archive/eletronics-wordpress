<?php
get_header();

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

<main class="main-wrapper">
  <!-- Start Breadcrumb Area  -->
  <div class="axil-breadcrumb-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-8">
          <div class="inner">
            <ul class="axil-breadcrumb">
              <li class="axil-breadcrumb-item"><a href="/">Home</a></li>
              <li class="separator"></li>
              <li class="axil-breadcrumb-item active" aria-current="page">Blog</li>
            </ul>
            <h1 class="title">Lista de Post</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="inner">
            <div class="bradcrumb-thumb">
              <img src="<?= get_template_directory_uri() ?>/img/product-45.webp" alt="Image">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb Area  -->
  <!-- Start Blog Area  -->
  <div class="axil-blog-area axil-section-gap">
    <div class="container">
      <div class="row row--25">
        <div class="col-lg-8 axil-post-wrapper">


          <h2><a href="<?php the_permalink(); ?>"></a></h2>

          <!-- Start Single Blog  -->
          <?php
          $query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
          ));
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <div class="content-blog sticky">
                <div class="inner">
                  <div class="content">
                    <h4 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                    <div class="axil-post-meta">
                      <div class="post-author-avatar">
                        <img src="<?= get_avatar_url(get_the_author_meta('ID')); ?>" alt="Imagem do autor">
                      </div>
                      <div class="post-meta-content">
                        <h6 class="author-title">

                          <a href="<?php get_the_author_link() ?>">
                            <?= get_the_author() ?>
                          </a>
                        </h6>
                        <ul class="post-meta-list">
                          <li><?php the_date() ?></li>
                        </ul>
                      </div>
                    </div>
                    <p><?php the_excerpt(); ?></p>
                    <div class="read-more-btn">
                      <a class="axil-btn btn-bg-primary" href="<?php the_permalink() ?>">Leia Mais</a>
                    </div>
                  </div>
                </div>
              </div>

          <?php endwhile;
          //posts paginated
          else : endif; ?>
          <!-- End Single Blog  -->


        </div>
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
      </div>
      <div class="posts-navigation">
        <nav class="navigation pagination" aria-label="Products">
          <?php
          $pagination_args = array(
            'base' => str_replace(99999999, '%#%', esc_url(get_pagenum_link(99999999))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $query->max_num_pages,
            'prev_text' => __('&laquo; Anterior', 'text-domain'),
            'next_text' => __('Próximo &raquo;', 'text-domain')
          );

          echo paginate_links($pagination_args);

          wp_reset_postdata();
          ?>
        </nav>
      </div>
      <!-- End post-pagination -->
    </div>
    <!-- End .container -->
  </div>
  <!-- End Blog Area  -->

</main>

<?php get_footer() ?>