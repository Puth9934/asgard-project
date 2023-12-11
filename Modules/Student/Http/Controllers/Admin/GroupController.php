<?php

namespace Modules\Student\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Group;
use Modules\Student\Http\Requests\CreateGroupRequest;
use Modules\Student\Http\Requests\UpdateGroupRequest;
use Modules\Student\Repositories\GroupRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Student\Entities\Department;

class GroupController extends AdminBaseController
{
    /**
     * @var GroupRepository
     */
    private $group;

    public function __construct(GroupRepository $group)
    {
        parent::__construct();

        $this->group = $group;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $groups = $this->group->all();
        $departments = Department::all();
        return view('student::admin.groups.index', compact('groups','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('student::admin.groups.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateGroupRequest $request
     * @return Response
     */
    public function store(CreateGroupRequest $request)
    {
        $this->group->create($request->all());

        return redirect()->route('admin.student.group.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('student::groups.title.groups')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Group $group
     * @return Response
     */
    public function edit(Group $group)
    {
        $departments = Department::all();
        return view('student::admin.groups.edit', compact('group','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Group $group
     * @param  UpdateGroupRequest $request
     * @return Response
     */
    public function update(Group $group, UpdateGroupRequest $request)
    {
        $this->group->update($group, $request->all());

        return redirect()->route('admin.student.group.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('student::groups.title.groups')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Group $group
     * @return Response
     */
    public function destroy(Group $group)
    {
        $this->group->destroy($group);

        return redirect()->route('admin.student.group.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('student::groups.title.groups')]));
    }
}
