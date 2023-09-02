<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(["prefix"=>"auth"], function () use ($router) {
    $router->post("login", "AuthController@login");
    $router->post("register", "AuthController@register");
    $router->put("verification", "AuthController@verification");
    $router->post("logout", "AuthController@logout");
    $router->post("refresh", "AuthController@refresh");
    $router->get("user-profile", "AuthController@whoami");
});
$router->group(["middleware"=>"auth","prefix"=>"cars"],function ()use($router){
    $router->get("/",function (){
       return response()->json("oke");
    });
});
