<?php

namespace Modules\Teachermgt\Repositories\Cache;

use Modules\Teachermgt\Repositories\departmentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachedepartmentDecorator extends BaseCacheDecorator implements departmentRepository
{
    public function __construct(departmentRepository $department)
    {
        parent::__construct();
        $this->entityName = 'teachermgt.departments';
        $this->repository = $department;
    }
}
