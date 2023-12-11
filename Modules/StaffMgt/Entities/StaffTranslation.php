<?php

namespace Modules\StaffMgt\Entities;

use Illuminate\Database\Eloquent\Model;

class StaffTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description'];
    protected $table = 'staffmgt__staff_translations';
}
