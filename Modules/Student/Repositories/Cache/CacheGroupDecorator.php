<?php

namespace Modules\Student\Repositories\Cache;

use Modules\Student\Repositories\GroupRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheGroupDecorator extends BaseCacheDecorator implements GroupRepository
{
    public function __construct(GroupRepository $group)
    {
        parent::__construct();
        $this->entityName = 'student.groups';
        $this->repository = $group;
    }
}
