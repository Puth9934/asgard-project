<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/teachermgt'], function (Router $router) {
    $router->bind('teacher', function ($id) {
        return app('Modules\TeacherMgt\Repositories\TeacherRepository')->find($id);
    });
    $router->get('teachers', [
        'as' => 'admin.teachermgt.teacher.index',
        'uses' => 'TeacherController@index',
        'middleware' => 'can:teachermgt.teachers.index'
    ]);
    $router->get('teachers/create', [
        'as' => 'admin.teachermgt.teacher.create',
        'uses' => 'TeacherController@create',
        'middleware' => 'can:teachermgt.teachers.create'
    ]);
    $router->post('teachers', [
        'as' => 'admin.teachermgt.teacher.store',
        'uses' => 'TeacherController@store',
        'middleware' => 'can:teachermgt.teachers.create'
    ]);
    $router->get('teachers/{teacher}/edit', [
        'as' => 'admin.teachermgt.teacher.edit',
        'uses' => 'TeacherController@edit',
        'middleware' => 'can:teachermgt.teachers.edit'
    ]);
    $router->put('teachers/{teacher}', [
        'as' => 'admin.teachermgt.teacher.update',
        'uses' => 'TeacherController@update',
        'middleware' => 'can:teachermgt.teachers.edit'
    ]);
    $router->delete('teachers/{teacher}', [
        'as' => 'admin.teachermgt.teacher.destroy',
        'uses' => 'TeacherController@destroy',
        'middleware' => 'can:teachermgt.teachers.destroy'
    ]);
    $router->get('teachers/trashed', [
        'as' => 'admin.teachermgt.teacher.trashed',
        'uses' => 'teachercontroller@trash',
        'middleware' => 'can:teachermgt.teachers.index'
    ]);
    $router->get('teachers/{id}/recover', [
        'as' => 'admin.teachermgt.teacher.recover',
        'uses' => 'TeacherController@recover',
        'middleware' => 'can:teachermgt.teachers.index'
       
    ]);
    $router->delete('teachers/{id}/permanentDetele', [
        'as' => 'admin.teachermgt.teacher.permanentDetele',
        'uses' => 'TeacherController@detele'
       
    ]);
   

    
   
    $router->bind('subjects', function ($id) {
        return app('Modules\Teachermgt\Repositories\subjectsRepository')->find($id);
    });
    $router->get('subjects', [
        'as' => 'admin.teachermgt.subjects.index',
        'uses' => 'subjectsController@index',
        'middleware' => 'can:teachermgt.subjects.index'
    ]);
    $router->get('subjects/create', [
        'as' => 'admin.teachermgt.subjects.create',
        'uses' => 'subjectsController@create',
        'middleware' => 'can:teachermgt.subjects.create'
    ]);
    $router->post('subjects', [
        'as' => 'admin.teachermgt.subjects.store',
        'uses' => 'subjectsController@store',
        'middleware' => 'can:teachermgt.subjects.create'
    ]);
    $router->get('subjects/{subjects}/edit', [
        'as' => 'admin.teachermgt.subjects.edit',
        'uses' => 'subjectsController@edit',
        'middleware' => 'can:teachermgt.subjects.edit'
    ]);
    $router->put('subjects/{subjects}', [
        'as' => 'admin.teachermgt.subjects.update',
        'uses' => 'subjectsController@update',
        'middleware' => 'can:teachermgt.subjects.edit'
    ]);
    $router->delete('subjects/{subjects}', [
        'as' => 'admin.teachermgt.subjects.destroy',
        'uses' => 'subjectsController@destroy',
        'middleware' => 'can:teachermgt.subjects.destroy'
    ]);

    $router->get('department/subjects/{id}', [
        'as' => 'getSubject',
        'uses' => 'TeacherController@getSubjectByDepartment',
        'middleware' => 'can:teachermgt.subjects.index'
    ]);
   
    $router->bind('department', function ($id) {
        return app('Modules\Teachermgt\Repositories\departmentRepository')->find($id);
    });
    $router->get('departments', [
        'as' => 'admin.teachermgt.department.index',
        'uses' => 'departmentController@index',
        'middleware' => 'can:teachermgt.departments.index'
    ]);
    $router->get('departments/create', [
        'as' => 'admin.teachermgt.department.create',
        'uses' => 'departmentController@create',
        'middleware' => 'can:teachermgt.departments.create'
    ]);
    $router->post('departments', [
        'as' => 'admin.teachermgt.department.store',
        'uses' => 'departmentController@store',
        'middleware' => 'can:teachermgt.departments.create'
    ]);
    $router->get('departments/{department}/edit', [
        'as' => 'admin.teachermgt.department.edit',
        'uses' => 'departmentController@edit',
        'middleware' => 'can:teachermgt.departments.edit'
    ]);
    $router->put('departments/{department}', [
        'as' => 'admin.teachermgt.department.update',
        'uses' => 'departmentController@update',
        'middleware' => 'can:teachermgt.departments.edit'
    ]);
    $router->delete('departments/{department}', [
        'as' => 'admin.teachermgt.department.destroy',
        'uses' => 'departmentController@destroy',
        'middleware' => 'can:teachermgt.departments.destroy'
    ]);
   
// append








});
