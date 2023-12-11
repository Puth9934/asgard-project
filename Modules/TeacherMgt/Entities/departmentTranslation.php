<?php

namespace Modules\Teachermgt\Entities;

use Illuminate\Database\Eloquent\Model;

class departmentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'teachermgt__department_translations';
}
