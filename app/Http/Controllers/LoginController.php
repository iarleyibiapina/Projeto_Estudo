<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\LoginRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;

class LoginController extends Controller
{
    //
    protected $loginRepository;

    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function index()
    {
        return view('login');
    }
    public function store(Request $request)
    {
    }
    public function destroy()
    {
        Auth::logout();

        return redirect()->route("index");
    }

    public function login(Request $request)
    {
        // aplica toda a validação e autenticação aqui....

        // $credentials = $request->only(["email","password"]);
        //      $authenticated = Auth::attempt($credentials);


        if (!$request->email || !$request->password)
            return response()->json([
                'success' => false,
                'message' => 'Campos em branco'
            ]);

        $authenticated = $this->loginRepository->loginWhere(['email' => $request->email]);

        if (!$authenticated)
            return response()->json([
                'success' => false,
                'message' => 'Usuario não existente'
            ]);


        // User::where('email', $request->email)->first();

        if (!password_verify($request->password, $authenticated->password))
            return response()->json([
                'success' => false,
                'message' => 'Dados invalido',
            ]);


        Auth::loginUsingId($authenticated->id);

        return response()->json([
            'success' => true,
            'message' => 'Logado',
            'route' => route("logado.index"),
        ]);

        // if($authenticated){

        // $login['success'] = true;
        // $login['message'] = 'logado';
        // return response()->json($login);
        //     // return redirect()->route("logado.index")->with("success","");
        // } else {
        //     $login['success'] = false;
        //     $login['message'] = "Dados invalido";

        //     return response()->json($login);
        // };

        // retornando reposta AJAX com JSON

        // o PHP retornar uma resposta para o JS, para visualizar a resposta no php, F12 > 'network' > name, vai ter o caminho do arquivo e a resposta do PHP.
        // if (validacao false)
        // $login['success'] = false;
        // $login['message'] = 'Email invalido';
        // echo json_encode($login);
        // return;
        // return response()->json($login);



        // // if (nenhum dado validado)
        // $login['success'] = false;
        // $login['message'] = 'nenhum dado valido';
        // echo json_encode($login);
        // return;

    }
}
