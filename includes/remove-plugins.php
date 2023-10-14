<?php


add_action('wp_ajax_central_agencia_titanio_remove_plugin', 'central_agencia_titanio_remove_plugin');
add_action('wp_ajax_nopriv_central_agencia_titanio_remove_plugin', 'central_agencia_titanio_remove_plugin');

function central_agencia_titanio_remove_plugin()
{
    if (!current_user_can('delete_plugins')) {
        wp_send_json_error('Você não tem permissões para remover plugins.');
    }

    $plugin_slug = sanitize_text_field($_POST['plugin_name']);
    $plugin_version = sanitize_text_field($_POST['plugin_version']); // Nome do plugin no repositório do WordPress
    $plugin_entry_file = sanitize_text_field($_POST['plugin_entry_file']);

    $plugin_path = trailingslashit(WP_PLUGIN_DIR) . $plugin_slug . '/' . $plugin_entry_file;

    // Desative o plugin
    deactivate_plugins($plugin_path);

    // Remova o plugin
    $result = uninstall_plugin($plugin_slug);

    if (is_wp_error($result)) {
        wp_send_json_error('Erro ao remover o plugin: ' . $result->get_error_message());
    } else {
        // Remova a pasta do plugin após a desinstalação bem-sucedida
        $deleted = delete_plugins(array($plugin_slug . '/' . $plugin_entry_file));

        if ($deleted) {
            wp_send_json_success('Plugin e pasta removidos com sucesso.');
        } else {
            wp_send_json_error('Erro ao remover a pasta do plugin.');
        }
    }
}
