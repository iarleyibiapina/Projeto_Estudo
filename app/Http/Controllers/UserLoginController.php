<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\LoginRepository;
use App\Models\Usuario;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class UserLoginController extends Controller
{
    protected $loginRepository;

    public function __construct(LoginRepository $loginRepository)
    {
        // utilizando repository
        $this->loginRepository = $loginRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $usuario)
    {
        //
        $dados = $request->validate([
            'name' => 'string',
            'email' => 'string',
            'password' => 'string',
        ]);
        $this->loginRepository->storeUser($dados);
        return redirect()->route('inicio');
    }

    public function login(Request $request)
    {
        // $dados = $request->all();
        $dados = $request->validate([
            'name' => 'string',
            'email' => 'string',
            'password' => 'string',
        ]);
        // dd($request->all());
        $reposta = $this->loginRepository->findUser($dados);
        if (Auth::attempt($reposta)) {
            return view("home.indexHome", compact('dados'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
