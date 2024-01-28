<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\FilmeRepositoryInterface\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function allCategories()
    {
        // ultimas 10 categorias criadas
        return Category::latest()->paginate(10);
    }
    public function storeCategory($data)
    {
        return Category::create($data);
    }
    public function findCategory($id)
    {
        return Category::find($id);
    }
    public function updateCategory($data, $id)
    {
        // procurar primeiro onde, id enviado pelo parametro é o id da coluna
        $category = Category::where('id', $id)->first();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->save();
    }
    public function destroyCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
