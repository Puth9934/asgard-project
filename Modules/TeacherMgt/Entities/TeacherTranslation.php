<?php

namespace Modules\TeacherMgt\Entities;

use Illuminate\Database\Eloquent\Model;

class TeacherTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name', 'address'];
    protected $table = 'teachermgt__teacher_translations';
}
