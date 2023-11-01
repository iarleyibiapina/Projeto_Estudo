<?php 

namespace App\Repositories\Interfaces\FilmeRepositoryInterface;

Interface FilmeRepositoryInterface {
    public function allFilmes();
    public function storeFilme($data);
    public function findFilme($id);
    public function updateFilme($data, $id);
    public function destroyFilme($id);
}