<?php

namespace Modules\Teachermgt\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Teachermgt\Entities\subjects;
use Modules\Teachermgt\Http\Requests\CreatesubjectsRequest;
use Modules\Teachermgt\Http\Requests\UpdatesubjectsRequest;
use Modules\Teachermgt\Repositories\subjectsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Teachermgt\Entities\department;

class subjectsController extends AdminBaseController
{
    /**
     * @var subjectsRepository
     */
    private $subjects;

    public function __construct(subjectsRepository $subjects)
    {
        parent::__construct();

        $this->subjects = $subjects;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $subjects = $this->subjects->all();
        return view('teachermgt::admin.subjects.index', compact('subjects'));
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
        return view('teachermgt::admin.subjects.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatesubjectsRequest $request
     * @return Response
     */
    public function store(CreatesubjectsRequest $request)
    {
        $this->subjects->create($request->all());

        return redirect()->route('admin.teachermgt.subjects.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('teachermgt::subjects.title.subjects')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  subjects $subjects
     * @return Response
     */
    public function edit(subjects $subjects)
    {
        $departments = department::all();
        return view('teachermgt::admin.subjects.edit', compact('subjects','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  subjects $subjects
     * @param  UpdatesubjectsRequest $request
     * @return Response
     */
    public function update(subjects $subjects, UpdatesubjectsRequest $request)
    {
        $this->subjects->update($subjects, $request->all());

        return redirect()->route('admin.teachermgt.subjects.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('teachermgt::subjects.title.subjects')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  subjects $subjects
     * @return Response
     */
    public function destroy(subjects $subjects)
    {
        $this->subjects->destroy($subjects);

        return redirect()->route('admin.teachermgt.subjects.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('teachermgt::subjects.title.subjects')]));
    }
}
