<?php

namespace Modules\StaffMgt\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;
use Modules\StaffMgt\Entities\Staff;

class StaffIsUpdated extends AbstractEntityHook implements EntityIsChanging
{
    private $staff;
   public function __construct(Staff $staff , array $data)
   {
    parent::__construct($data);
    $this->staff = $staff;
   }

   public function getStaff()
   {
    return $this->staff;
   }
}
