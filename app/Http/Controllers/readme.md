Sugestao de estrutura de um controller/metodo

dentro de um try...catch
    criar excecoes personalizadas 
    se for controller de api, excecoes pode ja conter mensagens e status pre-definidos
1-Valida dados

2-Performa ação

3-Retorna resposta

public function index(Request $request) // 1 pode ocorrer na classe request
{
    try {
        // 1 ou aqui direto (melhor na classe)
        $values = $request->validate()...


        // 2 performa ação, chamando um ou mais serviços
        $this->servico->acao($values)

        // 3 retorna resposta, view ou json para api

        return response()->json()
    } catch (Exception $e) {

        // 
        return response()->json($e)
    }
}
