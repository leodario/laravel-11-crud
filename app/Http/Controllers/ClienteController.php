<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //Listagem de clientes
    public function index(Request $request){

        // busca a partir do termo de pesquisa
        $termoDePesquisa = $request->input('pesquisa');

        // buscar informações do nosso banco de dados
        $cliente = Cliente::where('nome','like', '%' . $termoDePesquisa . '%')
        ->orWhere('cpf', 'like', '%' . $termoDePesquisa . '%')
        ->orWhere('fone', 'like', '%' . $termoDePesquisa . '%')
        ->orWhere('email', 'like', '%' . $termoDePesquisa . '%')
        ->orderByDesc('created_at')
        ->paginate(1)
        ->withQueryString();

        // retorna nosso layout (nossa view)
        return view('cliente/index', ['cliente' => $cliente]);
    }

    //Formulário de cadastro de clientes
    public function criar(){
        return view('cliente/criar');
    }

    // mostrar resultados
    public function mostrar(){
        return view('cliente/mostrar');
    }

    // salvar no banco de dados
    public function store(ClienteRequest $request){

        //validar os campos
        // como corrigir este erro abaixo?
        //$request->validate();

        //salvar no banco de dados
        Cliente::create($request->all());

        // redirecionamento
        return redirect()->route('cliente.index')->with('sucesso', 'Cliente cadastrado com sucesso');
    }

    // visualizar os dados a partir do id do cliente
    public function editar(Cliente $cliente){
        return view('cliente/editar', ['cliente' => $cliente]);
    }

    // alterar os dados a partir do id do cliente
    public function update(ClienteRequest $request, cliente $cliente){
        //$request->validate();

        // edita as informações no banco de dados
        $cliente->update([
            'nome' => $request->nome,
            'fone' => $request->fone,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'nascimento' => $request->nascimento,
        ]);

         // redirecionamento
         return redirect()->route('cliente.index')->with('sucesso', 'Cliente atualizado com sucesso');
    }

    public function destroy(Cliente $cliente){
        $cliente->delete();

        // redirecionamento
        return redirect()->route('cliente.index')->with('sucesso', 'Cliente foi excluído com sucesso');
    }
}
