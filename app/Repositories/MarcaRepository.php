<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;
use App\Models\Marca;

class MarcaRepository extends AbstractRepository
{
    protected static $model = Marca::class;

    public static function findByMarca(string $marca)
    {
        return self::loadModel()::query()->where(['marca' => $marca])->first();
    }
}
