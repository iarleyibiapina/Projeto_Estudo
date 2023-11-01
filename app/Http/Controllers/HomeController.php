<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FilmeRepository;

class HomeController extends Controller
{
    //
    protected $filmeRepository;

    public function __construct(FilmeRepository $filmeRepository){
        $this->filmeRepository = $filmeRepository;
    }
    public function index(){

                $teste = $this->filmeRepository->allFilmes();

        return view('index', compact("teste"));
    }
}
