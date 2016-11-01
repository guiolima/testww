<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class PedidosController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{	
		$pedidos = Pedido::paginate(5);
		return view('Pedidos.lista', ['pedidos' => $pedidos]);
	}

	public function deletar($id, Request $request) {

		$pedido = Pedido::findOrFail($id);
		
		if(!$pedido = DB::table('chamados')->where('pedido_id', $pedido->id)->first()){
			$pedido = Pedido::findOrFail($id);
			
			$pedido->delete();
			\Session::flash('message_success','Deletado com Sucesso');
		} else {
			\Session::flash('message_fail','Não pode ser deletado pois está em uso');

		}
		

		return Redirect::to('/pedidos');

	}

}
