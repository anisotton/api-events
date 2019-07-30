<?php
//Rotas de Login


$this->group(['namespace' => 'Auth'], function () {    
    $this->post('login', 'AuthenticateController@authenticate');
    $this->post('logout', 'AuthenticateController@logout');
    $this->post('login-refresh', 'AuthenticateController@refreshToken');
    $this->get('me', 'AuthenticateController@getAuthenticatedUser');
});

$this->group(['namespace' => 'Api'], function () {
    $this->get('all-events', 'EventApiController@allEvents');
});


$this->group(['namespace' => 'Api', 'middleware' => 'auth:api'], function () {
    $this->apiResource('events', 'EventApiController');
    $this->get('event/{id}/publish', 'EventApiController@publish');
    $this->get('event/{id}/unpublish', 'EventApiController@unpublish');
});



