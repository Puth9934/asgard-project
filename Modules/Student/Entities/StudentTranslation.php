<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name', 'address'];
    protected $table = 'student__student_translations';
}
