<?php

namespace Modules\Teachermgt\Repositories\Cache;

use Modules\Teachermgt\Repositories\subjectsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachesubjectsDecorator extends BaseCacheDecorator implements subjectsRepository
{
    public function __construct(subjectsRepository $subjects)
    {
        parent::__construct();
        $this->entityName = 'teachermgt.subjects';
        $this->repository = $subjects;
    }
}
