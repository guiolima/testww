<?php

namespace App\Http\Controllers;

use App\Chamado;
use App\Cliente;
use App\Pedido;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;


class ChamadosController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{	
		$chamados = Chamado::Search($request->email,$request->nome,$request->pedido)->orderBy('id', 'DESC')->paginate(5);
			$clientes = Cliente::orderBy('id', 'DESC')->get();
			$pedidos = Pedido::orderBy('id', 'DESC')->get();
			return view('Chamados.lista', ['chamados' => $chamados,'clientes' => $clientes,'pedidos' => $pedidos]);
	
	}

	public function criar()
	{
		return view('Chamados.form');
	}

	public function salvar(Request $request)
	{	
		$this->validate($request, [
			'nome' => 'required',
			'email' => 'required',
			'titulo' => 'required',
			'descricao' => 'required',
			'numero_pedido' => 'required',
			]);

		$cliente = DB::table('clientes')->where('email', $request->email)->first();
		$pedido = DB::table('pedidos')->where('numero_pedido', $request->numero_pedido)->first();


		if($cliente){

		}else{

			$cliente = new Cliente();

			$cliente->nome = $request->nome;
			$cliente->email = $request->email;

			$cliente->save();

		}
		if($pedido) {

		} else {

			$pedido = new Pedido();

			$pedido->numero_pedido = $request->numero_pedido;
			$pedido->cliente_id = $cliente->id;

			$pedido->save();

		}

		if($pedido->cliente_id <> $cliente->id){

			\Session::flash('message_fail','Esse pedido já pertence a outro cliente');

			return Redirect::to('chamados/criar');
		}

		$chamado = new Chamado();

		$chamado->cliente_id = $cliente->id;

		$chamado->titulo = $request->titulo;

		$chamado->descricao = $request->descricao;

		$chamado->pedido_id = $pedido->id;	


		$chamado->save();		


		\Session::flash('message_success','Cadastrado com Sucesso!');

		return Redirect::to('chamados/criar');

	}	



	public function deletar($id, Request $request) {

		$chamado = Chamado::findOrFail($id);

		$chamado->delete();

		\Session::flash('message_success','Deletado com Sucesso');

		return Redirect::to('/chamados');

	}

	public function ver($id)
	{
		$chamado = Chamado::findOrFail($id);
		return view('Chamados.ver', ['chamado' => $chamado]);
	}



}
