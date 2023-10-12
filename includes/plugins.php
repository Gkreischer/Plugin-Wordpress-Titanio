<?php


// Use as mesmas categorias cadastradas no arquivo /includes/plugins-category.php
// Caso seja uma nova, basta cadastrar uma nova categoria no arquivo
$plugins = [
    'all-in-one-wp-security-and-firewall' => 
    [
        'entry_file' => 'wp-security.php',
        'version' => '5.2.4',
        'hide_version_download' => false,
        'category' => 'segurança',
    ],
    'quttera-web-malware-scanner' => 
    [
        'entry_file' => 'quttera_wm_scanner.php',
        'version' => '3.4.1.41',
        'hide_version_download' => false,
        'category' => 'segurança',
    ],
    // Adicione outros plugins aqui
    'elementor' => [
        'entry_file' => 'elementor.php',
        'version' => '3.16.5',
        'hide_version_download' => false,
        'category' => 'design',
    ],
    'all-in-one-wp-migration' => [
        'entry_file' => 'all-in-one-wp-migration.php',
        'version' => '7.79',
        'hide_version_download' => false,
        'category' => 'backup',
    ],
    'disable-xml-rpc-api' => [
        'entry_file' => 'disable-xml-rpc-api.php',
        'version' => '2.1.5',
        'hide_version_download' => true,
        'category' => 'segurança',
    ],
];


define('TITANIO_PLUGINS', $plugins);