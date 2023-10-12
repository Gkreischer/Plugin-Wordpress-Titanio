<?php

// Função para lidar com a solicitação AJAX de categorias
function wooquotebutton_get_categories_ajax()
{
    // Obtenha as categorias do WooCommerce
    $categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
    ));

    wp_send_json($categories);
}
add_action('wp_ajax_wooquotebutton_get_categories', 'wooquotebutton_get_categories_ajax');
add_action('wp_ajax_nopriv_wooquotebutton_get_categories', 'wooquotebutton_get_categories_ajax');

// Função para lidar com a solicitação AJAX de produtos
function wooquotebutton_get_products_ajax()
{
    // Obtenha os produtos do WooCommerce
    $products = get_posts(array(
        'post_type' => 'product',
        'numberposts' => -1,
    ));

    wp_send_json($products);
}
add_action('wp_ajax_wooquotebutton_get_products', 'wooquotebutton_get_products_ajax');
add_action('wp_ajax_nopriv_wooquotebutton_get_products', 'wooquotebutton_get_products_ajax');
