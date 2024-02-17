<?php

namespace App\Http\Controllers;

use App\DTO\ExemploDTO;
use Illuminate\Http\Request;

class DtoController extends Controller
{
    //
    public function create(Request $request)
    {
        // dd($request->all());
        //  ... spread operator, faz uma 'desconstruçao' do array, no caso essa desconstruçao vai ser definida pelos param do construct e input request
        $dto = new ExemploDTO(...$request->all());
        dd($dto);
    }
}
