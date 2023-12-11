<?php

namespace Modules\Teachermgt\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Teachermgt\Entities\department;
use Modules\Teachermgt\Http\Requests\CreatedepartmentRequest;
use Modules\Teachermgt\Http\Requests\UpdatedapartmentRequest;
use Modules\Teachermgt\Repositories\departmentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class departmentController extends AdminBaseController
{
    /**
     * @var departmentRepository
     */
    private $department;

    public function __construct(departmentRepository $department)
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
    
        return view('teachermgt::admin.departments.index', compact('departments'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('teachermgt::admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatedepartmentRequest $request
     * @return Response
     */
    public function store(CreatedepartmentRequest $request)
    {
        $this->department->create($request->all());

        return redirect()->route('admin.teachermgt.department.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('teachermgt::departments.title.departments')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  department $department
     * @return Response
     */
    public function edit(department $department)
    {
        return view('teachermgt::admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  department $department
     * @param  UpdatedepartmentRequest $request
     * @return Response
     */
    public function update(department $department, UpdatedapartmentRequest $request)
    {
        $this->department->update($department, $request->all());

        return redirect()->route('admin.teachermgt.department.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('teachermgt::departments.title.departments')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  department $department
     * @return Response
     */
    public function destroy(department $department)
    {
        $this->department->destroy($department);

        return redirect()->route('admin.teachermgt.department.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('teachermgt::departments.title.departments')]));
    }
}
