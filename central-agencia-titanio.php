<?php

/*
 * Plugin Name:       Central Agencia Titanio
 * Plugin URI:        https://agenciatitanio.com.br
 * Description:       Central da Agencia Titanio
 * Version:           0.95
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Gustavo Kreischer de Almeida - Ag. Titânio
 * Author URI:        https://gkdeveloper.com.br
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       woo-quote-button
 * Domain Path:       /languages
 */

/*
AgenciaTitanio is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

AgenciaTitanio is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with AgenciaTitanio. If not, see {URI to Plugin License}.
*/


if (!defined('ABSPATH')) {
    die();
}

define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));


if (!class_exists('CentralAgenciaTitanio')) {
    class CentralAgenciaTitanio
    {
        public function __construct()
        {
            require_once(MY_PLUGIN_PATH . '/vendor/autoload.php');

            $path = preg_replace('/wp-content.*$/', '', __DIR__);

            // Include o WordPress para ter acesso às funções necessárias
            require_once($path . 'wp-load.php'); // Ajuste o caminho conforme necessário

            require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        public function initialize()
        {
            require_once(MY_PLUGIN_PATH . '/includes/custom-post-types.php');
            require_once(MY_PLUGIN_PATH . '/includes/install-plugins.php');
            require_once(MY_PLUGIN_PATH . '/includes/get-plugins.php');
            require_once(MY_PLUGIN_PATH . '/includes/remove-plugins.php');
            require_once(MY_PLUGIN_PATH . '/includes/plugins.php');
            require_once(MY_PLUGIN_PATH . '/includes/plugins-category.php');
            require_once(MY_PLUGIN_PATH . '/includes/rest/activities-post-api.php');
            require_once(MY_PLUGIN_PATH . '/includes/rest/activities-get-api.php');
            require_once(MY_PLUGIN_PATH . '/includes/sql/create_table_activities.php');

            // Carregar Bootstrap no painel administrativo
            add_action('admin_enqueue_scripts', array($this, 'load_bootstrap'));
            add_action('admin_enqueue_scripts', array($this, 'load_assets'));

        }

        public function load_bootstrap()
        {
            if (is_admin()) {
                wp_enqueue_style('central_agencia_titanio_bootstrap', plugin_dir_url(__FILE__) . 'vendor/twbs/bootstrap/dist/css/bootstrap.min.css', true, '5.3.2', 'all');
                wp_enqueue_script('central_agencia_titanio_bootstrap', plugin_dir_url(__FILE__) . 'vendor/twbs/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '5.3.2', false);
            }
        }

        public function load_assets()
        {
            if (is_admin()) {
                wp_enqueue_style('central_agencia_titanio', plugin_dir_url(__FILE__) . 'assets/css/central-agencia-titanio.css');
            }
        }
    }



    $CentralAgenciaTitanio = new CentralAgenciaTitanio;
    $CentralAgenciaTitanio->initialize();
}
