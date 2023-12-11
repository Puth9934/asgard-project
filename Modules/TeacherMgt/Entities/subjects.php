<?php

namespace Modules\Teachermgt\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    use Translatable;

    protected $table = 'teachermgt__subjects';
    public $translatedAttributes = [];
    protected $fillable = ['name','department_id'];


    // public function students() {

    //     return $this->hasMany(Teacher::class);

    // }

    // public function countStudent() {
        
    //     return $this->students()->count(); 

    // }
    
    // to use proporty name in subjects to catch department to select into subjects 
    public function department(){
        return $this->belongsTo(department::class);
    }

}
