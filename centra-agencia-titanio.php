<?php

/*
 * Plugin Name:       Central Agencia Titanio
 * Plugin URI:        https://gkdeveloper.com.br
 * Description:       Central da Agencia Titanio
 * Version:           0.95
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Gustavo Kreischer de Almeida
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

if (!class_exists('CentralAgenciaTitanio')) {
    class CentralAgenciaTitanio
    {
        public function __construct()
        {
            define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));
            require_once(MY_PLUGIN_PATH . '/vendor/autoload.php');

            $path = preg_replace('/wp-content.*$/', '', __DIR__);

            // Include o WordPress para ter acesso às funções necessárias
            require_once($path . 'wp-load.php'); // Ajuste o caminho conforme necessário

            require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        }

        public function initialize()
        {
            require_once(MY_PLUGIN_PATH . '/includes/custom-post-types.php');

            // Registrar a função para ser executada quando o plugin é ativado
            register_activation_hook(__FILE__, array($this, 'add_my_custom_page'));


            // Carregar Bootstrap no painel administrativo
            add_action('admin_enqueue_scripts', array($this, 'load_bootstrap'));

            add_action('admin_enqueue_scripts', array($this, 'load_assets'));

            require_once(MY_PLUGIN_PATH . '/includes/config-page.php');
            require_once(MY_PLUGIN_PATH . '/includes/install-plugins.php');

            // Registrar a função para ser executada quando o plugin é desativado
            register_deactivation_hook(__FILE__, array($this, 'remove_my_custom_page'));
        }

        public function add_my_custom_page()
        {
            // Criação da página
            $page_title = 'Listagem dos itens do orçamento';
            $page_content = '[quotes_list]'; // Conteúdo da página (use shortcodes se necessário)
            $page_template = 'page-templates/orcamento-template.php'; // Caminho para o seu arquivo de modelo da página de orçamento

            // Verifica se a página não existe antes de criá-la usando WP_Query
            $query = new WP_Query(array('post_type' => 'page', 'title' => $page_title));

            if (!$query->have_posts()) {
                $page_id = wp_insert_post(array(
                    'post_type' => 'page',
                    'post_title' => $page_title,
                    'post_content' => $page_content,
                    'post_status' => 'publish',
                ));

                // Define o modelo de página
                update_post_meta($page_id, '_wp_page_template', $page_template);

                // Atualiza os valores de permalinks para que a nova página seja reconhecida
                flush_rewrite_rules();
            }

            // Limpa os resultados da consulta
            wp_reset_query();
        }

        public function remove_my_custom_page()
        {
            // Verifica se a página existe antes de excluí-la usando WP_Query
            $page_query = new WP_Query(array('post_type' => 'page', 'title' => 'Listagem dos itens do orçamento'));

            if ($page_query->have_posts()) {
                while ($page_query->have_posts()) {
                    $page_query->the_post();
                    $page_id = get_the_ID();
                    wp_delete_post($page_id, true);
                }
            }

            // Limpa os resultados da consulta
            wp_reset_postdata();
        }

        public function load_bootstrap()
        {
            if (is_admin()) {
                wp_enqueue_style('bootstrap', plugin_dir_url(__FILE__) . 'vendor/twbs/bootstrap/dist/css/bootstrap.min.css');
                wp_enqueue_script('bootstrap', plugin_dir_url(__FILE__) . 'vendor/twbs/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
            }
        }

        public function load_assets()
        {
            if (is_admin()) {
                wp_enqueue_style('woo-quote-button', plugin_dir_url(__FILE__) . 'assets/css/woo-quote-button.css');
                wp_enqueue_script('woo-quote-button', plugin_dir_url(__FILE__) . 'assets/js/woo-quote-button.js', array('jquery'), '1.0.0', true);
            }
        }
    }



    $wooQuoteButtonPlugin = new CentralAgenciaTitanio;
    $wooQuoteButtonPlugin->initialize();
}
