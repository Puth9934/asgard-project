<?php

namespace Modules\Student\Repositories\Cache;

use Modules\Student\Repositories\StudentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheStudentDecorator extends BaseCacheDecorator implements StudentRepository
{
    public function __construct(StudentRepository $student)
    {
        parent::__construct();
        $this->entityName = 'student.students';
        $this->repository = $student;
    }
}
