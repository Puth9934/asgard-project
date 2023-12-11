<?php

namespace Modules\StaffMgt\Repositories\Eloquent;


use Modules\StaffMgt\Events\StaffIsUpdated;
use Modules\StaffMgt\Events\StaffWasUpdated;
use Modules\StaffMgt\Repositories\StaffRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\StaffMgt\Events\StaffIsCreated;
use Modules\StaffMgt\Events\StaffWasCreated;

class EloquentStaffRepository extends EloquentBaseRepository implements StaffRepository
{
   public function find($id){
        return $this->model->with('translations')->find($id);
   } 
   public function all(){
    return $this->model->with('translations')->orderBy('created_at','DESC')->get();
   }
   public function create($data){
     event($event = new StaffIsCreated($data));
     $staff = $this->model->create($event->getAttributes());
     event(new StaffWasCreated($staff,$data));
     return $staff;
   }
    public function update($student, $data)
    {
        event($event = new StaffIsUpdated($student, $data));
        $student->update($event->getAttributes());

        event(new StaffWasUpdated($student, $data));

        return $student;
    }
}
