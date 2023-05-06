<?php
$home = get_page_by_title('home');
$full_link = get_site_url() . get_field('produto_contagem_url', $home);
?>
<!-- Poster Countdown Area  -->
<div class="axil-poster-countdown">
    <div class="container">
        <div class="poster-countdown-wrap bg-lighter">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="poster-countdown-content">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-secondary"> <i class="fas fa-headphones-alt"></i> Não Perca!</span>
                            <h2 class="title">Melhore a sua experiência</h2>
                        </div>
                        <div class="poster-countdown countdown mb--40">
                            <div class="countdown-section">
                                <div>
                                    <div class="countdown-number">0</div>
                                    <div class="countdown-unit">Dias</div>
                                </div>
                            </div>
                            <div class="countdown-section">
                                <div>
                                    <div class="countdown-number">00</div>
                                    <div class="countdown-unit">Hrs</div>
                                </div>
                            </div>
                            <div class="countdown-section">
                                <div>
                                    <div class="countdown-number">00</div>
                                    <div class="countdown-unit">Min</div>
                                </div>
                            </div>
                            <div class="countdown-section">
                                <div>
                                    <div class="countdown-number">00</div>
                                    <div class="countdown-unit">Seg</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= $full_link ?>" class="axil-btn btn-bg-primary">Leve agora!</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="poster-countdown-thumbnail">
                        <img src="<?= get_template_directory_uri() ?>/img/poster-03.png" alt="Poster Product">
                        <div class="music-singnal">
                            <div class="item-circle circle-1"></div>
                            <div class="item-circle circle-2"></div>
                            <div class="item-circle circle-3"></div>
                            <div class="item-circle circle-4"></div>
                            <div class="item-circle circle-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Poster Countdown Area  -->