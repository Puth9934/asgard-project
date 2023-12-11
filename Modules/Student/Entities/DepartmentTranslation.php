<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class DepartmentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'student__department_translations';
}
