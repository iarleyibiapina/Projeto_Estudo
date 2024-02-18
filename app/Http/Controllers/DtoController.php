<?php

namespace App\Http\Controllers;

use App\DTO\ExemploDTO;
use App\DTO\InputExemploDTO;
use App\DTO\OutputExemploDTO;
use Illuminate\Http\Request;

class DtoController extends Controller
{
    //
    public function create(Request $request)
    {
        // dd($request->all());
        //  ... spread operator, faz uma 'desconstruçao' do array, no caso essa desconstruçao vai ser definida pelos param do construct e input request
        // $dto = new ExemploDTO(...$request->all()); // desta forma ocorre um erro se passado um param a mais que não é esperado
        // desta forma, define pegar apenas os params que eu quero 
        $dto = new ExemploDTO(...$request->only(
            [
                "name",
                "idade",
                "situacao",
            ]
        ));
        // dd($dto->toArray());
        $saida = $this->exemplo($dto);

        return response()->json($saida->toArray());
    }

    // supondo que quero utilizar certas DTOs
    private function exemplo(ExemploDTO $dto)
    {
        // se for usar todos params
        // return new OutputExemploDTO(... $dto->toArray());
        return new OutputExemploDTO($dto->name, $dto->idade);
    }
}
