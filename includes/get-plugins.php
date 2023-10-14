<?php

function central_agencia_titanio_get_installed_plugins_version()
{
    $active_plugins = get_option('active_plugins');
    $plugins = get_plugins();
    $installed_plugins = [];

    foreach ($active_plugins as $plugin) {
        $plugin_data = $plugins[$plugin];
        if ($plugin_data) {
            $plugin_info = array(
                'TextDomain' => $plugin_data['TextDomain'],
                'Version' => $plugin_data['Version'],
            );
            $installed_plugins[] = $plugin_info;
        }
    }

    wp_send_json($installed_plugins, 200);
}

add_action('wp_ajax_central_agencia_titanio_get_installed_plugins_version', 'central_agencia_titanio_get_installed_plugins_version');
add_action('wp_ajax_nopriv_central_agencia_titanio_get_installed_plugins_version', 'central_agencia_titanio_get_installed_plugins_version');
