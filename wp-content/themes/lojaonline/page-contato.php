<?php
get_header();
$contact = get_page_by_title('contato');
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
              <?php if (have_posts()) : while (have_posts()) : the_post() ?>
                  <li class="axil-breadcrumb-item active" aria-current="page"><?php the_title() ?></li>
              <?php endwhile;
              else : endif; ?>
            </ul>
            <h1 class="title">Entre em contato com a gente!</h1>
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

  <!-- Start Contact Area  -->
  <div class="axil-contact-page-area axil-section-gap">
    <div class="container">
      <div class="axil-contact-page">
        <div class="row row--30">
          <div class="col-lg-8">
            <div class="contact-form">
              <h3 class="title mb--10">Gostariamos de saber mais sobre você.</h3>
              <p>Caso precise conversar com a gente envie uma mensagem abaixo.</p>


              <form id="contact-form" method="POST" class="axil-contact-form">
                <div class="row row--10">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="contact-name">Nome <span>*</span></label>
                      <input type="text" name="contact-name" id="contact-name">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="contact-phone">Telefone <span>*</span></label>
                      <input type="text" name="contact-phone" id="contact-phone">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="contact-email">E-mail <span>*</span></label>
                      <input type="email" name="contact-email" id="contact-email">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="contact-message">Sua Mensagem</label>
                      <textarea name="contact-message" id="contact-message" cols="1" rows="2"></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group mb--0">
                      <button name="submit" type="submit" id="submit" class="axil-btn btn-bg-primary">Enviar Mensagem</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="contact-location mb--40">
              <h4 class="title mb--20">Nossa Loja</h4>
              <span class="address mb--20"><?php the_field('endereco', $contact) ?>, <br /><?php the_field('cidade', $contact) ?></span>
              <span class="phone">Telefone: <?php the_field('telefone', $contact) ?></span>
              <span class="email">Email: <?php the_field('email', $contact) ?></span>
            </div>
            <div class="opening-hour">
              <h4 class="title mb--20">Horários de Abertura:</h4>
              <p>Segunda a Sexta: <?php the_field('horario_semana', $contact) ?>
                <br> Feriádos: <?php the_field('horario_feriados', $contact) ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- Start Google Map Area  -->
      <div class="axil-google-map-wrap axil-section-gap pb--0">
        <div class="mapouter">
          <div class="gmap_canvas">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58453.97526951891!2d-46.65463129812364!3d-23.698354198360082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce445de3962263%3A0x9ca2ba904b9421db!2sDiadema%2C%20State%20of%20S%C3%A3o%20Paulo%2C%20Brazil!5e0!3m2!1sen!2sus!4v1684957202779!5m2!1sen!2sus" width="1080" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <!-- End Google Map Area  -->
    </div>
  </div>
  <!-- End Contact Area  -->
</main>

<?php get_template_part('inc/home/service-garanteed') ?>

<?php get_footer() ?>