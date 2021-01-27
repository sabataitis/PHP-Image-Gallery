<?php

$router->get('', 'HomeController@index');

// login
$router->get('login', 'LoginController@index');
$router->post('login', 'LoginController@login');

// logout
$router->get('logout', 'LoginController@logout');

// register
$router->get('register', 'RegisterController@index');
$router->post('register', 'RegisterController@store');

// user
$router->get('user', 'UserController@show');

// image
$router->get('image', 'ImageController@show');

// profile
$router->get('profile', 'UserController@profile');

// profile image
$router->get('profile/img', 'ImageController@newImage');
$router->post('profile/img', 'ImageController@storeImage');

// profile desc
$router->get('profile/desc', 'DescriptionController@create');
$router->post('profile/desc', 'DescriptionController@store');
