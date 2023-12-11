<?php

namespace Modules\TeacherMgt\Presenters;

use Laracasts\Presenter\Presenter;


class TeacherPresenter extends Presenter
{
    /**
     * @var \Modules\Student\Entities\Gender
     */
    protected $gender;
    /**
     * @var \Modules\Student\Repositories\TeacherRepository
     */
    private $teacher;

    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->teacher = app('Modules\TeacherMgt\Repositories\TeacherRepository');
        $this->gender = app('Modules\TeacherMgt\Entities\Gender');
    }

    /**
     * Get the post status
     * @return string
     */
    public function gender()
    {
        return $this->gender->get($this->entity->gender_id);
    }

 
}