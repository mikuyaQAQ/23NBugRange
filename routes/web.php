<?php

// use App\Http\Controllers\Admin\UserController; // TEST

use App\Http\Controllers\DockerComposeController;

// 导入ApplicationController控制器
use App\Http\Controllers\ApplicationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin/dashboard', function (){
//     return view('dashboard'); 
//     // 注释：这个文件在resources/views/dashboard.blade.php
// });

// 使用auth中间件保护route（只有经过验证的用户才能访问）
// 做个route中间件调用auth,使用group把每个路由都包裹起来
Route::middleware('auth')->group(function () {

    // Route::get('/api/users', [UserController::class, 'index']); 
    // Route::post('/api/users', [UserController::class, 'store']);
    Route::post('/startEnvironment', [DockerComposeController::class, 'startEnvironment']);
    Route::post('/stopEnvironment', [DockerComposeController::class, 'stopEnvironment']);

});


// 路由，控制器为ApplicationController   添加条件                           auth中间件
Route::get('{view}', ApplicationController::class)->where('view', '(.*)')->middleware('auth');
// 使用Blaue来渲染视图

