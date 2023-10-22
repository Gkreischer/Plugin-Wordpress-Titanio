<?php

function central_agencia_titanio_create_table_activities() {
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();

    $table_name = $wpdb->prefix . 'central_agencia_titanio_activities';

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        date datetime NOT NULL,
        name varchar(255) NOT NULL,
        description text NOT NULL,
        virus_scan tinyint(1) NOT NULL,
        theme_update tinyint(1) NOT NULL,
        plugins_update tinyint(1) NOT NULL,
        obs text NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    dbDelta( $sql );

    if ( $wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name ) {
        return wp_send_json_error( 'Erro ao criar a tabela', 500 );
    }

    return true;
}

central_agencia_titanio_create_table_activities();

