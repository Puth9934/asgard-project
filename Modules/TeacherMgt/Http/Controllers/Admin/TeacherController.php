<?php

namespace Modules\TeacherMgt\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\TeacherMgt\Entities\Teacher;
use Modules\TeacherMgt\Http\Requests\CreateTeacherRequest;
use Modules\TeacherMgt\Http\Requests\UpdateTeacherRequest;
use Modules\TeacherMgt\Repositories\TeacherRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Student\Entities\Gender;
use Modules\Teachermgt\Entities\department;
use Modules\Teachermgt\Entities\subjects;

class TeacherController extends AdminBaseController
{
    /**
     * @var TeacherRepository
     */
    private $teacher;
    private $gender;

    public function __construct(TeacherRepository $teacher,Gender $gender)
    {
        parent::__construct();

        $this->teacher = $teacher;
        $this->gender = $gender;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teachers = $this->teacher->all();

        return view('teachermgt::admin.teachers.index', compact('teachers'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $departments = department::all();
        $subjects = [];
        $genders = $this->gender->lists();
        return view('teachermgt::admin.teachers.create', compact('genders','departments','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTeacherRequest $request
     * @return Response
     */
    public function store(CreateTeacherRequest $request)
    {
        $this->teacher->create($request->all());

        return redirect()->route('admin.teachermgt.teacher.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('teachermgt::teachers.title.teachers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Teacher $teacher
     * @return Response
     */
    public function edit(Teacher $teacher)
    {
        $departments = Department::all();
        $subjects = subjects::where('department_id', $teacher->department_id)->get();
        $genders = $this->gender->lists();
        return view('teachermgt::admin.teachers.edit', compact('teacher','subjects','genders','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Teacher $teacher
     * @param  UpdateTeacherRequest $request
     * @return Response
     */
    public function update(Teacher $teacher, UpdateTeacherRequest $request)
    {
        $this->teacher->update($teacher, $request->all());

        return redirect()->route('admin.teachermgt.teacher.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('teachermgt::teachers.title.teachers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Teacher $teacher
     * @return Response
     */
    public function destroy(Teacher $teacher)
    {
        $this->teacher->destroy($teacher);

        return redirect()->route('admin.teachermgt.teacher.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('teachermgt::teachers.title.teachers')]));
    }

    public function getSubjectByDepartment($department)
    {
        $subjects = subjects::where('department_id', $department)->get();

        return response()->json($subjects);
    }

    public function trash(){
        $teachers = Teacher::onlyTrashed()->get();
        return view('teachermgt::admin.teachers.trash', compact('teachers'));
    }

    public function detele($id){
        $teacher = Teacher::withTrashed()->find($id);
        // dd($teacher);
        $teacher->forceDelete();
        return redirect()->route('admin.teachermgt.teacher.trashed')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('teachermgt::teachers.title.teachers')]));
    }

    public function recover($id){
        $staff = Teacher::onlyTrashed()->find($id);
        $staff->restore();
        return redirect()->route('admin.teachermgt.teacher.trashed');
    }
}
