<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class GroupTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'student__group_translations';
}
