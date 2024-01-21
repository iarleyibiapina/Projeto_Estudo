<?php

namespace App\Repositories;

use App\Models\Filme;
use App\Repositories\Interfaces\FilmeRepositoryInterface;

class FilmeRepository {
    public function allFilmes(){
        return Filme::latest()->paginate(15);
    }
    public function storeFilme($data, $filename){
        // recebendo o nome que foi definido no if
        $data['imagemFilme'] = $filename;
        return Filme::create($data);
    }
    public function findFilme($id){
        return Filme::find($id);
    }
    public function updateFilme($data, $id){
    $filme = Filme::where('id', $id)->first();
    $filme->nomeDoFilme = $data['nomeDoFilme'];
    $filme->categoriaDoFilme = $data['categoriaDoFilme'];
    $filme->descricaoDoFilme = $data['descricaoDoFilme'];
    $filme->imagemFilme = $data['imagemFilme'];
    $filme->save();
    }
    public function destroyFilme($id){
        $filme = Filme::find($id);
        $filme->delete();
    }

}