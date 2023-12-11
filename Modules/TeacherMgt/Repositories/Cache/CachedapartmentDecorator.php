<?php

namespace Modules\Teachermgt\Repositories\Cache;

use Modules\Teachermgt\Repositories\dapartmentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachedapartmentDecorator extends BaseCacheDecorator implements dapartmentRepository
{
    public function __construct(dapartmentRepository $dapartment)
    {
        parent::__construct();
        $this->entityName = 'teachermgt.dapartments';
        $this->repository = $dapartment;
    }
}
