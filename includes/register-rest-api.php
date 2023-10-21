<?php

function central_titanio_register_rest_api() {
    register_rest_route('central-agencia-titanio/v1', '/activities', array(
        'methods' => 'GET',
        'callback' => 'central_agencia_titanio_post_activities',
    ));
}

add_action('rest_api_init', 'central_titanio_register_rest_api');

function central_agencia_titanio_post_activities($request) {
    echo 'hello, is working';
}

