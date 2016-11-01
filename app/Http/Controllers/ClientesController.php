<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;


class ClientesController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{	
		$clientes = Cliente::orderBy('id', 'DESC')->paginate(5);
		return view('Clientes.lista', ['clientes' => $clientes]);
	}

	
	public function editar($id)
	{	
		
		
		$cliente = Cliente::findOrFail($id);

		return view('Clientes.form', ['cliente' => $cliente]);
	}

	public function atualizar($id, Request $request) {

		$cliente = Cliente::findOrFail($id);

		$cliente->update($request->all());

		\Session::flash('message_success','Atualizado com Sucesso!');

		return Redirect::to('/clientes/'.$cliente->id.'/editar');


	}

	public function deletar($id, Request $request) {

		$cliente = Cliente::findOrFail($id);
		if(!$chamado = DB::table('chamados')->where('cliente_id', $cliente->id)->first() AND !$chamado = DB::table('pedidos')->where('cliente_id', $cliente->id)->first()){
			$cliente = Cliente::findOrFail($id);

			$cliente->delete();
			\Session::flash('message_success','Deletado com Sucesso');
		} else {
			\Session::flash('message_fail','Não pode ser deletado pois está em uso');

		}
		

		return Redirect::to('/clientes');

	}

	


}
