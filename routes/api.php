<?php

use Illuminate\Http\Request;

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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function ($api) {

    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' =>  config('api.rate_limits.sign.expires'),
    ], function ($api) {
        $api->post('verificationCodes', 'VerificationCodesController@store')
            ->name('api.verificationCode.store');
        // 用户注册
        $api->post('users', 'UsersController@store')->name('api.users.store');

        $api->post('captchas','CaptchasController@store')->name('api.captchas.store');
    });

});
