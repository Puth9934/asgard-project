<?php

namespace Modules\TeacherMgt\Repositories\Cache;

use Modules\TeacherMgt\Repositories\TeacherRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTeacherDecorator extends BaseCacheDecorator implements TeacherRepository
{
    public function __construct(TeacherRepository $teacher)
    {
        parent::__construct();
        $this->entityName = 'teachermgt.teachers';
        $this->repository = $teacher;
    }
}
