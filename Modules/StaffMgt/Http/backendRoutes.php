<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/staffmgt'], function (Router $router) {
    $router->bind('staff', function ($id) {
        return app('Modules\StaffMgt\Repositories\StaffRepository')->find($id);
    });
    $router->get('staff', [
        'as' => 'admin.staffmgt.staff.index',
        'uses' => 'StaffController@index',
        'middleware' => 'can:staffmgt.staff.index'
    ]);
    $router->get('staff/create', [
        'as' => 'admin.staffmgt.staff.create',
        'uses' => 'StaffController@create',
        'middleware' => 'can:staffmgt.staff.create'
    ]);
    $router->post('staff', [
        'as' => 'admin.staffmgt.staff.store',
        'uses' => 'StaffController@store',
        'middleware' => 'can:staffmgt.staff.create'
    ]);
    $router->get('staff/{staff}/edit', [
        'as' => 'admin.staffmgt.staff.edit',
        'uses' => 'StaffController@edit',
        'middleware' => 'can:staffmgt.staff.edit'
    ]);
    $router->put('staff/{staff}', [
        'as' => 'admin.staffmgt.staff.update',
        'uses' => 'StaffController@update',
        'middleware' => 'can:staffmgt.staff.edit'
    ]);
    $router->delete('staff/{staff}', [
        'as' => 'admin.staffmgt.staff.destroy',
        'uses' => 'StaffController@destroy',
        'middleware' => 'can:staffmgt.staff.destroy'
    ]);
    $router->get('staff/trashed', [
        'as' => 'admin.staffmgt.staff.trashed',
        'uses' => 'StaffController@trash',
        'middleware' => 'can:staffmgt.staff.index'
    ]);
    $router->delete('staff/{id}/permanentDetele', [
        'as' => 'admin.staffmgt.staff.permanentDetele',
        'uses' => 'StaffController@detele'
    ]);
    $router->get('staff/{id}/recover', [
        'as' => 'admin.staffmgt.staff.recover',
        'uses' => 'StaffController@recover',
        'middleware' => 'can:staffmgt.staff.index'
    ]);
     $router->get('teachers/trashed', [
        'as' => 'admin.teachermgt.teacher.trashed',
        'uses' => 'teachercontroller@trash',
        'middleware' => 'can:teachermgt.teachers.index'
    ]);
    $router->bind('departments', function ($id) {
        return app('Modules\Staffmgt\Repositories\departmentRepository')->find($id);
    });
    $router->get('departments', [
        'as' => 'admin.staffmgt.department.index',
        'uses' => 'departmentController@index',
        'middleware' => 'can:staffmgt.departments.index'
    ]);
    $router->get('departments/create', [
        'as' => 'admin.staffmgt.department.create',
        'uses' => 'departmentController@create',
        'middleware' => 'can:staffmgt.departments.create'
    ]);
    $router->post('departments', [
        'as' => 'admin.staffmgt.department.store',
        'uses' => 'departmentController@store',
        'middleware' => 'can:staffmgt.departments.create'
    ]);
    $router->get('departments/{departments}/edit', [
        'as' => 'admin.staffmgt.department.edit',
        'uses' => 'departmentController@edit',
        'middleware' => 'can:staffmgt.departments.edit'
    ]);
    $router->put('departments/{departments}', [
        'as' => 'admin.staffmgt.department.update',
        'uses' => 'departmentController@update',
        'middleware' => 'can:staffmgt.departments.edit'
    ]);
    $router->delete('departments/{departments}', [
        'as' => 'admin.staffmgt.department.destroy',
        'uses' => 'departmentController@destroy',
        'middleware' => 'can:staffmgt.departments.destroy'
    ]);
// append


});
