<?php

namespace Modules\Staffmgt\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use Translatable;

    protected $table = 'staffmgt__departments';
    public $translatedAttributes = ['name'];
    protected $guarded = [];
    
}
