<?php

namespace Modules\StaffMgt\Repositories\Cache;

use Modules\StaffMgt\Repositories\StaffRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheStaffDecorator extends BaseCacheDecorator implements StaffRepository
{
    public function __construct(StaffRepository $staff)
    {
        parent::__construct();
        $this->entityName = 'staffmgt.staff';
        $this->repository = $staff;
    }
}
