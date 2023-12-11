<?php

namespace Modules\Staffmgt\Entities;

use Illuminate\Database\Eloquent\Model;

class departmentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'staffmgt__department_translations';
}
