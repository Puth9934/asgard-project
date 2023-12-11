<?php

namespace Modules\StaffMgt\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;
use Modules\Media\Support\Traits\MediaRelation;
use Modules\StaffMgt\Presenters\StaffPresenter;

class Staff extends Model
{
    use Translatable,PresentableTrait,MediaRelation,SoftDeletes;

    protected $table = 'staffmgt__staff';
    public $translatedAttributes = ['name','description'];
    protected $fillable = ['dob','hire_date','gender_id','department_id'];

    //call parent to staff abd use PresentableTrait nv ler
    protected $presenter = StaffPresenter::class;

    //to get name from department to show in staff function
    public function department(){
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

     // get multi image
    public function getImagesAttribute() {
        $image = $this->filesByZone('images')->get();
        // dd($image);
        if($image === null){
            return '';
        }
        return $image;
    }
}
