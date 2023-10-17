<?php

$plugins_category = ['segurança', 'design' , 'backup', 'desempenho', 'email', 'seo'];

// Ordena em ordem alfabética
natsort($plugins_category);

define('TITANIO_PLUGINS_CATEGORY', $plugins_category);