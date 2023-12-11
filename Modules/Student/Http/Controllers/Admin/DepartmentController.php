<?php

namespace Modules\Student\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Department;
use Modules\Student\Http\Requests\CreateDepartmentRequest;
use Modules\Student\Http\Requests\UpdateDepartmentRequest;
use Modules\Student\Repositories\DepartmentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DepartmentController extends AdminBaseController
{
    /**
     * @var DepartmentRepository
     */
    private $department;

    public function __construct(DepartmentRepository $department)
    {
        parent::__construct();

        $this->department = $department;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $departments = $this->department->all();

        return view('student::admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('student::admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDepartmentRequest $request
     * @return Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        $this->department->create($request->all());

        return redirect()->route('admin.student.department.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('student::departments.title.departments')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Department $department
     * @return Response
     */
    public function edit(Department $department)
    {
        return view('student::admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Department $department
     * @param  UpdateDepartmentRequest $request
     * @return Response
     */
    public function update(Department $department, UpdateDepartmentRequest $request)
    {
        $this->department->update($department, $request->all());

        return redirect()->route('admin.student.department.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('student::departments.title.departments')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Department $department
     * @return Response
     */
    public function destroy(Department $department)
    {
        $this->department->destroy($department);

        return redirect()->route('admin.student.department.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('student::departments.title.departments')]));
    }
}
