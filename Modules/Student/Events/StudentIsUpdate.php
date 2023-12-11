<?php

namespace Modules\Student\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;
use Modules\Student\Entities\Student;

class StudentIsUpdate extends AbstractEntityHook implements EntityIsChanging
{
    private $student;
   public function __construct(Student $student , array $data)
   {
    parent::__construct($data);
    $this->student = $student;
   }

   public function getStaff()
   {
    return $this->student;
   }
}
