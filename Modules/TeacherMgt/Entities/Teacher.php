<?php

namespace Modules\TeacherMgt\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;
use Modules\Media\Support\Traits\MediaRelation;
use Modules\TeacherMgt\Presenters\TeacherPresenter;

class Teacher extends Model
{
    use Translatable,PresentableTrait,MediaRelation,SoftDeletes;
    protected $table = 'teachermgt__teachers';
    public $translatedAttributes = ['first_name','last_name','address'];
    protected $fillable = ['email','dob','phone','gender_id','hire_date','subjects_id','department_id'];

    //call parent to teacher abd use PresentableTrait nv ler

    protected $presenter = TeacherPresenter::class;

    public function department() {
        
        return $this->belongsTo(department::class);

    }

    public function getImageAttribute() {
        $image = $this->filesByZone('image')->first();
        if($image === null){
            return '';
        }
        return $image;
    }

   
}
