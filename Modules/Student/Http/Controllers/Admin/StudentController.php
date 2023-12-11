<?php

namespace Modules\Student\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Department;
use Modules\Student\Entities\Student;
use Modules\Student\Http\Requests\CreateStudentRequest;
use Modules\Student\Http\Requests\UpdateStudentRequest;
use Modules\Student\Repositories\StudentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Student\Entities\Gender;
use Modules\Student\Entities\Group;

class StudentController extends AdminBaseController
{
    /**
     * @var StudentRepository
     */
    private $student;
    private $gender;

    public function __construct(StudentRepository $student, Gender $gender)
    {
        parent::__construct();

        $this->student = $student;
        $this->gender = $gender;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $students = $this->student->all();
        return view('student::admin.students.index', compact('students'));
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
        $groups = [];
        return view('student::admin.students.create',compact('genders','departments','groups','genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateStudentRequest $request
     * @return Response
     */
    public function store(CreateStudentRequest $request)
    {
        $this->student->create($request->all());

        return redirect()->route('admin.student.student.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('student::students.title.students')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Student $student
     * @return Response
     */
    public function edit(Student $student)
    {
        $genders = $this->gender->lists();
        $departments = Department::all();
        $groups = Group::where('department_id', $student->department_id)->get();
        return view('student::admin.students.edit', compact('student','departments','groups','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Student $student
     * @param  UpdateStudentRequest $request
     * @return Response
     */
    public function update(Student $student, UpdateStudentRequest $request)
    {
        $this->student->update($student, $request->all());

        return redirect()->route('admin.student.student.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('student::students.title.students')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Student $student
     * @return Response
     */
    public function destroy(Student $student)
    {
        $this->student->destroy($student);

        return redirect()->route('admin.student.student.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('student::students.title.students')]));
    }

    //get group using ajax
    public function getGroupByDepartment($dep)
    {
        $groups = Group::where('department_id', $dep)->get();

        return response()->json($groups);
    }


    public function trash(){
        $students = Student::onlyTrashed()->get();
        return view('student::admin.students.trash', compact('students'));
    }

    public function detele($id){
        $staff = Student::withTrashed()->find($id);
        // dd($teacher);
        $staff->forceDelete();
        return redirect()->route('admin.student.student.trashed')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('staffmgt::staff.title.staff')]));
    }

    public function recover($id){
        $staff = Student::onlyTrashed()->find($id);
        $staff->restore();
        return redirect()->route('admin.student.student.trashed')->withSuccess(trans('Recover success', ['name' => trans('staffmgt::staff.title.staff')]));
    }
}
