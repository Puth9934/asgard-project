<?php

namespace Modules\Student\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use Translatable;

    protected $table = 'student__groups';
    public $translatedAttributes = [];
    protected $fillable = ['name','department_id'];
    public function department() {

        return $this->belongsTo(Department::class);

    }
}
