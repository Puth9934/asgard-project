<?php

namespace Modules\TeacherMgt\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class TeacherIsCreate extends AbstractEntityHook implements EntityIsChanging
{
   
}
