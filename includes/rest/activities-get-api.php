<?php

function central_agencia_titanio_get_activities($request) {
    
    $headers = $request->get_headers();
    $nonce = $headers['x_wp_nonce'][0];

    if (!wp_verify_nonce($nonce, 'wp_rest')) {
        return new WP_REST_Response('Nonce inválido', 400);
    }

    global $wpdb;

    $table_name = $wpdb->prefix . 'central_agencia_titanio_activities';

    $result = $wpdb->get_results("SELECT * FROM $table_name");

    if ( $wpdb->last_error ) {
        return new WP_REST_Response($wpdb->last_error, 500);
    }

    if ($result && count($result) == 0) {
        return new WP_REST_Response('Nenhum registro efetuado');
    }

    return new WP_REST_Response($result);
}

function central_titanio_register_rest_get_api() {
    register_rest_route('central-agencia-titanio/v1', '/activities', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'central_agencia_titanio_get_activities',
    ));
}

add_action('rest_api_init', 'central_titanio_register_rest_get_api', 9 );

function central_agencia_titanio_get_specific_activity($request) {

    $id = $request->get_param('id');
    $headers = $request->get_headers();
    $nonce = $headers['x_wp_nonce'][0];

    if (!wp_verify_nonce($nonce, 'wp_rest')) {
        return new WP_REST_Response('Nonce inválido', 400);
    }

    global $wpdb;

    $table_name = $wpdb->prefix . 'central_agencia_titanio_activities';

    $result = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $id");

    if ( $wpdb->last_error ) {
        return new WP_REST_Response($wpdb->last_error, 500);
    }

    if ($result) {
        return new WP_REST_Response($result);
    }

    return new WP_REST_Response('Nenhum registro efetuado');
}

function central_titanio_register_rest_get_specific_api() {
    register_rest_route('central-agencia-titanio/v1', '/activities/(?P<id>[0-9]+)', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'central_agencia_titanio_get_specific_activity',
    ));
}

add_action('rest_api_init', 'central_titanio_register_rest_get_specific_api' , 9);