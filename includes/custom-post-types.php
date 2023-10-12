<?php

function central_titanio_add_custom_post()
{
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
    );
    $labels = array(
        'name' => _x('Ag. Titanio', 'plural'),
        'singular_name' => _x('Ag. Titanio', 'singular'),
        'menu_name' => _x('Ag. Titanio', 'admin menu'),
        'name_admin_bar' => _x('Ag. Titanio', 'admin bar'),
        'add_new' => _x('Adicionar', 'add new'),
        'add_new_item' => __('Adicionar orçamento'),
        'new_item' => __('Novo orçamento'),
        'edit_item' => __('Editar orçamento'),
        'view_item' => __('Ver orçamento'),
        'all_items' => __('Todos'),
        'search_items' => __('Procurar orçamento'),
        'not_found' => __('Nenhum orçamento encontrado'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'titanio'),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-list-view'
    );
    register_post_type('titanio', $args);
}
add_action('init', 'central_titanio_add_custom_post');

// Adicione a subpágina de configuração dentro de um gancho de admin_menu
function central_titanio_add_config_page()
{
    add_submenu_page(
        'edit.php?post_type=titanio',
        'Plugins',
        'Plugins',
        'manage_options',
        'central-titanio-config',
        'central_titanio_plugins_page_callback'
    );
}
add_action('admin_menu', 'central_titanio_add_config_page');

// Callback para a página de configuração
function central_titanio_plugins_page_callback()
{
    include_once(MY_PLUGIN_PATH . '/templates/config-page.php');
}
