<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;

Route::middleware([
    \App\Http\Middleware\InjectPublicViewParams::class
])->group(function (\Illuminate\Routing\Router $router) {
    $router->get('/', 'IndexController@actionIndex');


    //storage资源路由
    Route::group(['prefix' => '/storage'], function() {

        //输出图片到网页
        Route::group(['prefix' => '/images'], function() {
            $uri = \Illuminate\Support\Facades\Request::path();
            $path = str_replace('storage', '', $uri);
            $file = config('filesystems.disks.admin.root').$path;
            if(file_exists($file)){
                //输出图片
                header('Content-type: image/jpg');
                echo file_get_contents($file);
                exit;
            }
        });
    });

});
