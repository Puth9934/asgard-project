<?php

namespace Modules\Student\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Media\Support\Traits\MediaRelation;

class Student extends Model
{
    use Translatable,MediaRelation,SoftDeletes;

    protected $table = 'student__students';
    public $translatedAttributes = ['first_name', 'last_name', 'address'];
    protected $fillable = ['department_id','group_id', 'dob', 'phone', 'email'];

    public function department() {

        return $this->belongsTo(Department::class);

    }

    public function getImageAttribute() {
        $image = $this->filesByZone('image')->first();
        // dd('image');
        if($image === null){
            return '';
        }
        return $image;
    }

}
