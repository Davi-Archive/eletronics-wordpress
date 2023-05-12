 <!-- Banner Header Start ( REMOVER )-->
 <?php foreach ($data['banner'] as $product) : ?>
   <div class="axil-main-slider-area main-slider-style-1">
     <div class="container">
       <div class="row align-items-center" style="flex-wrap: nowrap;">
         <div class="col-lg-5 col-sm-6">
           <div class="main-slider-content">
             <div class="slider-content-activation-one slick-initialized slick-slider">
               <div class="slick-list draggable">
                 <div class="slick-track" style="opacity: 1; width: 2020px;">

                   <div class="single-slide slick-slide slick-current slick-active sal-animate">
                     <span class="subtitle">
                       <i class="fa-solid fa-fire"></i> Oferta Quente da Semana</span>
                     <h1 class="title"><?= $product['name'] ?></h1>
                     <div class="slide-action">
                       <div class="shop-btn">
                         <a href="<?= $product['link'] ?>" class="axil-btn btn-bg-white" tabindex="0">
                           <i class="fa-solid fa-cart-shopping-fast fa-2xs"></i>
                           Comprar Agora</a>
                       </div>
                     </div>
                   </div>

                 </div>
               </div>
             </div>
           </div>
         </div>


         <div class="main-slider-large-thumb">
           <div class="single-slide">
             <img src="<?php the_field('imagem_banner_topo', $home) ?>" alt="<?= $product['name'] ?>">
             <div class="product-price">
               <span class="text">Por</span>
               <span class="price-amount">R$<?= $product['price'] ?></span>
             </div>
           </div>
         </div>
       </div>
     </div>
     <ul class="shape-group">
       <li class="shape-1">
         <img src="<?= get_template_directory_uri() ?>/img/shape-1.png" alt="Shape">
       </li>
       <li class="shape-2"><img src="<?= get_template_directory_uri() ?>/img/shape-2.png" alt="Shape"></li>
     </ul>
   </div>
 <?php endforeach; ?>
 <!-- Banner Header End-->