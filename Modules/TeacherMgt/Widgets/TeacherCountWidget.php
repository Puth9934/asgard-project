<?php

namespace Modules\TeacherMgt\Widgets;


use Modules\Dashboard\Foundation\Widgets\BaseWidget;
use Modules\Teachermgt\Entities\department;
use Modules\Teachermgt\Entities\subjects;
use Modules\TeacherMgt\Entities\Teacher;
use Modules\TeacherMgt\Repositories\TeacherRepository;

class TeacherCountWidget extends BaseWidget
{

    private $teacher;

    public function __construct(TeacherRepository $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * Get the widget name
     * @return string
     */
    protected function name()
    {
        return 'TeacherCountWidget';
    }

    /**
     * Get the widget view
     * @return string
     */
    protected function view()
    {
        return 'teachermgt::admin.widgets.teacher-count';
    }

    /**
     * Get the widget data to send to the view
     * @return string
     */
    protected function data()
    {
        // staffCount to throw var to staff-count.blade.php
        return [
            'teacherCount' => Teacher::all()->count(),
            'trashCount' => Teacher::onlyTrashed()->count(),
            'department' => department::all()->count(),
            'subjects' => subjects::all()->count(),
        ];

    }

    /**
    * Get the widget type
    * @return string
    */
    protected function options()
    {
        return [
            'width' => '10',
            'height' => '2',
            'x' => '0',
        ];
    }
}
