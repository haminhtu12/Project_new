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

Route::get('/', function () {
    return view('welcome');
});
$prefixadmin = config('zvn.prefix_admin');
Route::prefix($prefixadmin)->group(function () {
    Route::get('users', function () {
        return "/admin/user";
        // Matches The "/admin/users" URL
    });

    // ==================DASHBOARD ===================
        $prefix = 'dashboard';
        $controllName = 'dashboard';
        Route::group(['prefix' => $prefix], function ( )use( $controllName) {

        $controller =ucfirst($controllName) . 'Controller@';
        Route::get('',[                               'as'=>$controllName,             'uses'=> $controller.'index']);
    });
        // ==================SLIDER ===================

    $prefix = 'slider';
    $controllName = 'slider';
    Route::group(['prefix' => $prefix], function ( )use( $controllName) {

    $controller =ucfirst($controllName) . 'Controller@';
    Route::get('',[                               'as'=>$controllName,             'uses'=> $controller.'index']);
    Route::get('form/{id?}',[                     'as'=>$controllName.'/form',     'uses'=> $controller.'form' ])->where('id', '[0-9]+');
    Route::post('save',[                     'as'=>$controllName.'/save',     'uses'=> $controller.'save' ]);
    Route::get('delete/{id}',[                    'as'=>$controllName.'/delete',   'uses'=> $controller.'delete'])->where('id', '[0-9]+');
    Route::get('change-status-{status}/{id}',[    'as'=>$controllName.'/status',   'uses'=> $controller.'status']);
});



    Route::get('category', function () {
        return "/admin/category";
    });

});

