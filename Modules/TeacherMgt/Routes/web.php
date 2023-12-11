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

use Modules\TeacherMgt\Http\Controllers\Admin\TeacherController;

Route::prefix('teachermgt')->group(function() {
    Route::get('/', 'TeacherMgtController@index');
});

