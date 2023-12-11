<?php

namespace Modules\StaffMgt\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class StaffIsCreated extends AbstractEntityHook implements EntityIsChanging
{
    
}
