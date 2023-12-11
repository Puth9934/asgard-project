<?php

namespace Modules\TeacherMgt\Repositories\Eloquent;

use Modules\TeacherMgt\Events\TeacherWasCreated;
use Modules\TeacherMgt\Repositories\TeacherRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\TeacherMgt\Events\TeacherIsCreate;

class EloquentTeacherRepository extends EloquentBaseRepository implements TeacherRepository
{
    public function find($id){
        return $this->model->with('translations')->find($id);
    } 
    public function all(){
         return $this->model->with('translations')->orderBy('created_at','DESC')->get();
    }
    public function create($data){
        event($event = new TeacherIsCreate($data));
        $staff = $this->model->create($event->getAttributes());
        event(new TeacherWasCreated($staff,$data));
        return $staff;
    }
    public function update($model,$data){
        event($event = new TeacherIsCreate($data));
        $staff = $this->model->create($event->getAttributes());
        event(new TeacherWasCreated($staff,$data));
        return $staff;
    }
}
