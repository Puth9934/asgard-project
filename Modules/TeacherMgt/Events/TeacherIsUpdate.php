<?php

namespace Modules\TeacherMgt\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;
use Modules\TeacherMgt\Entities\Teacher;

class TeacherIsUpdate extends AbstractEntityHook implements EntityIsChanging
{
    private $teacher;
    public function __construct(Teacher $teacher , array $data)
    {
     parent::__construct($data);
     $this->$teacher = $teacher;
    }
 
    public function getStudent()
    {
     return $this->teacher;
    }
}
