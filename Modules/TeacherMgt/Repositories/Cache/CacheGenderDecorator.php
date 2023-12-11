<?php

namespace Modules\Teachermgt\Repositories\Cache;

use Modules\Teachermgt\Repositories\GenderRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheGenderDecorator extends BaseCacheDecorator implements GenderRepository
{
    public function __construct(GenderRepository $gender)
    {
        parent::__construct();
        $this->entityName = 'teachermgt.genders';
        $this->repository = $gender;
    }
}
