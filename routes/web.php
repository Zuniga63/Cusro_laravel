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

Route::get('/', 'InicioController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
  Route::get('permiso', 'PermissionController@index')->name('permission');
  Route::get('permiso/crear', 'PermissionController@create')->name('create_permission');

  Route::get('menu', 'MenuController@index')->name('menu');
  Route::post('menu', 'MenuController@store')->name('store_menu');
  Route::get('menu/crear', 'MenuController@create')->name('create_menu');
});

/**
 * Lo siguiente es un sistema de ruta cacheable
 */

// Route::get('admin/permiso', 'admin\PermissionController@index')->name('permission');
// Route::get('admin/permiso/crear', 'admin\PermissionController@create')->name('create_permission');

// Route::get('admin/menu', 'admin\MenuController@index')->name('permission');
// Route::get('admin/menu/crear', 'admin\MenuController@create')->name('permission');


// Route::view('/', 'welcome');