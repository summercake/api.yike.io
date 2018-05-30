<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers:*');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('auth/register', 'AuthController@register');

Route::resources([
    'threads' => 'ThreadController',
    'nodes' => 'NodeController',
    'banners' => 'BannerController',
    'tags' => 'TagController',
    'comments' => 'CommentController',
    'notifications' => 'NotificationController',
]);

Route::post('notifications/mark-all-as-read', 'NotificationController@markAllAsRead')
            ->name('notifications.mark_all_as_read');

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});