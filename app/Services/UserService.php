<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\UserRepositoryEloquent;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryEloquent $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }
}
