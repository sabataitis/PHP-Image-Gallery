<?php

namespace Core;

// use App\Controllers\HomeController;
// use App\Controllers\UserController;
use App\Helpers\Helper;

class Router
{
    protected $routes = [
        'POST' => [],
        'GET' => [],
        'PUT' => [],
        'DELETE' => [],
    ];

    public static function load($routes) {
        $router = new static;

        require '../' . $routes;

        return $router;
    }

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType) {
        if (!array_key_exists($uri, $this->routes[$requestType])) {
            return Helper::view('404');
        }
        return $this->call(
            ...explode('@', $this->routes[$requestType][$uri]));
    }

    protected function call($controller, $action) {
        $controllerObj = "App\\Controllers\\{$controller}";
        $controller = new $controllerObj;

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to {$action} action."
            );
        }
        return $controller->$action();
    }
}
