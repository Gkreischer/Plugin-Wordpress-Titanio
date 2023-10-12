<?php


add_action('wp_ajax_central_agencia_titanio_install_plugin', 'central_agencia_titanio_install_plugin');
add_action('wp_ajax_nopriv_central_agencia_titanio_install_plugin', 'central_agencia_titanio_install_plugin');

function central_agencia_titanio_install_plugin()
{
    if (!current_user_can('install_plugins')) {
        wp_send_json_error('Você não tem permissões para instalar plugins.');
    }

    $plugin_slug = sanitize_text_field($_POST['plugin_name']);
    $plugin_hide_version = sanitize_text_field($_POST['plugin_hide_version']);
    $plugin_version =  !$plugin_hide_version ? '.' . sanitize_text_field($_POST['plugin_version']) : ''; ; 
    $plugin_entry_file = sanitize_text_field($_POST['plugin_entry_file']);
    

    // Crie a URL do plugin no repositório do WordPress
    $plugin_url = 'https://downloads.wordpress.org/plugin/' . $plugin_slug . $plugin_version . '.zip';

    // Inclua o script de mídia WordPress para usar a função `wp_enqueue_media()`
    wp_enqueue_media();

    // Defina os argumentos para o download do arquivo zip do plugin
    $download_args = array(
        'timeout' => 300,  // Tempo limite em segundos
    );

    // Faça o download do arquivo zip do plugin
    $download_response = wp_safe_remote_get($plugin_url, $download_args);

    if (is_wp_error($download_response)) {
        wp_send_json_error('Erro ao baixar o plugin: ' . $download_response->get_error_message());
    }

    // Salve o arquivo zip em um local temporário
    $tmp_file = wp_tempnam($plugin_slug);
    if (is_wp_error($tmp_file)) {
        wp_send_json_error('Erro ao criar o arquivo temporário.');
    }

    $tmp_file_handle = fopen($tmp_file, 'wb');
    if ($tmp_file_handle) {
        fwrite($tmp_file_handle, $download_response['body']);
        fclose($tmp_file_handle);

        // Use a função WP_Upgrader para instalar o plugin
        $plugin_upgrader = new Plugin_Upgrader(new Automatic_Upgrader_Skin());
        $install_result = $plugin_upgrader->install($tmp_file);

        if (is_wp_error($install_result)) {
            wp_send_json_error('Erro ao instalar o plugin: ' . $install_result->get_error_message());
        } else {
            // Obtenha o caminho do arquivo do plugin após a instalação
            $installed_plugin_file = trailingslashit(WP_PLUGIN_DIR) . $plugin_slug . '/' . $plugin_entry_file;

            // Ative o plugin
            $activation_result = activate_plugin($installed_plugin_file);
            if (is_wp_error($activation_result)) {
                wp_send_json_error('Erro ao ativar o plugin: ' . $activation_result->get_error_message() . ' caminho: ' . $installed_plugin_file . 'Download URL' . $plugin_url);
            } else {
                wp_send_json_success('Plugin instalado e ativado com sucesso!');
            }
        }
    } else {
        wp_send_json_error('Erro ao salvar o arquivo temporário.');
    }
}
