<?php

use Illuminate\Support\Facades\Route;

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
//
//Route::get('/', function () {
//    $path = 'App\Http\Controllers\HomeController';
//    $new = new $path;
//    $new->index();
//});

Route::get('/{controller?}/{action?}', function ($controller = 'home',$action = 'index') {
    $path = 'App\Http\Controllers\\' . ucfirst($controller) . 'Controller';
    if (!class_exists($path)){
        return view('NotFound');
//       die("not - found class {$controller}");
    }else{
        $obj = new $path;
        if (!method_exists($obj,$action)){
            return view('NotFound');
//            die("not - found method {$action}");
        }else{
            $obj->$action();
        }
    }

})->where([
    'controller' => '[a-z]+',
    'action' => '[a-z]+'
    ]);



