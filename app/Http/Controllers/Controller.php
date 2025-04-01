<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;

class Controller
{
    use ApiResponseHelper;

    public function test()
    {
        return $this->sendResponseOk();
    }
}
