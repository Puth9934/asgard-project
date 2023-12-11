<?php

namespace Modules\Student\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class StudentIsCreate extends AbstractEntityHook implements EntityIsChanging
{
    
}
