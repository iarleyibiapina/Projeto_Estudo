<?php

namespace App\Http\Controllers\Filme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FilmeRepository;
use App\Repositories\Interfaces\FilmeRepositoryInterface\FilmeRepositoryInterface;
use Illuminate\Http\UploadedFile;

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
        $dados = $request->all();
        // dd($dados);

        // trabalhando com imagem.
        if($request->hasFile('imagemFilme')){
            // $nome = $request->imagemFilme->getClientOriginalName();
            $nome = $request->imagemFilme->hashName();
            $extensao = $request->imagemFilme->extension();
            // $filename = $request->getSchemeAndHttpHost() . '/home/filmes/' . time() . '.' . $request->imagemFilme->extension();
            // $filename = $request->getSchemeAndHttpHost() . '/home/filmes/' . $nome . '.' . $extensao;
            $filename = $request->getSchemeAndHttpHost() . '/home/filmes/' . $nome;
            // $filename = $request->getSchemeAndHttpHost() . '/home/filmes/' . time() . '-' . $nome;
            // dd($request->imagemFilme);
            // dd($request->file('imagemFilme'));
            $request->imagemFilme->move(public_path('/home/filmes/'), $filename);
        } else {
            return redirect()->back();
        };

        $this->filmeRepository->storeFilme($request->all(), $filename);
        return redirect()->route('logado.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
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
        $buscaFilme = $this->filmeRepository->findFilme($id);
        return view("Filmes.show", compact("buscaFilme"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        dd($request->all());
        $this->filmeRepository->updateFilme($request->all(), $id);
        return redirect()->route("logado.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->filmeRepository->destroyFilme($id);
        return redirect()->route("logado.index");
    }
}
