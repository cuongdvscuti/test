<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class BaseRepositoryEloquent.
 */
abstract class UserRepositoryEloquent extends BaseRepository implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }
}
