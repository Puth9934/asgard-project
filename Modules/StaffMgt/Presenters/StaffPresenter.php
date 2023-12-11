<?php

namespace Modules\StaffMgt\Presenters;

use Laracasts\Presenter\Presenter;


class StaffPresenter extends Presenter
{
    /**
     * @var \Modules\Student\Entities\Gender
     */
    protected $gender;
    /**
     * @var \Modules\Student\Repositories\StaffRepository
     */
    private $staff;

    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->staff = app('Modules\StaffMgt\Repositories\StaffRepository');
        $this->gender = app('Modules\StaffMgt\Entities\Gender');
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