<?php

function central_titanio_register_rest_api_post_activities()
{
    register_rest_route('central-agencia-titanio/v1', '/activities', array(
        'methods' => WP_REST_SERVER::CREATABLE,
        'callback' => 'central_agencia_titanio_post_activities',
    ));
}

add_action('rest_api_init', 'central_titanio_register_rest_api_post_activities');

function central_agencia_titanio_post_activities(WP_REST_Request $request)
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

    $params['virus_scan'] = isset($params['virus_scan']) && $params['virus_scan'] == 'on' ? 1 : 0;
    $params['theme_update'] = isset($params['theme_update']) && $params['theme_update'] == 'on' ? 1 : 0;
    $params['plugins_update'] = isset($params['plugins_update']) && $params['plugins_update'] == 'on' ? 1 : 0;


    global $wpdb;

    $table_name = $wpdb->prefix . 'central_agencia_titanio_activities';

    if ($params['id'] !== 'null') {
        $id = (int) $request->get_param('id');
        unset($params['id']);
    
        $result = $wpdb->update($table_name, $params, array('id' => $id));
    
        if ($result === false) {
            return new WP_REST_Response($wpdb->last_error, 500);
        }
    
        return new WP_REST_Response('Atividade atualizada com sucesso', 200);
    } else {
        unset($params['id']);
        $result = $wpdb->insert($table_name, $params);
    
        if (!$result) {
            return new WP_REST_Response($wpdb->last_error, 500);
        }
    
        return new WP_REST_Response('Atividade criada com sucesso', 200);
    }
}
