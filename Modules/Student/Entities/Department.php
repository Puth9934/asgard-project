<?php

namespace Modules\Student\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use Translatable;

    protected $table = 'student__departments';
    public $translatedAttributes = ['name'];
    protected $guarded = [];
}
