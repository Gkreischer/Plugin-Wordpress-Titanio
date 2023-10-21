<?php


// Use as mesmas categorias cadastradas no arquivo /includes/plugins-category.php
// Caso seja uma nova, basta cadastrar uma nova categoria no arquivo
$plugins = [
    'all-in-one-wp-security-and-firewall' => [
        'name' => 'All-in-One WP Security & Firewall',
        'entry_file' => 'wp-security.php',
        'hide_version_download' => false,
        'category' => 'segurança',
    ],
    'quttera-web-malware-scanner' => [
        'name' => 'Quttera Web Malware Scanner',
        'entry_file' => 'quttera_wm_scanner.php',
        'hide_version_download' => false,
        'category' => 'segurança',
    ],
    // Adicione outros plugins aqui
    'elementor' => [
        'name' => 'Elementor',
        'entry_file' => 'elementor.php',
        'hide_version_download' => false,
        'category' => 'design',
    ],
    'all-in-one-wp-migration' => [
        'name' => 'All-in-One WP Migration',
        'entry_file' => 'all-in-one-wp-migration.php',
        'hide_version_download' => false,
        'category' => 'backup',
    ],
    'disable-xml-rpc-api' => [
        'name' => 'Disable XML RPC API',
        'entry_file' => 'disable-xml-rpc-api.php',
        'hide_version_download' => true,
        'category' => 'segurança',
    ],
    'wp-fastest-cache' => [
        'name' => 'WP Fastect Cache',
        'entry_file' => 'wpFastestCache.php',
        'hide_version_download' => false,
        'category' => 'desempenho',
    ],
    'wp-mail-smtp' => [
        'name' => 'WP Mail SMTP',
        'entry_file' => 'wp_mail_smtp.php',
        'hide_version_download' => false,
        'category' => 'email',
    ],
    'wordpress-seo' => [
        'name' => 'Yoast SEO',
        'entry_file' => 'wp-seo.php',
        'hide_version_download' => false,
        'category' => 'seo',
    ],
    'wp-security-audit-log' => [
        'name' => 'Wp Audity Log',
        'entry_file' => 'wp-security-audit-log.php',
        'hide_version_download' => false,
        'category' => 'auditoria',
    ],
    'eps-301-redirects' => [
        'name' => '301 Redirects',
        'entry_file' => 'eps-301-redirects.php',
        'hide_version_download' => false,
        'category' => 'redirecionamento',
    ],
    'quttera-web-malware-scanner' => [
        'name' => 'Quttera Web Malware Scanner',
        'entry_file' => 'quttera_wm_scanner.php',
        'hide_version_download' => false,
        'category' => 'segurança',
    ],
    'debug-bar' => [
        'name' => 'Debug Bar',
        'entry_file' => 'debug-bar.php',
        'hide_version_download' => false,
        'category' => 'desenvolvimento',
    ],
    'query-monitor' => [
        'name' => 'Query Monitor',
        'entry_file' => 'query-monitor.php',
        'hide_version_download' => false,
        'category' => 'desenvolvimento',
    ],
    'show-current-template' => [
        'name' => 'Show Current Template',
        'entry_file' => 'show-current-template.php',
        'hide_version_download' => false,
        'category' => 'desenvolvimento',
    ]
];


define('TITANIO_PLUGINS', $plugins);
