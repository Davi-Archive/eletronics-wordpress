    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form class="search-form-input" action="<?php bloginfo('url') ?>/loja/" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="s" id="s" placeholder="Buscar..." value="<?php the_search_query() ?>">
                        <button type="submit" class="axil-btn btn-bg-primary">
                            <img src="<?= get_template_directory_uri() ?>/img/icon/search.svg" height="20" width="20" alt="Search" />
                            1
                        </button>
                        <input type="text" name="post_type" value="product" class="hidden" />

                    </div>
                    <button type="submit" class="button-search-input" role="button">Buscar</button>
                </form>
            </div>

        </div>
    </div>
    <!-- Header Search Modal End -->