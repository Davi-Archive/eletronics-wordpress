<?php get_header() ?>

<?php
$products = [];
if (have_posts()) : while (have_posts()) : the_post();

    $products[] = wc_get_product(get_the_ID());

    $data['products'] = format_products_utils_homepage($products);
?>

    <pre>
    <?php print_r($data['products']); ?>
</pre>

<?php endwhile;
else : endif; ?>

<?php get_footer(); ?>