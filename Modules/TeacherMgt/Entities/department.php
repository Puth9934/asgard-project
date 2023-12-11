<?php

namespace Modules\Teachermgt\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use Translatable;

    protected $table = 'teachermgt__departments';
    public $translatedAttributes = ['name'];
    protected $guarded = [];

    //for tv jab data pi table and countTeacher catch from it
    public function teachers() {
        return $this->hasMany(Teacher::class);
    
    }

    //for count number of teacher from Teacher into Daperment index (table)
    public function countTeacher() {
        return $this->teachers()->count();
    
    }
    public function subjects() {
        return $this->hasMany(subjects::class);
    
    }
    public function countSubject() {
        return $this->subjects()->count();
    
    }

    // $totalTeachers = $department->getTotalTeachers();
    public function getTotalTeachers() {
        // return $this->all();
        return $this->all();
    }

}
