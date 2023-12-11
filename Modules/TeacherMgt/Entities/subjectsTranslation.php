<?php

namespace Modules\Teachermgt\Entities;

use Illuminate\Database\Eloquent\Model;

class subjectsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'teachermgt__subjects_translations';
}
