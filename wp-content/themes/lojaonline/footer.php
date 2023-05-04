 <?php
    $contato = get_page_by_title('contato');
    ?>
 <!-- Start Footer Area  -->
 <footer class="axil-footer-area footer-style-2">
     <!-- Start Footer Top Area  -->
     <div class="footer-top separator-top">
         <div class="container">
             <div class="row">
                 <!-- Start Single Widget  -->
                 <div class="col-lg-3 col-sm-6">
                     <div class="axil-footer-widget">
                         <h5 class="widget-title">Suporte</h5>
                         <div class="logo mb--30">
                             <a href="/">
                                 <img class="light-logo" src="<?= get_template_directory_uri() ?>/img/logo.png" alt="Logo Images">
                             </a>
                         </div>
                         <div class="inner">
                             <p><?php the_field('endereco', $contato) ?>, <br />
                                 <?php the_field('cidade', $contato) ?>, <br />
                                 Brasil.
                             </p>

                             <ul class="support-list-item">
                                 <li><a href="mailto:<?php the_field('email', $contato) ?>"><i class="fas fa-envelope-open"></i> <?php the_field('email', $contato) ?></a></li>
                                 <li><a href="tel:<?php the_field('telefone', $contato) ?>"><i class="fas fa-phone-alt"></i> <?php the_field('telefone', $contato) ?></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- End Single Widget  -->
                 <!-- Start Single Widget  -->
                 <div class="col-lg-3 col-sm-6">
                     <div class="axil-footer-widget">
                         <h5 class="widget-title">Contato</h5>
                         <div class="inner">
                             <ul>
                                 <?php
                                    $args = array(
                                        'menu' => 'contato',
                                        'theme_location' => 'contato',
                                        'container' => false
                                    );
                                    wp_nav_menu($args);
                                    ?>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- End Single Widget  -->
                 <!-- Start Single Widget  -->
                 <div class="col-lg-3 col-sm-6">
                     <div class="axil-footer-widget">
                         <h5 class="widget-title">Links Rápidos</h5>
                         <div class="inner">
                             <ul>
                                 <?php
                                    $args = array(
                                        'menu' => 'links_rapidos',
                                        'theme_location' => 'links_rapidos',
                                        'container' => false
                                    );
                                    wp_nav_menu($args);
                                    ?>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- End Single Widget  -->
                 <!-- Start Single Widget  -->
                 <div class="col-lg-3 col-sm-6">

                     <?php if (get_field('download_celular')) : ?>

                         <div class="axil-footer-widget">
                             <h5 class="widget-title">Baixe nosso Aplicativo</h5>
                             <div class="inner">
                                 <span>Salve R$3 Com nosso aplicativo &amp; Apenas novos usuários</span>
                                 <div class="download-btn-group">
                                     <div class="qr-code">
                                         <img src="<?= get_template_directory_uri() ?>/img/qr.png" alt="Axilthemes">
                                     </div>
                                     <div class="app-link">
                                         <a href="/">
                                             <img src="<?= get_template_directory_uri() ?>/img/app-store.png" alt="App Store">
                                         </a>
                                         <a href="/">
                                             <img src="<?= get_template_directory_uri() ?>/img/play-store.png" alt="Play Store">
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     <?php else : ?>

                         <div class="axil-footer-widget">
                             <h5 class="widget-title">Visite nossa loja</h5>
                             <div class="inner">
                                 <span>Envie nosso loja por QR Code. </span>
                                 <div class="download-btn-group">
                                     <div class="qr-code">
                                         <img src="<?= get_template_directory_uri() ?>/img/qr.png" alt="Axilthemes">
                                     </div>
                                 </div>
                             </div>
                         </div>

                     <?php endif; ?>

                 </div>
                 <!-- End Single Widget  -->
             </div>
         </div>
     </div>
     <!-- End Footer Top Area  -->
     <!-- Start Copyright Area  -->
     <div class="copyright-area copyright-default separator-top">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-xl-4">
                     <div class="social-share">
                         <?php if (get_field('facebook', $contato) != '') : ?>
                             <a href="<?php the_field('facebook', $contato) ?>"><i class="fab fa-facebook-f"></i></a>
                         <?php endif; ?>

                         <?php if (get_field('instagram', $contato) != '') : ?>
                             <a href="<?php the_field('instagram', $contato) ?>"><i class="fab fa-instagram"></i></a>
                         <?php endif; ?>

                         <?php if (get_field('twitter', $contato) != '') : ?>
                             <a href="<?php the_field('twitter', $contato) ?>"><i class="fab fa-twitter"></i></a>
                         <?php endif; ?>

                         <?php if (get_field('linkedin', $contato) != '') : ?>
                             <a href="<?php the_field('linkedin', $contato) ?>"><i class="fab fa-linkedin-in"></i></a>
                         <?php endif; ?>

                         <?php if (get_field('discord', $contato) != '') : ?>
                             <a href="<?php the_field('discord', $contato) ?>"><i class="fab fa-discord"></i></a>
                         <?php endif; ?>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-12">
                     <div class="copyright-left d-flex flex-wrap justify-content-center">
                         <ul class="quick-link">
                             <li>© <?= date('Y') ?> . Todos os direitos reservados <a target="_blank" href="/">TechWave</a>.</li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-12">
                     <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                         <span class="card-text">Aceitamos</span>
                         <ul class="payment-icons-bottom quick-link">

                             <?php if (get_field('paypal')) : ?>
                                 <li><img src="<?= get_template_directory_uri() ?>/img/cart-1.png" alt="paypal cart"></li>
                             <?php endif; ?>

                             <?php if (get_field('mastercard')) : ?>
                                 <li><img src="<?= get_template_directory_uri() ?>/img/cart-2.png" alt="paypal cart"></li>
                             <?php endif; ?>

                             <?php if (get_field('visa')) : ?>
                                 <li><img src="<?= get_template_directory_uri() ?>/img/cart-5.png" alt="paypal cart"></li>
                             <?php endif; ?>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Copyright Area  -->
     <?php wp_footer(); ?>
 </footer>
 <!-- End Footer Area  -->