<?php

function central_titanio_register_rest_api_delete_activity()
{
    register_rest_route('central-agencia-titanio/v1', '/activities/(?P<id>[0-9]+)/delete', array(
        'methods' => WP_REST_SERVER::CREATABLE,
        'callback' => 'central_agencia_titanio_delete_activity',
    ));
}

add_action('rest_api_init', 'central_titanio_register_rest_api_delete_activity');

function central_agencia_titanio_delete_activity(WP_REST_Request $request)
{

    $params = $request->get_params();
    $headers = $request->get_headers();
    $nonce = $headers['x_wp_nonce'][0];

    if (!wp_verify_nonce($nonce, 'wp_rest')) {
        return new WP_REST_Response('Nonce inválido', 400);
    }

    if (!isset($params)) {
        return new WP_REST_Response('Nenhuma informação recebida', 400);
    }

    global $wpdb;

    $table_name = $wpdb->prefix . 'central_agencia_titanio_activities';

    if ($params['id'] !== 'null') {
        $id = (int) $request->get_param('id');
        unset($params['id']);
    
        $result = $wpdb->delete($table_name, array('id' => $id));
    
        if ($result === false) {
            return new WP_REST_Response($wpdb->last_error, 500);
        }
    
        return new WP_REST_Response('Atividade removida com sucesso', 200);
    } else {
        return new WP_REST_Response('Nenhuma ID recebida', 400);
    }
}
