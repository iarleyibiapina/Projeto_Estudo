<?php

namespace App\Services\SportScore\Endpoint;

use App\Services\SportScore\Endpoints\Sports;

trait HasSports
{
    public function sports(): Sports
    {
        return new Sports();
    }
}
