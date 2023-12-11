<?php

namespace Modules\StaffMgt\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\StaffMgt\Entities\Staff;
use Modules\StaffMgt\Http\Requests\CreateStaffRequest;
use Modules\StaffMgt\Http\Requests\UpdateStaffRequest;
use Modules\StaffMgt\Repositories\StaffRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Staffmgt\Entities\department;
use Modules\StaffMgt\Entities\Gender;

class StaffController extends AdminBaseController
{
    /**
     * @var StaffRepository
     */
    private $staff;
    private $gender;

    public function __construct(StaffRepository $staff,Gender $gender)
    {
        parent::__construct();

        $this->staff = $staff;
        $this->gender = $gender;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $staff = $this->staff->all();

        return view('staffmgt::admin.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $genders = $this->gender->lists();
        $departments = Department::all();
        return view('staffmgt::admin.staff.create',compact('genders','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateStaffRequest $request
     * @return Response
     */
    public function store(CreateStaffRequest $request)
    {
        // dd($request->all());    
        $this->staff->create($request->all());

        return redirect()->route('admin.staffmgt.staff.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('staffmgt::staff.title.staff')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Staff $staff
     * @return Response
     */
    public function edit(Staff $staff)
    {
        $genders = $this->gender->lists();
        $departments = Department::all();
        return view('staffmgt::admin.staff.edit', compact('staff','genders','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Staff $staff
     * @param  UpdateStaffRequest $request
     * @return Response
     */
    public function update(Staff $staff, UpdateStaffRequest $request)
    {
        $this->staff->update($staff, $request->all());

        return redirect()->route('admin.staffmgt.staff.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('staffmgt::staff.title.staff')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Staff $staff
     * @return Response
     */
    public function destroy(Staff $staff, Request $request)
    {   
        $this->staff->destroy($staff);

        return redirect()->route('admin.staffmgt.staff.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('staffmgt::staff.title.staff')]));
    }

    public function trash(){
        $staff = Staff::onlyTrashed()->get();
        return view('staffmgt::admin.staff.trash', compact('staff'));
    }

    public function detele($id){
        $staff = Staff::withTrashed()->find($id);
        // dd($teacher);
        $staff->forceDelete();
        return redirect()->route('admin.staffmgt.staff.trashed')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('staffmgt::staff.title.staff')]));
    }

    public function recover($id){
        $staff = Staff::onlyTrashed()->find($id);
        $staff->restore();
        return redirect()->route('admin.staffmgt.staff.trashed')->withSuccess(trans('Recover success', ['name' => trans('staffmgt::staff.title.staff')]));
    }
}
