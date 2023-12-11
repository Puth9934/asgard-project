<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/student'], function (Router $router) {
    $router->bind('student', function ($id) {
        return app('Modules\Student\Repositories\StudentRepository')->find($id);
    });
    $router->get('students', [
        'as' => 'admin.student.student.index',
        'uses' => 'StudentController@index',
        'middleware' => 'can:student.students.index'
    ]);
    $router->get('students/create', [
        'as' => 'admin.student.student.create',
        'uses' => 'StudentController@create',
        'middleware' => 'can:student.students.create'
    ]);
    $router->post('students', [
        'as' => 'admin.student.student.store',
        'uses' => 'StudentController@store',
        'middleware' => 'can:student.students.create'
    ]);
    $router->get('students/{student}/edit', [
        'as' => 'admin.student.student.edit',
        'uses' => 'StudentController@edit',
        'middleware' => 'can:student.students.edit'
    ]);
    $router->put('students/{student}', [
        'as' => 'admin.student.student.update',
        'uses' => 'StudentController@update',
        'middleware' => 'can:student.students.edit'
    ]);
    $router->delete('students/{student}', [
        'as' => 'admin.student.student.destroy',
        'uses' => 'StudentController@destroy',
        'middleware' => 'can:student.students.destroy'
    ]);
    //softdelete student
    $router->get('students/trashed', [
        'as' => 'admin.student.student.trashed',
        'uses' => 'StudentController@trash',
        'middleware' => 'can:student.students.index'
    ]);
    $router->delete('students/{id}/permanentDetele', [
        'as' => 'admin.student.student.permanentDetele',
        'uses' => 'StudentController@detele'
    ]);
    $router->get('students/{id}/recover', [
        'as' => 'admin.student.student.recover',
        'uses' => 'StudentController@recover',
        'middleware' => 'can:student.students.index'
    ]);

    $router->bind('department', function ($id) {
        return app('Modules\Student\Repositories\DepartmentRepository')->find($id);
    });
    $router->get('departments', [
        'as' => 'admin.student.department.index',
        'uses' => 'DepartmentController@index',
        'middleware' => 'can:student.departments.index'
    ]);
    $router->get('departments/create', [
        'as' => 'admin.student.department.create',
        'uses' => 'DepartmentController@create',
        'middleware' => 'can:student.departments.create'
    ]);
    $router->post('departments', [
        'as' => 'admin.student.department.store',
        'uses' => 'DepartmentController@store',
        'middleware' => 'can:student.departments.create'
    ]);
    $router->get('departments/{department}/edit', [
        'as' => 'admin.student.department.edit',
        'uses' => 'DepartmentController@edit',
        'middleware' => 'can:student.departments.edit'
    ]);
    $router->put('departments/{department}', [
        'as' => 'admin.student.department.update',
        'uses' => 'DepartmentController@update',
        'middleware' => 'can:student.departments.edit'
    ]);
    $router->delete('departments/{department}', [
        'as' => 'admin.student.department.destroy',
        'uses' => 'DepartmentController@destroy',
        'middleware' => 'can:student.departments.destroy'
    ]);
    $router->bind('group', function ($id) {
        return app('Modules\Student\Repositories\GroupRepository')->find($id);
    });
    $router->get('groups', [
        'as' => 'admin.student.group.index',
        'uses' => 'GroupController@index',
        'middleware' => 'can:student.groups.index'
    ]);
    $router->get('groups/create', [
        'as' => 'admin.student.group.create',
        'uses' => 'GroupController@create',
        'middleware' => 'can:student.groups.create'
    ]);
    $router->post('groups', [
        'as' => 'admin.student.group.store',
        'uses' => 'GroupController@store',
        'middleware' => 'can:student.groups.create'
    ]);
    $router->get('groups/{group}/edit', [
        'as' => 'admin.student.group.edit',
        'uses' => 'GroupController@edit',
        'middleware' => 'can:student.groups.edit'
    ]);
    $router->put('groups/{group}', [
        'as' => 'admin.student.group.update',
        'uses' => 'GroupController@update',
        'middleware' => 'can:student.groups.edit'
    ]);
    $router->delete('groups/{group}', [
        'as' => 'admin.student.group.destroy',
        'uses' => 'GroupController@destroy',
        'middleware' => 'can:student.groups.destroy'
    ]);
    $router->get('department/group/{id}', [
        'as' => 'getGroup',
        'uses' => 'StudentController@getGroupByDepartment',
        'middleware' => 'can:student.groups.index'
    ]);
// append



});
