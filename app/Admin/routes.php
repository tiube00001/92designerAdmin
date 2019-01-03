<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('page/menu', 'Page\MenuController', ['except' => ['create']]);
    $router->resource('page/banner', 'Page\BannerController');
    $router->resource('page/{parentId}/sub-banner', 'Page\SubBannerController');

});
