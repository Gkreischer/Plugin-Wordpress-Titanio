<?php

$plugins_category = ['auditoria', 'segurança', 'design', 'desenvolvimento', 'backup', 'desempenho', 'email', 'redirecionamento', 'seo'];

// Ordena em ordem alfabética
natsort($plugins_category);

define('TITANIO_PLUGINS_CATEGORY', $plugins_category);