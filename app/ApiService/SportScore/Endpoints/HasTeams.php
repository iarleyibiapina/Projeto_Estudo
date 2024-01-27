<?php

namespace App\Services\SportScore\Endpoints;

use App\Services\SportScore\Endpoints\Teams;

trait HasTeams
{
    public function teams(): Teams
    {
        return new Teams();
    }
}
