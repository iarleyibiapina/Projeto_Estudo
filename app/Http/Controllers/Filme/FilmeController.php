<?php

namespace App\Http\Controllers\Filme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FilmeRepository;
use App\Repositories\Interfaces\FilmeRepositoryInterface\FilmeRepositoryInterface;


class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $filmeRepository;


    public function __construct(FilmeRepository $filmeRepository){
        $this->filmeRepository = $filmeRepository;
    }
    public function index()
    {
        //
        $filmes = $this->filmeRepository->allFilmes();
        return view("home", compact("filmes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // dd($request->all());
        // dd($request->only('descricaoDoFilme'));

        $this->filmeRepository->storeFilme($request->all());
        return redirect()->route('logado.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
        // dd($request);
        $buscaFilme = $this->filmeRepository->findFilme($id);

        return view("Filmes.show", compact("buscaFilme"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
