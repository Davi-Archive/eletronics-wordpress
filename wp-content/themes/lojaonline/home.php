<?php
get_header();
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

          <!-- Start Single Blog  -->
          <?php
          if (have_posts()) : while (have_posts()) : the_post(); ?>
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
        <?php get_template_part('inc/blog/menu') ?>
      </div>
      <div class="posts-navigation">
        <nav class="navigation pagination" aria-label="Products">
          <?php
          $pagination_args = array(
            'base' => str_replace(99999999, '%#%', esc_url(get_pagenum_link(99999999))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
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