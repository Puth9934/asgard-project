<?php

namespace Modules\Staffmgt\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staffmgt\Entities\department;
use Modules\Staffmgt\Http\Requests\CreatedepartmentRequest;
use Modules\Staffmgt\Http\Requests\UpdatedepartmentRequest;
use Modules\Staffmgt\Repositories\departmentRepository;
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

        return view('staffmgt::admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('staffmgt::admin.departments.create');
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

        return redirect()->route('admin.staffmgt.department.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('staffmgt::departments.title.departments')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  department $department
     * @return Response
     */
    public function edit(department $department)
    {
        // dd($department);
        return view('staffmgt::admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  department $department
     * @param  UpdatedepartmentRequest $request
     * @return Response
     */
    public function update(department $department, UpdatedepartmentRequest $request)
    {
        $this->department->update($department, $request->all());

        return redirect()->route('admin.staffmgt.department.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('staffmgt::departments.title.departments')]));
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

        return redirect()->route('admin.staffmgt.department.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('staffmgt::departments.title.departments')]));
    }
}
