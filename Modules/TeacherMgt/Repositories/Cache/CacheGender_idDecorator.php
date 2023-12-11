<?php

namespace Modules\Teachermgt\Repositories\Cache;

use Modules\Teachermgt\Repositories\Gender_idRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheGender_idDecorator extends BaseCacheDecorator implements Gender_idRepository
{
    public function __construct(Gender_idRepository $gender_id)
    {
        parent::__construct();
        $this->entityName = 'teachermgt.gender_ids';
        $this->repository = $gender_id;
    }
}
