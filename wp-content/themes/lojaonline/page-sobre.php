<?php
get_header();
$sobre = get_page_by_title('sobre');
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
              <li class="axil-breadcrumb-item active" aria-current="page">Sobre</li>
            </ul>
            <h1 class="title">Um Pouco mais sobre nossa Loja</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="inner">
            <div class="bradcrumb-thumb">
              <img src="<?= get_template_directory_uri() ?>/img/product-45.png" alt="Image">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb Area  -->

  <!-- Start About Area  -->
  <div class="axil-about-area about-style-1 axil-section-gap ">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-4 col-lg-6">
          <div class="about-thumbnail">
            <div class="thumbnail">
              <img src="<?= get_template_directory_uri() ?>/img/about-01.png" alt="About Us">
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-6">
          <div class="about-content content-right">
            <span class="title-highlighter highlighter-primary2"> <i class="fas fa-shopping-basket"></i>Sobre a Loja</span>
            <h3 class="title"><?php the_field('header_secao', $sobre) ?></h3>
            <span class="text-heading"><?php the_field('titulo', $sobre) ?>
              <div class="row">
                <div class="col-xl-6">
                  <p><?php the_field('descricao_esquerda', $sobre) ?></p>
                </div>
                <div class="col-xl-6">
                  <p class="mb--0"><?php the_field('descricao_direita', $sobre) ?></p>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End About Area  -->

  <!-- Start About Area  -->
  <div class="about-info-area">
    <div class="container">
      <div class="row row--20">
        <div class="col-lg-4">
          <div class="about-info-box">
            <div class="thumb">
              <img src="<?= get_template_directory_uri() ?>/img/shape-01.png" alt="Shape">
            </div>
            <div class="content">
              <h6 class="title"><?php the_field('titulo1', $sobre) ?></h6>
              <p><?php the_field('descricao1', $sobre) ?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="about-info-box">
            <div class="thumb">
              <img src="<?= get_template_directory_uri() ?>/img/shape-02.png" alt="Shape">
            </div>
            <div class="content">
              <h6 class="title"><?php the_field('titulo2', $sobre) ?></h6>
              <p><?php the_field('descricao2', $sobre) ?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="about-info-box">
            <div class="thumb">
              <img src="<?= get_template_directory_uri() ?>/img/shape-03.png" alt="Shape">
            </div>
            <div class="content">
              <h6 class="title"><?php the_field('titulo3', $sobre) ?></h6>
              <p><?php the_field('descricao3', $sobre) ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End About Area  -->



  <!-- Start About Area  -->
  <div class="axil-about-area about-style-2">
    <div class="container">
      <div class="row align-items-center mb--80 mb_sm--60">
        <div class="col-lg-5">
          <div class="about-thumbnail">
            <img src="<?= get_template_directory_uri() ?>/img/about-02.png" alt="about">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="about-content content-right">
            <span class="subtitle">Destaque #01</span>
            <h4 class="title"><?php the_field('titulo_destaque1', $sobre) ?></h4>
            <p><?php the_field('descricao_destaque1', $sobre) ?></p>
            <a href="/contato/" class="axil-btn btn-outline">Saiba Mais</a>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-5 order-lg-2">
          <div class="about-thumbnail">
            <img src="<?= get_template_directory_uri() ?>/img/about-03.png" alt="about">
          </div>
        </div>
        <div class="col-lg-7 order-lg-1">
          <div class="about-content content-left">
            <span class="subtitle">Destaque #02</span>
            <h4 class="title"><?php the_field('titulo_destaque2', $sobre) ?></h4>
            <p><?php the_field('descricao_destaque1', $sobre) ?></p>
            <a href="/contato/" class="axil-btn btn-outline">Saiba Mais</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End About Area  -->

  <!-- Start Axil Newsletter Area  -->
  <?php get_template_part('inc/newsletter') ?>
  <!-- End Axil Newsletter Area  -->
</main>


<div class="service-area">
  <div class="container">
    <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
      <div class="col">
        <div class="service-box service-style-2">
          <div class="icon">
            <img src="<?= get_template_directory_uri() ?>/img/service1.png" alt="Service">
          </div>
          <div class="content">
            <h6 class="title">Fast &amp; Secure Delivery</h6>
            <p>Tell about your service.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="service-box service-style-2">
          <div class="icon">
            <img src="<?= get_template_directory_uri() ?>/img/service2.png" alt="Service">
          </div>
          <div class="content">
            <h6 class="title">Money Back Guarantee</h6>
            <p>Within 10 days.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="service-box service-style-2">
          <div class="icon">
            <img src="<?= get_template_directory_uri() ?>/img/service3.png" alt="Service">
          </div>
          <div class="content">
            <h6 class="title">24 Hour Return Policy</h6>
            <p>No question ask.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="service-box service-style-2">
          <div class="icon">
            <img src="<?= get_template_directory_uri() ?>/img/service4.png" alt="Service">
          </div>
          <div class="content">
            <h6 class="title">Pro Quality Support</h6>
            <p>24/7 Live support.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer() ?>