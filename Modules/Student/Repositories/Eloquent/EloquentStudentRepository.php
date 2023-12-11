<?php

namespace Modules\Student\Repositories\Eloquent;

use Modules\Student\Events\StudentIsCreate;
use Modules\Student\Events\StudentIsUpdate;
use Modules\Student\Events\StudentWasCreated;
use Modules\Student\Events\StudentWasUpdated;
use Modules\Student\Repositories\StudentRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentStudentRepository extends EloquentBaseRepository implements StudentRepository
{

   public function find($id){
        return $this->model->with('translations')->find($id);
    } 
    public function all(){
        return $this->model->with('translations')->orderBy('created_at','DESC')->get();
    }
    public function create($data){
        event($event = new StudentIsCreate($data));
        $staff = $this->model->create($event->getAttributes());
        event(new StudentWasCreated($staff,$data));
        return $staff;
    }
    public function update($student, $data)
    {
        event($event = new StudentIsUpdate($student, $data));
        $student->update($event->getAttributes());

        event(new StudentWasUpdated($student, $data));

        return $student;
    }
}
