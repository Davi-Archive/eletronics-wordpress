<?php
// produtos do carrinho
$cart_items = WC()->cart->get_cart();
function format_cart_items($items)
{
    $cart_final = [];
    foreach ($items as $item) {
        $product_id = $item['product_id'];
        $product = new WC_Product_Simple($product_id);
        $product_name = get_the_title($product_id);
        $product_url = get_permalink($product_id);
        $product_image = get_the_post_thumbnail($product_id, 'thumbnail');
        $product_price = wc_price($item['line_subtotal']);
        $quantity = $item['quantity'];
        $single_price = $product->get_price();
        $remove_product = wc_get_cart_remove_url($item['key']);

        $add_product_cart = sprintf(
            '<a href="%s" data-quantity="%s" class="button add_to_cart_button product_type_%s">%s</a>',
            esc_url($product->add_to_cart_url()),
            esc_attr(isset($quantity) ? $quantity : 1),
            esc_attr($product->product_type),
            esc_html('+')
        );

        $cart_final[] = [
            'id' => $product_id,
            'name' => $product_name,
            'url' => $product_url,
            'image' => $product_image,
            'totalprice' => $product_price,
            'singleprice' => $single_price,
            'quantity' => $quantity,
            'removeurl' => $remove_product,
            'add_product' => $add_product_cart
        ];
    }

    return $cart_final;
}


// Cart total price
$cart = WC()->cart;
// Check if the cart is empty
$subtotal;
if ($cart->is_empty()) {
    $subtotal = 'O Carrinho está vazio.';
    return;
} else {
    $total_price = 0;
    foreach ($cart->get_cart_contents() as $item) {
        $total_price += $item['line_total'] + $item['line_tax'];
    }
    $subtotal = wc_price($total_price);
}

// Return all data processed
$data['cart_items'] = format_cart_items($cart_items);
$data['subtotal'] = $subtotal;

//print_r($data);

?>


<div class="cart-dropdown" id="cart-dropdown">
    <div class="cart-content-wrap">
        <div class="cart-header">
            <h2 class="header-title">Carrinho de Compras</h2>
            <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
        </div>
        <div class="cart-body">
            <ul class="cart-item-list">
                <?php foreach ($data['cart_items'] as $item) { ?>
                    <li class="cart-item">
                        <div class="item-img">
                            <a href="/carrinho/">
                                <?= $item['image'] ?>
                            </a>
                            <a href="<?= $item['removeurl'] ?>">
                                <!-- <button class="close-btn remove-from-cart-button" data-product-id="<?php //echo $item['id']; ?>">
                                    <i class="fas fa-times"></i>
                                </button> -->
                            </a>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">
                                    <?php
                                    // TODO: rating
                                    ?>
                                </span>
                            </div>
                            <h3 class="item-title">
                                <a href="/carrinho/"><?= $item['name'] ?></a>
                            </h3>
                            <div class="item-price"><span class="currency-symbol"></span><?= $item['totalprice'] ?></div>

                            <div class="pro-qty item-quantity">
                                    Qtd:<input disabled type="number" class="quantity-input" value="<?= $item['quantity'] ?>">
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="cart-footer">
            <h3 class="cart-subtotal">
                <span class="subtotal-title">Subtotal:</span>
                <span class="subtotal-amount"><?= $data['subtotal'] ?></span>
            </h3>
            <div class="group-btn">
                <a href="/carrinho/" class="axil-btn btn-bg-primary viewcart-btn">Carrinho</a>
                <a href="/finalizar-compra/" class="axil-btn btn-bg-secondary checkout-btn">Finalizar Compra</a>
            </div>
        </div>
    </div>
</div>