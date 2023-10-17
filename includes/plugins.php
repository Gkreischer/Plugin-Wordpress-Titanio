<?php


// Use as mesmas categorias cadastradas no arquivo /includes/plugins-category.php
// Caso seja uma nova, basta cadastrar uma nova categoria no arquivo
$plugins = [
    'all-in-one-wp-security-and-firewall' => 
    [
        'entry_file' => 'wp-security.php',
        'hide_version_download' => false,
        'category' => 'segurança',
    ],
    'quttera-web-malware-scanner' => 
    [
        'entry_file' => 'quttera_wm_scanner.php',
        'hide_version_download' => false,
        'category' => 'segurança',
    ],
    // Adicione outros plugins aqui
    'elementor' => [
        'entry_file' => 'elementor.php',
        'hide_version_download' => false,
        'category' => 'design',
    ],
    'all-in-one-wp-migration' => [
        'entry_file' => 'all-in-one-wp-migration.php',
        'hide_version_download' => false,
        'category' => 'backup',
    ],
    'disable-xml-rpc-api' => [
        'entry_file' => 'disable-xml-rpc-api.php',
        'hide_version_download' => true,
        'category' => 'segurança',
    ],
    'wp-fastest-cache' => [
        'entry_file' => 'wpFastestCache.php',
        'hide_version_download' => false,
        'category' => 'desempenho',
    ],
    'wp-mail-smtp' => [
        'entry_file' => 'wp_mail_smtp.php',
        'hide_version_download' => false,
        'category' => 'email',
    ],
    'wordpress-seo' => [
        'entry_file' => 'wp-seo.php',
        'hide_version_download' => false,
        'category' => 'SEO',
    ]
];


define('TITANIO_PLUGINS', $plugins);