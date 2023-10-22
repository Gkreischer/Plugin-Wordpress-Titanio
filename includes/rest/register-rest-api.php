<?php

function central_titanio_register_rest_api() {
    register_rest_route('central-agencia-titanio/v1', '/activities', array(
        'methods' => 'POST',
        'callback' => 'central_agencia_titanio_post_activities',
    ));
}

add_action('rest_api_init', 'central_titanio_register_rest_api');

function central_agencia_titanio_post_activities(WP_REST_Request $request) {
    
    $params = $request->get_params();
    $headers = $request->get_headers();

    if(!isset($params)) {
        return new WP_REST_Response('Nenhuma informação recebida', 400);
    }

    $sanitized_params = [];
    foreach($params as $param) {
        $sanitized_params[] = sanitize_text_field($param);
    }

    return wp_send_json($sanitized_params);
}

