<?php
get_header();
$contact = get_page_by_title('contato');
?>

<main class="main-wrapper">
  <!-- Start Blog Area  -->
  <div class="axil-blog-area axil-section-gap">
    <!-- End .single-post -->
    <div class="post-single-wrapper position-relative">
      <div class="container">
        <div class="row">
          <div class="col-lg-1">
            <div class="d-flex flex-wrap align-content-start h-100">
              <div class="position-sticky sticky-top">

              </div>
            </div>
          </div>

          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <div class="col-lg-7 axil-post-wrapper">
                <div class="post-heading">
                  <h2 class="title"><?= the_title() ?></h2>
                  <div class="axil-post-meta">
                    <div class="post-author-avatar">
                      <img src="<?= get_avatar_url(get_the_author_meta('ID')); ?>" alt="Author Images">
                    </div>
                    <div class="post-meta-content">
                      <h6 class="author-title">
                        <a href="<?php get_the_author_link() ?>"><?= get_the_author() ?></a>
                      </h6>
                      <ul class="post-meta-list">
                        <li><?= the_date() ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <p><?= the_content() ?></p>
                <hr />
                <div class="axil-comment-area">
                  <h4 class="title">Cometários</h4>
                  <ul class="comment-list">
                    <!-- Start Comment Respond  -->
                    <?php
                    comments_template();
                    ?>
                    <!-- End Comment Respond  -->
                  </ul>
                </div>
                <!-- End .axil-commnet-area -->

              </div>
          <?php endwhile;
          else : endif; ?>
          <?php get_template_part('inc/blog/menu') ?>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Area  -->


</main>
<?php get_footer() ?>