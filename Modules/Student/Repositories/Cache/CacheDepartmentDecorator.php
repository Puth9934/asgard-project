<?php

namespace Modules\Student\Repositories\Cache;

use Modules\Student\Repositories\DepartmentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDepartmentDecorator extends BaseCacheDecorator implements DepartmentRepository
{
    public function __construct(DepartmentRepository $department)
    {
        parent::__construct();
        $this->entityName = 'student.departments';
        $this->repository = $department;
    }
}
