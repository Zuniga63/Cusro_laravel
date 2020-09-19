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
Route::get('admin/permiso', 'admin\PermissionController@index')->name('permission');
Route::get('admin/permiso/crear', 'admin\PermissionController@create')->name('create_permission');

// Route::view('/', 'welcome');