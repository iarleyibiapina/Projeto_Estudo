<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        // utilizando repository
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        // utilizando repository
        $categories = $this->categoryRepository->allCategories();
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view("categories.create");
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        // utilizando repository
        $this->categoryRepository->storeCategory($data);
        return redirect()->route('categories.index')->with('message', 'success');
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $category = $this->categoryRepository->findCategory($id);

        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        // atualize todas colunas do pedido, ou 'only' apenas tal coluna
        $this->categoryRepository->updateCategory($request->all(), $id);

        return redirect()->route('categories.index')->with('message', 'success update');
    }
    public function destroy($id)
    {
    }
}
