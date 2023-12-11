<?php

namespace Modules\Staffmgt\Repositories\Cache;

use Modules\Staffmgt\Repositories\departmentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachedepartmentDecorator extends BaseCacheDecorator implements departmentRepository
{
    public function __construct(departmentRepository $department)
    {
        parent::__construct();
        $this->entityName = 'staffmgt.departments';
        $this->repository = $department;
    }
}
