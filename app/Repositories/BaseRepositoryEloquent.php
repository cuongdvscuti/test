<?php

declare(strict_types=1);

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class BaseRepositoryEloquent.
 */
abstract class BaseRepositoryEloquent extends BaseRepository implements BaseRepositoryInterface
{
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        //        $this->pushCriteria(app(RequestCriteria::class));
    }
}
